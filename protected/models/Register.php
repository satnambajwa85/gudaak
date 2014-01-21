<?php
class Register extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

    public $password;
    public $confirmpass;
    public $gudaak_id;
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
			
		    array('password', 'required','message' => 'Please enter  password.'), 
			array('password', 'length', 'max' => 50, 'min' => 6, 'tooShort' => 'Password must have at least 6 chars'),
		    array('email', 'email'), 
		    array('gudaak_id', 'required','message' => 'Please enter Gudaak ID.'), 
            array('confirmpass', 'required','message' => 'Please confirm your password.'), 
            array('confirmpass', 'compare', 'compareAttribute'=>'password'), 
			array('display_name, first_name, last_name,  email, gender, date_of_birth, mobile_no, add_date, user_login_id, generate_gudaak_ids_id', 'required'),
			array('semd_mail, status, user_login_id, generate_gudaak_ids_id', 'numerical', 'integerOnly'=>true),
			array('display_name, email', 'length', 'max'=>100),
			array('first_name, last_name', 'length', 'max'=>50),
			array('class, gender, image', 'length', 'max'=>45),
			array('mobile_no', 'numerical', 'integerOnly'=>true),
			array('address, user_info', 'length', 'max'=>600),
			array('postcode', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, display_name, first_name, last_name, class, email, gender, date_of_birth, image, mobile_no, address, postcode, user_info, add_date, semd_mail, status, user_login_id, generate_gudaak_ids_id', 'safe', 'on'=>'search'),
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
			'generateGudaakIds' => array(self::BELONGS_TO, 'GenerateGudaakIds', 'generate_gudaak_ids_id'),
			'userLogin' => array(self::BELONGS_TO, 'UserLogin', 'user_login_id'),
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
			'generate_gudaak_ids_id' => 'Generate Gudaak Ids',
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
		$criteria->compare('generate_gudaak_ids_id',$this->generate_gudaak_ids_id);

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
