<?php

/**
 * This is the model class for table "questions".
 *
 * The followings are the available columns in table 'questions':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property string $image
 * @property integer $published
 * @property integer $status
 * @property integer $career_categories_id
 * @property integer $orient_items_id
 *
 * The followings are the available model relations:
 * @property CareerCategories $careerCategories
 * @property OrientItems $orientItems
 * @property QuestionsHasQuestionOptions[] $questionsHasQuestionOptions
 * @property TestReports[] $testReports
 */
class Questions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $options;
	public function tableName()
	{
		return 'questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, alias, description, career_categories_id, orient_items_id', 'required'),
			array('published, status, career_categories_id, orient_items_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>500),
			array('alias', 'length', 'max'=>100),
			array('image', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, alias, description, image, published, status, career_categories_id, orient_items_id', 'safe', 'on'=>'search'),
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
			'orientItems' => array(self::BELONGS_TO, 'OrientItems', 'orient_items_id'),
			'questionsHasQuestionOptions' => array(self::HAS_MANY, 'QuestionsHasQuestionOptions', 'questions_id'),
			'testReports' => array(self::HAS_MANY, 'TestReports', 'questions_id'),
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
			'alias' => 'Alias',
			'description' => 'Description',
			'image' => 'Image',
			'published' => 'Published',
			'status' => 'Status',
			'career_categories_id' => 'Career Categories',
			'orient_items_id' => 'Orient Items',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('career_categories_id',$this->career_categories_id);
		$criteria->compare('orient_items_id',$this->orient_items_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Questions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
