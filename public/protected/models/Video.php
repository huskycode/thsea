<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $url
 * @property string $thumbnail_url
 * @property string $recording_date
 * @property string $posted_date
 * @property string $posted_by
 *
 * The followings are the available model relations:
 * @property VideoTag[] $videoTags
 */
class Video extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, url, posted_date, posted_by', 'required'),
			array('title', 'length', 'max'=>1000),
			array('description', 'length', 'max'=>2000),
			array('url', 'length', 'max'=>500),
                        array('thumbnail_url', 'length', 'max'=>1000),
			array('posted_by', 'length', 'max'=>50),
			array('recording_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, url, thumbnail_url, recording_date, posted_date, posted_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'videoTags' => array(self::HAS_MANY, 'VideoTag', 'video_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'url' => 'Url',
                        'thumbnail_url' => 'Thumbnail Url',
			'recording_date' => 'Recording Date',
			'posted_date' => 'Posted Date',
			'posted_by' => 'Posted By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('url',$this->url,true);
                $criteria->compare('thumbnail_url', $this->thumbnail_url, true);
		$criteria->compare('recording_date',$this->recording_date,true);
		$criteria->compare('posted_date',$this->posted_date,true);
		$criteria->compare('posted_by',$this->posted_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}