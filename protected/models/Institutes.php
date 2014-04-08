<?php

/**
 * This is the model class for table "institutes".
 *
 * The followings are the available columns in table 'institutes':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $address1
 * @property string $address2
 * @property string $pincode
 * @property string $phone_number
 * @property string $work_phone_no
 * @property string $official_contact_no
 * @property string $email
 * @property string $website
 * @property string $logo
 * @property string $image
 * @property string $add_date
 * @property integer $status
 * @property integer $users_count
 * @property integer $activation
 * @property integer $cities_id
 *
 * The followings are the available model relations:
 * @property CareerOptionsHasInstitutes[] $careerOptionsHasInstitutes
 * @property Cities $cities
 * @property InstitutesHasAffiliations[] $institutesHasAffiliations
 * @property InstitutesHasCourses[] $institutesHasCourses
 * @property UserEducation[] $userEducations
 * @property UserProfilesHasInstitutes[] $userProfilesHasInstitutes
 */
class Institutes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	  public $courses_id,$specialisation;
	public function tableName()
	{
		return 'institutes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, cities_id', 'required'),
			array('status, users_count, activation, cities_id', 'numerical', 'integerOnly'=>true),
			array('name, description, address1, address2, email, logo, image', 'length', 'max'=>45),
			array('pincode', 'length', 'max'=>10),
			array('phone_number', 'length', 'max'=>15),
			array('work_phone_no, official_contact_no', 'length', 'max'=>13),
			array('website', 'length', 'max'=>255),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, address1, address2, pincode, phone_number, work_phone_no, official_contact_no, email, website, logo, image, add_date, status, users_count, activation, cities_id', 'safe', 'on'=>'search'),
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
			'careerOptionsHasInstitutes' => array(self::HAS_MANY, 'CareerOptionsHasInstitutes', 'institutes_id'),
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
			'institutesHasAffiliations' => array(self::HAS_MANY, 'InstitutesHasAffiliations', 'institutes_id'),
			'institutesHasCourses' => array(self::HAS_MANY, 'InstitutesHasCourses', 'institutes_id'),
			'userEducations' => array(self::HAS_MANY, 'UserEducation', 'institutes_id'),
			'userProfilesHasInstitutes' => array(self::HAS_MANY, 'UserProfilesHasInstitutes', 'institutes_id'),
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
			'description' => 'Description',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'pincode' => 'Pincode',
			'phone_number' => 'Phone Number',
			'work_phone_no' => 'Work Phone No',
			'official_contact_no' => 'Official Contact No',
			'email' => 'Email',
			'website' => 'Website',
			'logo' => 'Logo',
			'image' => 'Image',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'users_count' => 'Users Count',
			'activation' => 'Activation',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('pincode',$this->pincode,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('work_phone_no',$this->work_phone_no,true);
		$criteria->compare('official_contact_no',$this->official_contact_no,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('users_count',$this->users_count);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('cities_id',$this->cities_id);

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
	 * @return Institutes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
