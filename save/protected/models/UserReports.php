<?php

/**
 * This is the model class for table "user_reports".
 *
 * The followings are the available columns in table 'user_reports':
 * @property integer $id
 * @property integer $user_profiles_id
 * @property string $score
 * @property string $interest
 * @property integer $activation
 * @property integer $status
 * @property string $add_date
 * @property integer $orient_items_id
 *
 * The followings are the available model relations:
 * @property UserProfiles $userProfiles
 * @property OrientItems $orientItems
 */
class UserReports extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_reports';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_profiles_id, orient_items_id', 'required'),
			array('user_profiles_id, activation, status, orient_items_id', 'numerical', 'integerOnly'=>true),
			array('score, interest', 'length', 'max'=>45),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_profiles_id, score, interest, activation, status, add_date, orient_items_id', 'safe', 'on'=>'search'),
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
			'user_profiles_id' => 'User Profiles',
			'score' => 'Score',
			'interest' => 'Interest',
			'activation' => 'Activation',
			'status' => 'Status',
			'add_date' => 'Add Date',
			'orient_items_id' => 'Orient Items',
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
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('score',$this->score,true);
		$criteria->compare('interest',$this->interest,true);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('orient_items_id',$this->orient_items_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserReports the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
