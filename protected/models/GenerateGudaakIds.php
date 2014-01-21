<?php

/**
 * This is the model class for table "generate_gudaak_ids".
 *
 * The followings are the available columns in table 'generate_gudaak_ids':
 * @property integer $id
 * @property integer $gudaak_id
 * @property integer $cities_id
 * @property integer $schools_id
 * @property string $add_date
 * @property integer $activation
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Cities $cities
 * @property Schools $schools
 * @property UserProfiles[] $userProfiles
 */
class GenerateGudaakIds extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'generate_gudaak_ids';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gudaak_id, cities_id, schools_id, add_date', 'required'),
			array('gudaak_id, cities_id, schools_id, activation, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, gudaak_id, cities_id, schools_id, add_date, activation, status', 'safe', 'on'=>'search'),
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
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
			'schools' => array(self::BELONGS_TO, 'Schools', 'schools_id'),
			'userProfiles' => array(self::HAS_MANY, 'UserProfiles', 'generate_gudaak_ids_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'gudaak_id' => 'Gudaak',
			'cities_id' => 'Cities',
			'schools_id' => 'Schools',
			'add_date' => 'Add Date',
			'activation' => 'Activation',
			'status' => 'Status',
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
		$criteria->compare('gudaak_id',$this->gudaak_id);
		$criteria->compare('cities_id',$this->cities_id);
		$criteria->compare('schools_id',$this->schools_id);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GenerateGudaakIds the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
