<?php

/**
 * This is the model class for table "summary".
 *
 * The followings are the available columns in table 'summary':
 * @property integer $id
 * @property integer $user_profile_id
 * @property integer $schools_id
 * @property integer $event_id
 * @property string $topic
 * @property string $event
 * @property string $remarks
 * @property string $others
 * @property string $add_date
 * @property integer $status
 */
class Summary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Summary the static model class
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
		return 'summary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_profile_id, topic, event, add_date, status', 'required'),
			array('user_profile_id, schools_id, event_id, status', 'numerical', 'integerOnly'=>true),
			array('topic, event', 'length', 'max'=>500),
			array('remarks, others', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_profile_id, schools_id, event_id, topic, event, remarks, others, add_date, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_profile_id' => 'User Profile',
			'schools_id' => 'Schools',
			'event_id' => 'Event',
			'topic' => 'Topic',
			'event' => 'Event',
			'remarks' => 'Remarks',
			'others' => 'Others',
			'add_date' => 'Add Date',
			'status' => 'Status',
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
		$criteria->compare('user_profile_id',$this->user_profile_id);
		$criteria->compare('schools_id',$this->schools_id);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('topic',$this->topic,true);
		$criteria->compare('event',$this->event,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('others',$this->others,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}