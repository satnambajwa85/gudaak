<?php

/**
 * This is the model class for table "articles".
 *
 * The followings are the available columns in table 'articles':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $add_date
 * @property string $image
 * @property integer $published
 * @property integer $status
 * @property integer $user_login_id
 * @property string $author
 * @property string $role
 *
 * The followings are the available model relations:
 * @property UserLogin $userLogin
 */
class Articles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Articles the static model class
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
		return 'articles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, add_date, user_login_id', 'required'),
			array('published, status, user_login_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>500),
			array('image', 'length', 'max'=>45),
			array('author', 'length', 'max'=>255),
			array('role', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, add_date, image, published, status, user_login_id, author, role', 'safe', 'on'=>'search'),
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
			'userLogin' => array(self::BELONGS_TO, 'UserLogin', 'user_login_id'),
			'comments' => array(self::HAS_MANY, 'Articles', 'articles_id'),
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
			'add_date' => 'Add Date',
			'image' => 'Image',
			'published' => 'Published',
			'status' => 'Status',
			'user_login_id' => 'User Login',
			'author' => 'Author',
			'role' => 'About Author',
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
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_login_id',$this->user_login_id);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('role',$this->role,true);
		
		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'add_date DESC',
			),
		));
	}
}