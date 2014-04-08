<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $add_date
 * @property integer $published
 * @property integer $status
 * @property string $interests
 * @property integer $interest_id
 * @property string $collage
 * @property integer $collage_id
 * @property string $admission_criteria
 * @property string $entrance_exam
 * @property string $course_mode
 * @property string $fees
 * @property string $seats
 */
class Course extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, add_date, interests, interest_id, collage, collage_id, admission_criteria, entrance_exam, course_mode, fees, seats', 'required'),
			array('published, status, interest_id, collage_id', 'numerical', 'integerOnly'=>true),
			array('title, collage', 'length', 'max'=>500),
			array('interests', 'length', 'max'=>255),
			array('course_mode, fees, seats', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, add_date, published, status, interests, interest_id, collage, collage_id, admission_criteria, entrance_exam, course_mode, fees, seats', 'safe', 'on'=>'search'),
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
			'interest' => array(self::BELONGS_TO, 'Interest', 'interest_id'),
			'collage' => array(self::BELONGS_TO, 'Collage', 'collage_id'),
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
			'add_date' => 'Add Date',
			'published' => 'Published',
			'status' => 'Status',
			'interests' => 'Interests',
			'interest_id' => 'Interest',
			'collage' => 'Collage',
			'collage_id' => 'Collage',
			'admission_criteria' => 'Admission Criteria',
			'entrance_exam' => 'Entrance Exam',
			'course_mode' => 'Course Mode',
			'fees' => 'Fees',
			'seats' => 'Seats',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('interests',$this->interests,true);
		$criteria->compare('interest_id',$this->interest_id);
		$criteria->compare('collage',$this->collage,true);
		$criteria->compare('collage_id',$this->collage_id);
		$criteria->compare('admission_criteria',$this->admission_criteria,true);
		$criteria->compare('entrance_exam',$this->entrance_exam,true);
		$criteria->compare('course_mode',$this->course_mode,true);
		$criteria->compare('fees',$this->fees,true);
		$criteria->compare('seats',$this->seats,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Course the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
