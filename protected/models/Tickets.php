<?php

/**
 * This is the model class for table "tickets".
 *
 * The followings are the available columns in table 'tickets':
 * @property integer $id
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $title
 * @property string $problem
 * @property string $mode
 * @property string $language
 * @property string $available
 * @property string $solution
 * @property integer $status
 * @property string $add_date
 * @property string $modification_date
 * @property integer $admin
 */
class Tickets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tickets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sender_id, receiver_id, title, problem', 'required'),
			array('sender_id, receiver_id, status, admin', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>500),
			array('mode, language', 'length', 'max'=>100),
			array('available, solution, add_date, modification_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sender_id, receiver_id, title, problem, mode, language, available, solution, status, add_date, modification_date, admin', 'safe', 'on'=>'search'),
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
			'sender_id' => 'Sender',
			'receiver_id' => 'Receiver',
			'title' => 'Title',
			'problem' => 'Problem',
			'mode' => 'Mode',
			'language' => 'Language',
			'available' => 'Available',
			'solution' => 'Solution',
			'status' => 'Status',
			'add_date' => 'Add Date',
			'modification_date' => 'Modification Date',
			'admin' => 'Admin',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('sender_id',$this->sender_id);
		$criteria->compare('receiver_id',$this->receiver_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('problem',$this->problem,true);
		$criteria->compare('mode',$this->mode,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('available',$this->available,true);
		$criteria->compare('solution',$this->solution,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('admin',$this->admin);

		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tickets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
