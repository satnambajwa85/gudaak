<?php

/**
 * This is the model class for table "counselor".
 *
 * The followings are the available columns in table 'counselor':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $image
 * @property string $date_of_birth
 * @property string $gender
 * @property string $address
 * @property string $postcode
 * @property string $email
 * @property string $work_email
 * @property string $alternative_email
 * @property string $official_email
 * @property string $work_phone_no
 * @property string $mobile_no
 * @property string $contact_no
 * @property string $alternative_mobile_no
 * @property string $official_contact_no
 * @property string $fax
 * @property string $shot_description
 * @property string $description
 * @property string $about
 * @property string $other_details
 * @property string $resume
 * @property integer $activation
 * @property integer $status
 * @property integer $user_login_id
 *
 * The followings are the available model relations:
 * @property Counselling[] $counsellings
 * @property UserLogin $userLogin
 */
class Counselor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Counselor the static model class
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
		return 'counselor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, date_of_birth, gender, address, postcode, email, mobile_no, user_login_id', 'required'),
			array('activation, status, user_login_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, email', 'length', 'max'=>50),
			array('image, gender, work_email, alternative_email, official_email, work_phone_no, mobile_no, contact_no, alternative_mobile_no, official_contact_no, fax', 'length', 'max'=>45),
			array('address, shot_description', 'length', 'max'=>500),
			array('postcode', 'length', 'max'=>6),
			array('description, about, other_details, resume', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, image, date_of_birth, gender, address, postcode, email, work_email, alternative_email, official_email, work_phone_no, mobile_no, contact_no, alternative_mobile_no, official_contact_no, fax, shot_description, description, about, other_details, resume, activation, status, user_login_id', 'safe', 'on'=>'search'),
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
			'counsellings' => array(self::HAS_MANY, 'Counselling', 'counselor_id'),
			'counselorHasSchools' => array(self::HAS_MANY, 'CounselorHasSchools', 'counselor_id'),
			'userLogin' => array(self::BELONGS_TO, 'UserLogin', 'user_login_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'image' => 'Image',
			'date_of_birth' => 'Date Of Birth',
			'gender' => 'Gender',
			'address' => 'Address',
			'postcode' => 'Postcode',
			'email' => 'Email',
			'work_email' => 'Work Email',
			'alternative_email' => 'Alternative Email',
			'official_email' => 'Official Email',
			'work_phone_no' => 'Work Phone No',
			'mobile_no' => 'Mobile No',
			'contact_no' => 'Contact No',
			'alternative_mobile_no' => 'Alternative Mobile No',
			'official_contact_no' => 'Official Contact No',
			'fax' => 'Fax',
			'shot_description' => 'Shot Description',
			'description' => 'Description',
			'about' => 'About',
			'other_details' => 'Other Details',
			'resume' => 'Resume',
			'activation' => 'Activation',
			'status' => 'Status',
			'user_login_id' => 'User Login',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('work_email',$this->work_email,true);
		$criteria->compare('alternative_email',$this->alternative_email,true);
		$criteria->compare('official_email',$this->official_email,true);
		$criteria->compare('work_phone_no',$this->work_phone_no,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('contact_no',$this->contact_no,true);
		$criteria->compare('alternative_mobile_no',$this->alternative_mobile_no,true);
		$criteria->compare('official_contact_no',$this->official_contact_no,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('shot_description',$this->shot_description,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('other_details',$this->other_details,true);
		$criteria->compare('resume',$this->resume,true);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_login_id',$this->user_login_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}