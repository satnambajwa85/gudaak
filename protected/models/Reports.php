<?php

/**
 * This is the model class for table "reports".
 *
 * The followings are the available columns in table 'reports':
 * @property integer $id
 * @property string $score
 * @property string $interest
 * @property integer $status
 * @property integer $activation
 *
 * The followings are the available model relations:
 * @property TestReports[] $testReports
 * @property UserProfiles[] $userProfiles
 */
class Reports extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reports';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('score, interest', 'required'),
			array('status, activation', 'numerical', 'integerOnly'=>true),
			array('score, interest', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, score, interest, status, activation', 'safe', 'on'=>'search'),
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
			'testReports' => array(self::HAS_MANY, 'TestReports', 'reports_id'),
			'userProfiles' => array(self::MANY_MANY, 'UserProfiles', 'user_profiles_has_reports(reports_id, user_profiles_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'score' => 'Score',
			'interest' => 'Interest',
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
		$criteria->compare('score',$this->score,true);
		$criteria->compare('interest',$this->interest,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('activation',$this->activation);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reports the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
