<?php

/**
 * This is the model class for table "user_profiles_has_test".
 *
 * The followings are the available columns in table 'user_profiles_has_test':
 * @property integer $id
 * @property integer $user_profiles_id
 * @property integer $entrance_exams_id
 * @property string $add_date
 */
class UserProfilesHasTest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserProfilesHasTest the static model class
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
		return 'user_profiles_has_test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_profiles_id, entrance_exams_id', 'required'),
			array('user_profiles_id, entrance_exams_id', 'numerical', 'integerOnly'=>true),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_profiles_id, entrance_exams_id, add_date', 'safe', 'on'=>'search'),
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
			'test' => array(self::BELONGS_TO, 'EntranceExams', 'entrance_exams_id'),
			'userProfiles' => array(self::BELONGS_TO, 'UserProfiles', 'user_profiles_id'),
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
			'entrance_exams_id' => 'Entrance Exams',
			'add_date' => 'Add Date',
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
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('entrance_exams_id',$this->entrance_exams_id);
		$criteria->compare('add_date',$this->add_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}