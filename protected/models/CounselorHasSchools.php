<?php

/**
 * This is the model class for table "counselor_has_schools".
 *
 * The followings are the available columns in table 'counselor_has_schools':
 * @property integer $id
 * @property integer $counselor_id
 * @property integer $schools_id
 * @property integer $service_type
 * @property string $add_date
 * @property integer $status
 */
class CounselorHasSchools extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CounselorHasSchools the static model class
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
		return 'counselor_has_schools';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('counselor_id, schools_id, service_type, add_date, status', 'required'),
			array('counselor_id, schools_id, service_type, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, counselor_id, schools_id, service_type, add_date, status', 'safe', 'on'=>'search'),
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
		'counselor' => array(self::BELONGS_TO, 'Counselor', 'counselor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'counselor_id' => 'Counselor',
			'schools_id' => 'Schools',
			'service_type' => 'Service Type',
			'add_date' => 'Add Date',
			'status' => 'Status',
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
		$criteria->compare('counselor_id',$this->counselor_id);
		$criteria->compare('schools_id',$this->schools_id);
		$criteria->compare('service_type',$this->service_type);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}