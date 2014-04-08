<?php

/**
 * This is the model class for table "user_education".
 *
 * The followings are the available columns in table 'user_education':
 * @property integer $id
 * @property integer $user_profiles_id
 * @property integer $institutes_id
 * @property integer $stream_id
 * @property integer $courses_id
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property UserProfiles $userProfiles
 * @property Institutes $institutes
 * @property Stream $stream
 * @property Courses $courses
 */
class UserEducation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_education';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_profiles_id, institutes_id, stream_id, courses_id', 'required'),
			array('user_profiles_id, institutes_id, stream_id, courses_id, status', 'numerical', 'integerOnly'=>true),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_profiles_id, institutes_id, stream_id, courses_id, add_date, status', 'safe', 'on'=>'search'),
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
			'userProfiles' => array(self::BELONGS_TO, 'UserProfiles', 'user_profiles_id'),
			'institutes' => array(self::BELONGS_TO, 'Institutes', 'institutes_id'),
			'stream' => array(self::BELONGS_TO, 'Stream', 'stream_id'),
			'courses' => array(self::BELONGS_TO, 'Courses', 'courses_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_profiles_id' => 'User Profiles',
			'institutes_id' => 'Institutes',
			'stream_id' => 'Stream',
			'courses_id' => 'Courses',
			'add_date' => 'Add Date',
			'status' => 'Status',
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
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('institutes_id',$this->institutes_id);
		$criteria->compare('stream_id',$this->stream_id);
		$criteria->compare('courses_id',$this->courses_id);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'add_date DESC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserEducation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
