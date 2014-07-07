<?php

/**
 * This is the model class for table "collage".
 *
 * The followings are the available columns in table 'collage':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $overview
 * @property string $why
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
 * @property string $city
 * @property integer $city_id
 * @property string $state
 */
class Collage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Collage the static model class
	 */
	public $courses_id,$specialisation;
	public $states_id;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'collage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, city, city_id, state', 'required'),
			array('status, users_count, activation, city_id', 'numerical', 'integerOnly'=>true),
			array('name, phone_number', 'length', 'max'=>500),
			array('address2, logo, image', 'length', 'max'=>45),
			array('pincode', 'length', 'max'=>10),
			array('work_phone_no, official_contact_no', 'length', 'max'=>13),
			array('email, website, city, state', 'length', 'max'=>255),
			array('description, overview, why, address1, add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, overview, why, address1, address2, pincode, phone_number, work_phone_no, official_contact_no, email, website, logo, image, add_date, status, users_count, activation, city, city_id, state', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'city', 'city_id'),
			'course' => array(self::HAS_MANY, 'Course', 'collage_id'),
			'collagesCoursesSpecialization' => array(self::HAS_MANY, 'CollagesCoursesSpecialization', 'collage_id'),
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
			'overview' => 'Overview',
			'why' => 'Why',
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
			'city' => 'City',
			'city_id' => 'City',
			'state' => 'State',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('overview',$this->overview,true);
		$criteria->compare('why',$this->why,true);
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
		$criteria->compare('city',$this->city,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('state',$this->state,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}