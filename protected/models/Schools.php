<?php

/**
 * This is the model class for table "schools".
 *
 * The followings are the available columns in table 'schools':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $display_name
 * @property string $email
 * @property string $mobile_no
 * @property string $fax
 * @property string $address
 * @property string $address2
 * @property string $postcode
 * @property integer $activation
 * @property string $telephone_no
 * @property string $images
 * @property string $website
 * @property string $modification_date
 * @property string $add_date
 * @property integer $status
 * @property integer $cities_id
 *
 * The followings are the available model relations:
 * @property GenerateGudaakIds[] $generateGudaakIds
 * @property SchoolsHasUserLogin[] $schoolsHasUserLogins
 */
class Schools extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $password;
	public $states_id;
	public $countries_id;
	public function tableName()
	{
		return 'schools';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),
			array('email', 'email'),
			array('password', 'required'),
			array('password', 'length', 'max' => 50, 'min' => 6, 'tooShort' => 'Password must have at least 6 chars'),
			array('name, cities_id', 'required'),
			array('activation, status, cities_id', 'numerical', 'integerOnly'=>true),
			array('name, display_name, address, address2, website', 'length', 'max'=>500),
			array('email', 'length', 'max'=>150),
			array('email', 'unique'),
			array('mobile_no, fax, telephone_no', 'length', 'max'=>15),
			array('postcode', 'length', 'max'=>6),
			array('images', 'length', 'max'=>45),
			array('description, modification_date, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, display_name, email, mobile_no, fax, address, address2, postcode, activation, telephone_no, images, website, modification_date, add_date, status, cities_id', 'safe', 'on'=>'search'),
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
			'generateGudaakIds' => array(self::HAS_MANY, 'GenerateGudaakIds', 'schools_id'),
			'cities' => array(self::BELONGS_TO, 'cities', 'cities_id'),
			'schoolsHasUserLogins' => array(self::HAS_MANY, 'SchoolsHasUserLogin', 'schools_id'),
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
			'display_name' => 'Display Name',
			'email' => 'Email',
			'mobile_no' => 'Mobile No',
			'fax' => 'Fax',
			'address' => 'Address',
			'address2' => 'Address2',
			'postcode' => 'Postcode',
			'activation' => 'Activation',
			'telephone_no' => 'Telephone No',
			'images' => 'Images',
			'website' => 'Website',
			'modification_date' => 'Modification Date',
			'add_date' => 'Add Date',
			'status' => 'Status',
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
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('telephone_no',$this->telephone_no,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
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
	 * @return Schools the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
