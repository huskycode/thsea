<?php

/**
 * This is the model class for table "video_tag".
 *
 * The followings are the available columns in table 'video_tag':
 * @property integer $video_id
 * @property string $tag
 *
 * The followings are the available model relations:
 * @property Video $video
 */
class VideoTag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VideoTag the static model class
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
		return 'video_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('video_id, tag', 'required'),
			array('video_id', 'numerical', 'integerOnly'=>true),
			array('tag', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('video_id, tag', 'safe', 'on'=>'search'),
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
			'video' => array(self::BELONGS_TO, 'Video', 'video_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'video_id' => 'Video',
			'tag' => 'Tag',
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

		$criteria->compare('video_id',$this->video_id);
		$criteria->compare('tag',$this->tag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}