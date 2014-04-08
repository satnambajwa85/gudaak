<?php

/**
 * This is the model class for table "slider".
 *
 * The followings are the available columns in table 'slider':
 * @property integer $id
 * @property string $title1
 * @property string $title2
 * @property string $test_type_title1
 * @property string $test_type_title2
 * @property string $description1
 * @property string $description2
 * @property string $image1
 * @property string $image2
 * @property integer $published
 * @property integer $status
 * @property string $add_date
 */
class Slider extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'slider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title1, test_type_title1, description1, image1', 'required'),
			array('published, status', 'numerical', 'integerOnly'=>true),
			array('title1, title2', 'length', 'max'=>500),
			array('test_type_title1, test_type_title2', 'length', 'max'=>250),
			array('image1, image2', 'length', 'max'=>45),
			array('description2, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title1, title2, test_type_title1, test_type_title2, description1, description2, image1, image2, published, status, add_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title1' => 'Title1',
			'title2' => 'Title2',
			'test_type_title1' => 'Test Type Title1',
			'test_type_title2' => 'Test Type Title2',
			'description1' => 'Description1',
			'description2' => 'Description2',
			'image1' => 'Image1',
			'image2' => 'Image2',
			'published' => 'Published',
			'status' => 'Status',
			'add_date' => 'Add Date',
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
		$criteria->compare('title1',$this->title1,true);
		$criteria->compare('title2',$this->title2,true);
		$criteria->compare('test_type_title1',$this->test_type_title1,true);
		$criteria->compare('test_type_title2',$this->test_type_title2,true);
		$criteria->compare('description1',$this->description1,true);
		$criteria->compare('description2',$this->description2,true);
		$criteria->compare('image1',$this->image1,true);
		$criteria->compare('image2',$this->image2,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'add_date DESC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Slider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
