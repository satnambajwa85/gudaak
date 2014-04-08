<?php

/**
 * This is the model class for table "user_comments".
 *
 * The followings are the available columns in table 'user_comments':
 * @property integer $id
 * @property string $comments
 * @property string $user_responce
 * @property string $add_date
 * @property integer $status
 * @property integer $user_profiles_id
 * @property integer $stream_id
 *
 * The followings are the available model relations:
 * @property UserProfiles $userProfiles
 * @property Stream $stream
 */
class UserComments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserComments the static model class
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
		return 'user_comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comments, user_responce, user_profiles_id, stream_id', 'required'),
			array('status, user_profiles_id, stream_id', 'numerical', 'integerOnly'=>true),
			array('user_responce', 'length', 'max'=>45),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, comments, user_responce, add_date, status, user_profiles_id, stream_id', 'safe', 'on'=>'search'),
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
			'stream' => array(self::BELONGS_TO, 'Stream', 'stream_id'),
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
			'user_responce' => 'User Responce',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'user_profiles_id' => 'User Profiles',
			'stream_id' => 'Stream',
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
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('user_responce',$this->user_responce,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('stream_id',$this->stream_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'add_date DESC',
			),
		));
	}
}