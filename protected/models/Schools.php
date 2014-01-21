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
 * @property integer $activation
 * @property string $telephone_no
 * @property string $images
 * @property string $website
 * @property string $modification_date
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property GenerateGudaakIds[] $generateGudaakIds
 * @property UserLogin[] $userLogins
 */
class Schools extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
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
			array('name, add_date', 'required'),
			array('activation, status', 'numerical', 'integerOnly'=>true),
			array('name, display_name, address, website', 'length', 'max'=>500),
			array('email', 'length', 'max'=>150),
			array('mobile_no, fax, telephone_no', 'length', 'max'=>15),
			array('images', 'length', 'max'=>45),
			array('description, modification_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, display_name, email, mobile_no, fax, address, activation, telephone_no, images, website, modification_date, add_date, status', 'safe', 'on'=>'search'),
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
			'userLogins' => array(self::MANY_MANY, 'UserLogin', 'schools_has_user_login(schools_id, user_login_id)'),
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
			'activation' => 'Activation',
			'telephone_no' => 'Telephone No',
			'images' => 'Images',
			'website' => 'Website',
			'modification_date' => 'Modification Date',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('telephone_no',$this->telephone_no,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
