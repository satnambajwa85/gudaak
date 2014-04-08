<?php

/**
 * This is the model class for table "test_reports".
 *
 * The followings are the available columns in table 'test_reports':
 * @property integer $id
 * @property string $comments
 * @property integer $status
 * @property integer $activation
 * @property integer $questions_id
 * @property integer $question_options_id
 * @property integer $user_profiles_id
 * @property string $add_date
 * @property integer $test_category
 *
 * The followings are the available model relations:
 * @property QuestionOptions $questionOptions
 * @property Questions $questions
 * @property UserProfiles $userProfiles
 */
class TestReports extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	  public $career_categories_id;
	
	public function tableName()
	{
		return 'test_reports';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('questions_id, question_options_id, user_profiles_id, test_category', 'required'),
			array('status, activation, questions_id, question_options_id, user_profiles_id, test_category', 'numerical', 'integerOnly'=>true),
			array('comments', 'length', 'max'=>100),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, comments, status, activation, questions_id, question_options_id, user_profiles_id, add_date, test_category', 'safe', 'on'=>'search'),
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
			'questionOptions' => array(self::BELONGS_TO, 'QuestionOptions', 'question_options_id'),
			'questions' => array(self::BELONGS_TO, 'Questions', 'questions_id'),
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
			'comments' => 'Comments',
			'status' => 'Status',
			'activation' => 'Activation',
			'questions_id' => 'Questions',
			'question_options_id' => 'Question Options',
			'user_profiles_id' => 'User Profiles',
			'add_date' => 'Add Date',
			'test_category' => 'Test Category',
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
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('questions_id',$this->questions_id);
		$criteria->compare('question_options_id',$this->question_options_id);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('test_category',$this->test_category);

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
	 * @return TestReports the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
