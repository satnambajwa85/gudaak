<?php

/**
 * This is the model class for table "user_stream_rating".
 *
 * The followings are the available columns in table 'user_stream_rating':
 * @property integer $id
 * @property string $rating
 * @property string $add_date
 * @property integer $published
 * @property integer $status
 * @property integer $user_profiles_id
 * @property integer $stream_id
 *
 * The followings are the available model relations:
 * @property UserProfiles $userProfiles
 * @property Stream $stream
 */
class UserStreamRating extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_stream_rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rating, user_profiles_id, stream_id', 'required'),
			array('published, status, user_profiles_id, stream_id', 'numerical', 'integerOnly'=>true),
			array('rating', 'length', 'max'=>45),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rating, add_date, published, status, user_profiles_id, stream_id', 'safe', 'on'=>'search'),
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
			'rating' => 'Rating',
			'add_date' => 'Add Date',
			'published' => 'Published',
			'status' => 'Status',
			'user_profiles_id' => 'User Profiles',
			'stream_id' => 'Stream',
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
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('stream_id',$this->stream_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserStreamRating the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
