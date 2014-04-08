<?php

/**
 * This is the model class for table "user_profiles_has_institutes".
 *
 * The followings are the available columns in table 'user_profiles_has_institutes':
 * @property integer $id
 * @property integer $user_profiles_id
 * @property integer $institutes_id
 * @property string $add_date
 * @property string $modified_date
 * @property integer $status
 * @property integer $published
 * @property integer $user_count
 * @property string $field1
 * @property string $field2
 *
 * The followings are the available model relations:
 * @property UserProfiles $userProfiles
 * @property Institutes $institutes
 */
class UserProfilesHasInstitutes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_profiles_has_institutes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_profiles_id, institutes_id', 'required'),
			array('user_profiles_id, institutes_id, status, published, user_count', 'numerical', 'integerOnly'=>true),
			array('field1, field2', 'length', 'max'=>45),
			array('add_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_profiles_id, institutes_id, add_date, modified_date, status, published, user_count, field1, field2', 'safe', 'on'=>'search'),
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
			'institutes' => array(self::BELONGS_TO, 'Institutes', 'institutes_id'),
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
			'institutes_id' => 'Institutes',
			'add_date' => 'Add Date',
			'modified_date' => 'Modified Date',
			'status' => 'Status',
			'published' => 'Published',
			'user_count' => 'User Count',
			'field1' => 'Field1',
			'field2' => 'Field2',
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
		$criteria->compare('institutes_id',$this->institutes_id);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('published',$this->published);
		$criteria->compare('user_count',$this->user_count);
		$criteria->compare('field1',$this->field1,true);
		$criteria->compare('field2',$this->field2,true);

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
	 * @return UserProfilesHasInstitutes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
