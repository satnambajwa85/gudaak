<?php

/**
 * This is the model class for table "career".
 *
 * The followings are the available columns in table 'career':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $add_date
 * @property string $modification_date
 * @property integer $published
 * @property integer $status
 * @property integer $career_categories_id
 *
 * The followings are the available model relations:
 * @property CareerCategories $careerCategories
 * @property CareerOptions[] $careerOptions
 * @property StreamHasCareer[] $streamHasCareers
 * @property UserCareerComments[] $userCareerComments
 */
class Career extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Career the static model class
	 */
	public $streams;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'career';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, career_categories_id', 'required'),
			array('published, status, career_categories_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('image', 'length', 'max'=>45),
			array('description, add_date, modification_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, image, add_date, modification_date, published, status, career_categories_id', 'safe', 'on'=>'search'),
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
			'careerOptions' => array(self::HAS_MANY, 'CareerOptions', 'career_id'),
			'streamHasCareers' => array(self::HAS_MANY, 'StreamHasCareer', 'career_id'),
			'userCareerComments' => array(self::HAS_MANY, 'UserCareerComments', 'career_id'),
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
			'career_categories_id' => 'Career Categories',
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
		$criteria->compare('career_categories_id',$this->career_categories_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}