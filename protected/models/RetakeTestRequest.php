<?php

/**
 * This is the model class for table "retake_test_request".
 *
 * The followings are the available columns in table 'retake_test_request':
 * @property integer $id
 * @property integer $orient_items_id
 * @property integer $user_profiles_id
 * @property string $title
 * @property string $description
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property UserProfiles $userProfiles
 * @property OrientItems $orientItems
 */
class RetakeTestRequest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'retake_test_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orient_items_id, user_profiles_id,title,description', 'required'),
			array('orient_items_id, user_profiles_id, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('description, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, orient_items_id, user_profiles_id, title, description, add_date, status', 'safe', 'on'=>'search'),
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
			'orientItems' => array(self::BELONGS_TO, 'OrientItems', 'orient_items_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'orient_items_id' => 'Orient Items',
			'user_profiles_id' => 'User Profiles',
			'title' => 'Title',
			'description' => 'Description',
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
		$criteria->compare('orient_items_id',$this->orient_items_id);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
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
	 * @return RetakeTestRequest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
