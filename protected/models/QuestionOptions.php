<?php

/**
 * This is the model class for table "question_options".
 *
 * The followings are the available columns in table 'question_options':
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $description
 * @property string $interest_value
 * @property string $add_date
 * @property integer $status
 * @property integer $activation
 *
 * The followings are the available model relations:
 * @property QuestionsHasQuestionOptions[] $questionsHasQuestionOptions
 * @property TestReports[] $testReports
 */
class QuestionOptions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question_options';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, value, description, interest_value', 'required'),
			array('status, activation', 'numerical', 'integerOnly'=>true),
			array('name, value, interest_value', 'length', 'max'=>45),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, value, description, interest_value, add_date, status, activation', 'safe', 'on'=>'search'),
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
			'questionsHasQuestionOptions' => array(self::HAS_MANY, 'QuestionsHasQuestionOptions', 'question_options_id'),
			'testReports' => array(self::HAS_MANY, 'TestReports', 'question_options_id'),
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
			'value' => 'Value',
			'description' => 'Description',
			'interest_value' => 'Interest Value',
			'add_date' => 'Add Date',
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
		$criteria->compare('value',$this->value,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('interest_value',$this->interest_value,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('activation',$this->activation);

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
	 * @return QuestionOptions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
