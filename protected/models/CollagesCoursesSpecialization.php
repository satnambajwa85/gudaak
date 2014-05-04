<?php

/**
 * This is the model class for table "collages_courses_specialization".
 *
 * The followings are the available columns in table 'collages_courses_specialization':
 * @property integer $id
 * @property integer $collage_id
 * @property integer $specialization_id
 * @property integer $courses_id
 * @property string $admission_criteria
 * @property string $entrance_exam
 * @property string $course_mode
 * @property string $fees
 * @property string $seats
 * @property string $add_date
 * @property integer $status
 */
class CollagesCoursesSpecialization extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CollagesCoursesSpecialization the static model class
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
		return 'collages_courses_specialization';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('collage_id, specialization_id, courses_id, add_date, status', 'required'),
			array('collage_id, specialization_id, courses_id, status', 'numerical', 'integerOnly'=>true),
			array('course_mode, fees, seats', 'length', 'max'=>100),
			array('admission_criteria, entrance_exam', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, collage_id, specialization_id, courses_id, admission_criteria, entrance_exam, course_mode, fees, seats, add_date, status', 'safe', 'on'=>'search'),
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
			'collage' => array(self::BELONGS_TO, 'Collage', 'collage_id'),
			'courses' => array(self::BELONGS_TO, 'Courses', 'courses_id'),
			'specialization' => array(self::BELONGS_TO, 'Specialization', 'specialization_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'collage_id' => 'Collage',
			'specialization_id' => 'Specialization',
			'courses_id' => 'Courses',
			'admission_criteria' => 'Admission Criteria',
			'entrance_exam' => 'Entrance Exam',
			'course_mode' => 'Course Mode',
			'fees' => 'Fees',
			'seats' => 'Seats',
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
		$criteria->compare('collage_id',$this->collage_id);
		$criteria->compare('specialization_id',$this->specialization_id);
		$criteria->compare('courses_id',$this->courses_id);
		$criteria->compare('admission_criteria',$this->admission_criteria,true);
		$criteria->compare('entrance_exam',$this->entrance_exam,true);
		$criteria->compare('course_mode',$this->course_mode,true);
		$criteria->compare('fees',$this->fees,true);
		$criteria->compare('seats',$this->seats,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}