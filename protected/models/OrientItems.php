<?php

/**
 * This is the model class for table "orient_items".
 *
 * The followings are the available columns in table 'orient_items':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property string $image
 * @property string $video_link
 * @property string $add_date
 * @property integer $published
 * @property integer $status
 * @property integer $orient_categories_id
 *
 * The followings are the available model relations:
 * @property OrientCategories $orientCategories
 * @property Questions[] $questions
 * @property UserReports[] $userReports
 */
class OrientItems extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orient_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, alias, description, orient_categories_id', 'required'),
			array('published, status, orient_categories_id', 'numerical', 'integerOnly'=>true),
			array('title, alias', 'length', 'max'=>500),
			array('image', 'length', 'max'=>45),
			array('video_link', 'length', 'max'=>300),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, alias, description, image, video_link, add_date, published, status, orient_categories_id', 'safe', 'on'=>'search'),
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
			'orientCategories' => array(self::BELONGS_TO, 'OrientCategories', 'orient_categories_id'),
			'questions' => array(self::HAS_MANY, 'Questions', 'orient_items_id'),
			'userReports' => array(self::HAS_MANY, 'UserReports', 'orient_items_id'),
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
			'video_link' => 'Video Link',
			'add_date' => 'Add Date',
			'published' => 'Published',
			'status' => 'Status',
			'orient_categories_id' => 'Orient Categories',
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
		$criteria->compare('video_link',$this->video_link,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('orient_categories_id',$this->orient_categories_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrientItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
