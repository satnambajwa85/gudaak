<?php

/**
 * This is the model class for table "career_assessment".
 *
 * The followings are the available columns in table 'career_assessment':
 * @property integer $id
 * @property integer $score_start
 * @property string $description
 * @property string $add_date
 * @property integer $published
 * @property integer $status
 * @property string $field1
 * @property integer $score_end
 * @property integer $career_categories_id
 *
 * The followings are the available model relations:
 * @property CareerCategories $careerCategories
 */
class CareerAssessment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'career_assessment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('score_start, description, add_date, score_end, career_categories_id', 'required'),
			array('score_start, published, status, score_end, career_categories_id', 'numerical', 'integerOnly'=>true),
			array('field1', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, score_start, description, add_date, published, status, field1, score_end, career_categories_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'score_start' => 'Score Start',
			'description' => 'Description',
			'add_date' => 'Add Date',
			'published' => 'Published',
			'status' => 'Status',
			'field1' => 'Field1',
			'score_end' => 'Score End',
			'career_categories_id' => 'Career Categories',
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
		$criteria->compare('score_start',$this->score_start);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('field1',$this->field1,true);
		$criteria->compare('score_end',$this->score_end);
		$criteria->compare('career_categories_id',$this->career_categories_id);

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
	 * @return CareerAssessment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
