<?php

/**
 * This is the model class for table "career_options".
 *
 * The followings are the available columns in table 'career_options':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $add_date
 * @property string $modification_date
 * @property integer $published
 * @property integer $status
 * @property integer $career_id
 * @property integer $rating
 *
 * The followings are the available model relations:
 * @property CareerDetails[] $careerDetails
 * @property Career $career
 * @property CareerOptionsHasInstitutes[] $careerOptionsHasInstitutes
 * @property CareerOptionsHasStream[] $careerOptionsHasStreams
 * @property CareerOptionsHasSubjects[] $careerOptionsHasSubjects
 * @property UserCareerPreference[] $userCareerPreferences
 * @property UserRating[] $userRatings
 */
class CareerOptions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CareerOptions the static model class
	 */
	public $career_categories_id;
	public $streams;
	public $subjects;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'career_options';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, career_id', 'required'),
			array('published, status, career_id, rating', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('image', 'length', 'max'=>45),
			array('description, add_date, modification_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, image, add_date, modification_date, published, status, career_id, rating', 'safe', 'on'=>'search'),
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
			'careerDetails' => array(self::HAS_MANY, 'CareerDetails', 'career_options_id'),
			'career' => array(self::BELONGS_TO, 'Career', 'career_id'),
			'careerOptionsHasInstitutes' => array(self::HAS_MANY, 'CareerOptionsHasInstitutes', 'career_options_id'),
			'careerOptionsHasStreams' => array(self::HAS_MANY, 'CareerOptionsHasStream', 'career_options_id'),
			'careerOptionsHasSubjects' => array(self::HAS_MANY, 'CareerOptionsHasSubjects', 'career_options_id'),
			'userCareerPreferences' => array(self::HAS_MANY, 'UserCareerPreference', 'career_options_id'),
			'userRatings' => array(self::HAS_MANY, 'UserRating', 'career_options_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'image' => 'Image',
			'add_date' => 'Add Date',
			'modification_date' => 'Modification Date',
			'published' => 'Published',
			'status' => 'Status',
			'career_id' => 'Career',
			'rating' => 'Rating',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('career_id',$this->career_id);
		$criteria->compare('rating',$this->rating);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'add_date DESC',
			),
		));
	}
}