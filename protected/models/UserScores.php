<?php

/**
 * This is the model class for table "user_scores".
 *
 * The followings are the available columns in table 'user_scores':
 * @property integer $id
 * @property string $score
 * @property string $add_date
 * @property integer $published
 * @property integer $status
 * @property integer $career_categories_id
 * @property integer $user_profiles_id
 * @property integer $test_category
 *
 * The followings are the available model relations:
 * @property CareerCategories $careerCategories
 * @property UserProfiles $userProfiles
 */
class UserScores extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserScores the static model class
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
		return 'user_scores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('career_categories_id, user_profiles_id', 'required'),
			array('published, status, career_categories_id, user_profiles_id, test_category', 'numerical', 'integerOnly'=>true),
			array('score', 'length', 'max'=>45),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, score, add_date, published, status, career_categories_id, user_profiles_id, test_category', 'safe', 'on'=>'search'),
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
			'careerCategories' => array(self::BELONGS_TO, 'CareerCategories', 'career_categories_id'),
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
			'score' => 'Score',
			'add_date' => 'Add Date',
			'published' => 'Published',
			'status' => 'Status',
			'career_categories_id' => 'Career Categories',
			'user_profiles_id' => 'User Profiles',
			'test_category' => 'Test Category',
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
		$criteria->compare('score',$this->score,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('career_categories_id',$this->career_categories_id);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('test_category',$this->test_category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'add_date DESC',
			),
		));
	}
}