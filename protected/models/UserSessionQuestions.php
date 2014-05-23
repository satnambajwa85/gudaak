<?php

/**
 * This is the model class for table "user_session_questions".
 *
 * The followings are the available columns in table 'user_session_questions':
 * @property integer $id
 * @property integer $user_id
 * @property integer $session_questions_id
 * @property string $answer
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SessionQuestions $sessionQuestions
 * @property UserProfiles $user
 */
class UserSessionQuestions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserSessionQuestions the static model class
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
		return 'user_session_questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, session_questions_id', 'required'),
			array('user_id, session_questions_id, status', 'numerical', 'integerOnly'=>true),
			array('answer, add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, session_questions_id, answer, add_date, status', 'safe', 'on'=>'search'),
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
			'sessionQuestions' => array(self::BELONGS_TO, 'SessionQuestions', 'session_questions_id'),
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
			'session_questions_id' => 'Session Questions',
			'answer' => 'Answer',
			'add_date' => 'Add Date',
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
		$criteria->compare('session_questions_id',$this->session_questions_id);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}