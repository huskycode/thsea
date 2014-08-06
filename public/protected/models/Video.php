<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $url
 * @property string $url_name
 * @property string $thumbnail_url
 * @property string $slideshare_url
 * @property string $sync_time_slide
 * @property string $additional_content
 * @property string $recording_date
 * @property string $posted_date
 * @property string $posted_by
 * @property string $view_counter
 *
 * The followings are the available model relations:
 * @property VideoTag[] $videoTags
 */
class Video extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Video the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'video';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, url, posted_date, posted_by', 'required'),
            array('title', 'length', 'max' => 200),
            array('description', 'length', 'max' => 5000),
            array('url', 'length', 'max' => 500),
            array('url_name', 'checkExistingUrlName'),
            array('thumbnail_url', 'length', 'max' => 1000),
            array('slideshare_url', 'length', 'max' => 1000),
            array('sync_time_slide', 'length', 'max' => 5000),
            array('additional_content, recording_date', 'safe'),
            array('posted_by', 'length', 'max' => 50),
            array('view_counter', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, description, url, url_name, thumbnail_url, recording_date, posted_date, posted_by, view_counter', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'videoTags' => array(self::HAS_MANY, 'VideoTag', 'video_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'url' => 'Url',
            'url_name' => 'Url Name',
            'thumbnail_url' => 'Thumbnail Url',
            'slideshare_url' => 'Slideshare Url',
            'sync_time_slide' => 'Time Slide',
            'additional_content' => 'Additional Content',
            'recording_date' => 'Recording Date',
            'posted_date' => 'Posted Date',
            'posted_by' => 'Posted By',
            'view_counter' => 'View Counter',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('url_name', $this->url_name, true);
        $criteria->compare('thumbnail_url', $this->thumbnail_url, true);
	$criteria->compare('slideshare_url',$this->slideshare_url,true);
	$criteria->compare('sync_time_slide',$this->sync_time_slide,true);
        $criteria->compare('recording_date', $this->recording_date, true);
        $criteria->compare('posted_date', $this->posted_date, true);
        $criteria->compare('posted_by', $this->posted_by, true);
        $criteria->compare('view_counter', $this->view_counter, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function checkExistingUrlName($attribute, $params) {
        if ($this->url_name != '') {
            if($this->id){
                $video = $this->find('url_name=:url_name AND id<>:id', array(':url_name' => $this->url_name,
                ':id' => $this->id));
            } else {
                $video = $this->find('url_name=:url_name', array(':url_name' => $this->url_name));
            }            

            if ($video != null) {
                $this->addError($attribute, 'Duplicate permalink.');
            }
        }
    }

    public function recently($limit = 5) {
        $this->getDbCriteria()->mergeWith(array(
            'order' => 'recording_date DESC',
            'limit' => $limit,
        ));
        return $this;
    }

    public function topview($limit = 5) {
        $this->getDbCriteria()->mergeWith(array(
            'order' => 'view_counter DESC',
            'limit' => $limit,
        ));
        return $this;
    }
    
    public function getUrlName(){
        return $this->url_name?$this->url_name:$this->id;
    }
    
    public function getTimeSlide(){
        $result = array();
       
        if ($this->sync_time_slide!=''){
            $times = explode("\r\n", $this->sync_time_slide);
            
            for($i=0; $i<count($times); $i++){
                $lastRound = count($times)==$i+1;
                
                if ($lastRound){
                    $nextTime = $times[$i];
                } else {
                    $nextTime = $times[$i+1];
                }
                
                $nextTimeParts = explode(',', $nextTime);
                $currentTime = $times[$i];
                $currentTimeParts = explode(',', $currentTime);
                
                $newObj = new SyncTimeSlide();
                $newObj->start = $currentTimeParts[0];
                $newObj->end = $nextTimeParts[0];
                $newObj->target='slidesharediv';
                $newObj->slideshowurl = $this->slideshare_url;
                $newObj->startslide = $currentTimeParts[1];
                
                $result[] = $newObj;
            }
            
            $lastIndex = count($result)-1;
            $result[$lastIndex]->end = 10800;
        }
        
        return $result;
    }
}

class SyncTimeSlide{
    public $start;
    public $end;
    public $slideshowurl;
    public $startslide;
    public $target;
}