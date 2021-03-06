<?php

/**
 * This is the model class for table "countries".
 *
 * The followings are the available columns in table 'countries':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property string $image
 * @property string $code_1
 * @property string $code_2
 * @property string $add_date
 * @property integer $status
 * @property integer $published
 *
 * The followings are the available model relations:
 * @property States[] $states
 */
class Countries extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'countries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, alias, description, add_date', 'required'),
			array('status, published', 'numerical', 'integerOnly'=>true),
			array('title, alias', 'length', 'max'=>100),
			array('image, code_1, code_2', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, alias, description, image, code_1, code_2, add_date, status, published', 'safe', 'on'=>'search'),
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
			'states' => array(self::HAS_MANY, 'States', 'countries_id'),
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
			'code_1' => 'Code 1',
			'code_2' => 'Code 2',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'published' => 'Published',
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
		$criteria->compare('code_1',$this->code_1,true);
		$criteria->compare('code_2',$this->code_2,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('published',$this->published);

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
	 * @return Countries the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
