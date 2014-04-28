<?php

/**
 * This is the model class for table "entrance_exams".
 *
 * The followings are the available columns in table 'entrance_exams':
 * @property integer $id
 * @property string $name
 * @property string $level
 * @property integer $career_category
 * @property string $details
 * @property string $start_date
 * @property string $end_date
 * @property string $test_date
 * @property string $result_date
 * @property string $add_date
 * @property integer $status
 */
class EntranceExams extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EntranceExams the static model class
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
		return 'entrance_exams';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, level, career_category, details, start_date, end_date, test_date, result_date, add_date, status', 'required'),
			array('career_category, status', 'numerical', 'integerOnly'=>true),
			array('name, level', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, level, career_category, details, start_date, end_date, test_date, result_date, add_date, status', 'safe', 'on'=>'search'),
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
		'careerCategories' => array(self::BELONGS_TO, 'EntranceCategory', 'career_category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'level' => 'Level',
			'career_category' => 'Career Category',
			'details' => 'Details',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'test_date' => 'Test Date',
			'result_date' => 'Result Date',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('career_category',$this->career_category);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('test_date',$this->test_date,true);
		$criteria->compare('result_date',$this->result_date,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'add_date DESC',
			),
		));
	}
}