<?php

/**
 * This is the model class for table "user_profiles_has_user_subjects".
 *
 * The followings are the available columns in table 'user_profiles_has_user_subjects':
 * @property integer $id
 * @property integer $user_profiles_id
 * @property integer $user_subjects_id
 * @property string $add_date
 * @property string $modification_date
 * @property integer $status
 * @property integer $is_featured
 * @property integer $least_favourite
 * @property integer $is_favorite
 *
 * The followings are the available model relations:
 * @property UserProfiles $userProfiles
 * @property UserSubjects $userSubjects
 */
class UserProfilesHasUserSubjects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_profiles_has_user_subjects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_profiles_id, user_subjects_id', 'required'),
			array('user_profiles_id, user_subjects_id, status, is_featured, least_favourite, is_favorite', 'numerical', 'integerOnly'=>true),
			array('add_date, modification_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_profiles_id, user_subjects_id, add_date, modification_date, status, is_featured, least_favourite, is_favorite', 'safe', 'on'=>'search'),
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
			'userSubjects' => array(self::BELONGS_TO, 'UserSubjects', 'user_subjects_id'),
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
			'user_subjects_id' => 'User Subjects',
			'add_date' => 'Add Date',
			'modification_date' => 'Modification Date',
			'status' => 'Status',
			'is_featured' => 'Is Featured',
			'least_favourite' => 'Least Favourite',
			'is_favorite' => 'Is Favorite',
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
		$criteria->compare('user_subjects_id',$this->user_subjects_id);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('is_featured',$this->is_featured);
		$criteria->compare('least_favourite',$this->least_favourite);
		$criteria->compare('is_favorite',$this->is_favorite);

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
	 * @return UserProfilesHasUserSubjects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
