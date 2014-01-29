<?php

/**
 * This is the model class for table "career_options_has_subjects".
 *
 * The followings are the available columns in table 'career_options_has_subjects':
 * @property integer $id
 * @property integer $career_options_id
 * @property integer $subjects_id
 *
 * The followings are the available model relations:
 * @property CareerOptions $careerOptions
 * @property Subjects $subjects
 */
class CareerOptionsHasSubjects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'career_options_has_subjects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('career_options_id, subjects_id', 'required'),
			array('career_options_id, subjects_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, career_options_id, subjects_id', 'safe', 'on'=>'search'),
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
			'careerOptions' => array(self::BELONGS_TO, 'CareerOptions', 'career_options_id'),
			'subjects' => array(self::BELONGS_TO, 'Subjects', 'subjects_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'career_options_id' => 'Career Options',
			'subjects_id' => 'Subjects',
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
		$criteria->compare('career_options_id',$this->career_options_id);
		$criteria->compare('subjects_id',$this->subjects_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CareerOptionsHasSubjects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
