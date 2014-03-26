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
 * @property string $recording_date
 * @property string $posted_date
 * @property string $posted_by
 * @property string $view_counter
 *
 * The followings are the available model relations:
 * @property VideoTag[] $videoTags
 */
class Skywalker extends CActiveRecord {

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
        return 'fixture';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, name, surname', 'required'),
            array('id', 'length', 'max' => 100),
            array('description', 'length', 'max' => 50),
            array('url', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, surname', 'safe', 'on' => 'search'),
        );
    }


    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('surname', $this->surname, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getPersonName($id){
        return $this->find('id=:id', array(':id' => $id));
    }
}