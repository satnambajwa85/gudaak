<?php

/**
 * This is the model class for table "user_has_session_ans".
 *
 * The followings are the available columns in table 'user_has_session_ans':
 * @property integer $id
 * @property integer $user_id
 * @property integer $session_question_id
 * @property string $answers
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SessionQuestions $sessionQuestion
 * @property UserProfiles $user
 */
class UserHasSessionAns extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserHasSessionAns the static model class
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
		return 'user_has_session_ans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, session_question_id, status', 'required'),
			array('user_id, session_question_id, status', 'numerical', 'integerOnly'=>true),
			array('answers', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, session_question_id, answers, status', 'safe', 'on'=>'search'),
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
			'sessionQuestion' => array(self::BELONGS_TO, 'SessionQuestions', 'session_question_id'),
			'user' => array(self::BELONGS_TO, 'UserProfiles', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'session_question_id' => 'Session Question',
			'answers' => 'Answers',
			'status' => 'Status',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('session_question_id',$this->session_question_id);
		$criteria->compare('answers',$this->answers,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}