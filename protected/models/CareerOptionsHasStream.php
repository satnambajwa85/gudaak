<?php

/**
 * This is the model class for table "career_options_has_stream".
 *
 * The followings are the available columns in table 'career_options_has_stream':
 * @property integer $id
 * @property integer $career_options_id
 * @property integer $stream_id
 * @property integer $published
 * @property integer $status
 * @property string $add_date
 *
 * The followings are the available model relations:
 * @property CareerOptions $careerOptions
 * @property Stream $stream
 */
class CareerOptionsHasStream extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'career_options_has_stream';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('career_options_id, stream_id', 'required'),
			array('career_options_id, stream_id, published, status', 'numerical', 'integerOnly'=>true),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, career_options_id, stream_id, published, status, add_date', 'safe', 'on'=>'search'),
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
			'stream' => array(self::BELONGS_TO, 'Stream', 'stream_id'),
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
			'stream_id' => 'Stream',
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
		$criteria->compare('career_options_id',$this->career_options_id);
		$criteria->compare('stream_id',$this->stream_id);
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
	 * @return CareerOptionsHasStream the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
