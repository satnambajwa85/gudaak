<?php

/**
 * This is the model class for table "user_profiles".
 *
 * The followings are the available columns in table 'user_profiles':
 * @property integer $id
 * @property string $display_name
 * @property string $first_name
 * @property string $last_name
 * @property string $class
 * @property string $school
 * @property string $email
 * @property string $gender
 * @property string $date_of_birth
 * @property string $image
 * @property string $mobile_no
 * @property string $address
 * @property string $postcode
 * @property string $user_info
 * @property string $add_date
 * @property integer $semd_mail
 * @property integer $status
 * @property integer $user_login_id
 * @property integer $cities_id
 *
 * The followings are the available model relations:
 * @property UserLogin $userLogin
 * @property Cities $cities
 * @property Courses[] $courses
 * @property Institutes[] $institutes
 * @property Interests[] $interests
 * @property Reports[] $reports
 */
class Register extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('display_name, first_name, last_name, class, school, email, gender, date_of_birth, mobile_no, add_date, user_login_id, cities_id', 'required'),
			array('semd_mail, status, user_login_id, cities_id', 'numerical', 'integerOnly'=>true),
			array('display_name, email', 'length', 'max'=>100),
			array('first_name, last_name', 'length', 'max'=>50),
			array('class, gender, image', 'length', 'max'=>45),
			array('school', 'length', 'max'=>500),
			array('mobile_no', 'length', 'max'=>10),
			array('address, user_info', 'length', 'max'=>600),
			array('postcode', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, display_name, first_name, last_name, class, school, email, gender, date_of_birth, image, mobile_no, address, postcode, user_info, add_date, semd_mail, status, user_login_id, cities_id', 'safe', 'on'=>'search'),
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
			'userLogin' => array(self::BELONGS_TO, 'UserLogin', 'user_login_id'),
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
			'courses' => array(self::MANY_MANY, 'Courses', 'user_profiles_has_courses(user_profiles_id, courses_id)'),
			'institutes' => array(self::MANY_MANY, 'Institutes', 'user_profiles_has_institutes(user_profiles_id, institutes_id)'),
			'interests' => array(self::MANY_MANY, 'Interests', 'user_profiles_has_interests(user_profiles_id, interests_id)'),
			'reports' => array(self::MANY_MANY, 'Reports', 'user_profiles_has_reports(user_profiles_id, reports_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'display_name' => 'Display Name',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'class' => 'Class',
			'school' => 'School',
			'email' => 'Email',
			'gender' => 'Gender',
			'date_of_birth' => 'Date Of Birth',
			'image' => 'Image',
			'mobile_no' => 'Mobile No',
			'address' => 'Address',
			'postcode' => 'Postcode',
			'user_info' => 'User Info',
			'add_date' => 'Add Date',
			'semd_mail' => 'Semd Mail',
			'status' => 'Status',
			'user_login_id' => 'User Login',
			'cities_id' => 'Cities',
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
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('user_info',$this->user_info,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('semd_mail',$this->semd_mail);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_login_id',$this->user_login_id);
		$criteria->compare('cities_id',$this->cities_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserProfiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
