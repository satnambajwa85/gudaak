<?php

/**
 * This is the model class for table "site_setting".
 *
 * The followings are the available columns in table 'site_setting':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $email
 * @property string $fax
 * @property string $currency
 * @property string $web_site
 * @property string $phone_no
 * @property string $mobile_no
 * @property string $fb_link
 * @property string $twittwe_link
 * @property string $linkedin_link
 * @property string $youtube_link
 * @property string $logo
 * @property string $add_date
 * @property integer $site_alais
 * @property integer $published
 * @property integer $status
 * @property string $site_meta
 */
class SiteSetting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'site_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, email, fax, currency, web_site, phone_no, mobile_no, fb_link, twittwe_link, linkedin_link, youtube_link, logo, add_date', 'required'),
			array('site_alais, published, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>500),
			array('email', 'length', 'max'=>100),
			array('fax, phone_no, mobile_no, logo', 'length', 'max'=>45),
			array('currency', 'length', 'max'=>3),
			array('web_site, fb_link, twittwe_link, linkedin_link, youtube_link', 'length', 'max'=>255),
			array('site_meta', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, email, fax, currency, web_site, phone_no, mobile_no, fb_link, twittwe_link, linkedin_link, youtube_link, logo, add_date, site_alais, published, status, site_meta', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'email' => 'Email',
			'fax' => 'Fax',
			'currency' => 'Currency',
			'web_site' => 'Web Site',
			'phone_no' => 'Phone No',
			'mobile_no' => 'Mobile No',
			'fb_link' => 'Fb Link',
			'twittwe_link' => 'Twittwe Link',
			'linkedin_link' => 'Linkedin Link',
			'youtube_link' => 'Youtube Link',
			'logo' => 'Logo',
			'add_date' => 'Add Date',
			'site_alais' => 'Site Alais',
			'published' => 'Published',
			'status' => 'Status',
			'site_meta' => 'Site Meta',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('web_site',$this->web_site,true);
		$criteria->compare('phone_no',$this->phone_no,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('fb_link',$this->fb_link,true);
		$criteria->compare('twittwe_link',$this->twittwe_link,true);
		$criteria->compare('linkedin_link',$this->linkedin_link,true);
		$criteria->compare('youtube_link',$this->youtube_link,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('site_alais',$this->site_alais);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('site_meta',$this->site_meta,true);

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
	 * @return SiteSetting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
