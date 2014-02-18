<?php

/**
 * This is the model class for table "stream".
 *
 * The followings are the available columns in table 'stream':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $add_date
 * @property integer $featured
 * @property string $rating
 * @property integer $status
 * @property integer $activation
 *
 * The followings are the available model relations:
 * @property CareerOptionsHasStream[] $careerOptionsHasStreams
 * @property StreamHasSubjects[] $streamHasSubjects
 * @property UserEducation[] $userEducations
 * @property UserProfilesHasStream[] $userProfilesHasStreams
 * @property UserStreamComments[] $userStreamComments
 * @property UserStreamRating[] $userStreamRatings
 */
class Stream extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stream';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('featured, status, activation', 'numerical', 'integerOnly'=>true),
			array('name, image', 'length', 'max'=>45),
			array('rating', 'length', 'max'=>10),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, image, add_date, featured, rating, status, activation', 'safe', 'on'=>'search'),
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
			'careerOptionsHasStreams' => array(self::HAS_MANY, 'CareerOptionsHasStream', 'stream_id'),
			'streamHasSubjects' => array(self::HAS_MANY, 'StreamHasSubjects', 'stream_id'),
			'userEducations' => array(self::HAS_MANY, 'UserEducation', 'stream_id'),
			'userProfilesHasStreams' => array(self::HAS_MANY, 'UserProfilesHasStream', 'stream_id'),
			'userStreamComments' => array(self::HAS_MANY, 'UserStreamComments', 'stream_id'),
			'userStreamRatings' => array(self::HAS_MANY, 'UserStreamRating', 'stream_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'image' => 'Image',
			'add_date' => 'Add Date',
			'featured' => 'Featured',
			'rating' => 'Rating',
			'status' => 'Status',
			'activation' => 'Activation',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('featured',$this->featured);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('activation',$this->activation);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stream the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
