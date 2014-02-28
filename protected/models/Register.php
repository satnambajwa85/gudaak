<?php
class Register extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $password;
    public $confirmpass;
    public $gudaak_id;
    public $class;
    public $medium;
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
			array('confirmpass', 'required','message' => 'Please confirm new password.'), 
            array('password', 'compare', 'compareAttribute'=>'confirmpass'), 
		    array('gudaak_id', 'required','message' => 'Please enter Gudaak ID.'), 
			array('gudaak_id, display_name, first_name, last_name, email, gender, date_of_birth, mobile_no, add_date, generate_gudaak_ids_id, user_login_id, user_academic_id, user_class_id', 'required'),
			array('semd_mail, status, generate_gudaak_ids_id, user_login_id, user_academic_id, user_class_id', 'numerical', 'integerOnly'=>true),
			array('gudaak_id, display_name, email', 'length', 'max'=>100),
			array('password', 'required','message' => 'Please enter  password.'), 
		    array('class', 'required','message' => 'Please fill  your class.'), 
		    array('medium', 'required','message' => 'Please fill  your medium.'), 
			array('password', 'length', 'max' => 50, 'min' => 6, 'tooShort' => 'Password must have at least 6 chars'),
			array('mobile_no', 'length', 'max' => 10, 'min' => 10, 'tooShort' => 'Mobile no must have at least 10 number'),
		    array('email', 'email'), 
			array('email','unique'), 
			array('gudaak_id','unique'), 
			array('first_name, last_name', 'length', 'max'=>50),
			array('class, gender, image', 'length', 'max'=>45),
			array('mobile_no', 'length', 'max'=>10),
			array('address, user_info', 'length', 'max'=>600),
			array('postcode', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, gudaak_id, display_name, first_name, last_name, class, email, gender, date_of_birth, image, mobile_no, address, postcode, user_info, add_date, semd_mail, status, generate_gudaak_ids_id, user_login_id, user_academic_id, user_class_id', 'safe', 'on'=>'search'),
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
			'counsellings' => array(self::HAS_MANY, 'Counselling', 'user_profiles_id'),
			'retakeTestRequests' => array(self::HAS_MANY, 'RetakeTestRequest', 'user_profiles_id'),
			'testReports' => array(self::HAS_MANY, 'TestReports', 'user_profiles_id'),
			'userCareerComments' => array(self::HAS_MANY, 'UserCareerComments', 'user_profiles_id'),
			'userCareerPreferences' => array(self::HAS_MANY, 'UserCareerPreference', 'user_profiles_id'),
			'userEducations' => array(self::HAS_MANY, 'UserEducation', 'user_profiles_id'),
			'generateGudaakIds' => array(self::BELONGS_TO, 'GenerateGudaakIds', 'generate_gudaak_ids_id'),
			'userAcademic' => array(self::BELONGS_TO, 'UserAcademicMedium', 'user_academic_id'),
			'userClass' => array(self::BELONGS_TO, 'UserClass', 'user_class_id'),
			'userLogin' => array(self::BELONGS_TO, 'UserLogin', 'user_login_id'),
			'userProfilesHasInstitutes' => array(self::HAS_MANY, 'UserProfilesHasInstitutes', 'user_profiles_id'),
			'userProfilesHasInterests' => array(self::HAS_MANY, 'UserProfilesHasInterests', 'user_profiles_id'),
			'userProfilesHasStreams' => array(self::HAS_MANY, 'UserProfilesHasStream', 'user_profiles_id'),
			'userRatings' => array(self::HAS_MANY, 'UserRating', 'user_profiles_id'),
			'userReports' => array(self::HAS_MANY, 'UserReports', 'user_profiles_id'),
			'userScores' => array(self::HAS_MANY, 'UserScores', 'user_profiles_id'),
			'userStreamComments' => array(self::HAS_MANY, 'UserStreamComments', 'user_profiles_id'),
			'userStreamRatings' => array(self::HAS_MANY, 'UserStreamRating', 'user_profiles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'gudaak_id' => 'Gudaak',
			'display_name' => 'Display Name',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'class' => 'Class',
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
			'generate_gudaak_ids_id' => 'Generate Gudaak Ids',
			'user_login_id' => 'User Login',
			'user_academic_id' => 'User Academic',
			'user_class_id' => 'User Class',
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
		$criteria->compare('gudaak_id',$this->gudaak_id,true);
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('class',$this->class,true);
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
		$criteria->compare('generate_gudaak_ids_id',$this->generate_gudaak_ids_id);
		$criteria->compare('user_login_id',$this->user_login_id);
		$criteria->compare('user_academic_id',$this->user_academic_id);
		$criteria->compare('user_class_id',$this->user_class_id);

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
