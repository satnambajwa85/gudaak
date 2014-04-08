<?php

/**
 * This is the model class for table "institutes_has_affiliations".
 *
 * The followings are the available columns in table 'institutes_has_affiliations':
 * @property integer $id
 * @property integer $institutes_id
 * @property integer $affiliations_id
 * @property string $filed1
 * @property string $field2
 * @property string $add_date
 * @property string $modification_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Institutes $institutes
 * @property Affiliations $affiliations
 */
class InstitutesHasAffiliations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'institutes_has_affiliations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('institutes_id, affiliations_id', 'required'),
			array('institutes_id, affiliations_id, status', 'numerical', 'integerOnly'=>true),
			array('filed1, field2', 'length', 'max'=>250),
			array('add_date, modification_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, institutes_id, affiliations_id, filed1, field2, add_date, modification_date, status', 'safe', 'on'=>'search'),
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
			'institutes' => array(self::BELONGS_TO, 'Institutes', 'institutes_id'),
			'affiliations' => array(self::BELONGS_TO, 'Affiliations', 'affiliations_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'institutes_id' => 'Institutes',
			'affiliations_id' => 'Affiliations',
			'filed1' => 'Filed1',
			'field2' => 'Field2',
			'add_date' => 'Add Date',
			'modification_date' => 'Modification Date',
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
		$criteria->compare('institutes_id',$this->institutes_id);
		$criteria->compare('affiliations_id',$this->affiliations_id);
		$criteria->compare('filed1',$this->filed1,true);
		$criteria->compare('field2',$this->field2,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('status',$this->status);

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
	 * @return InstitutesHasAffiliations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
