<?php

/**
 * This is the model class for table "stream_has_career".
 *
 * The followings are the available columns in table 'stream_has_career':
 * @property integer $id
 * @property integer $stream_id
 * @property integer $career_id
 * @property string $add_date
 * @property string $modification_date
 * @property integer $published
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Stream $stream
 * @property Career $career
 */
class StreamHasCareer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stream_has_career';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stream_id, career_id', 'required'),
			array('stream_id, career_id, published, status', 'numerical', 'integerOnly'=>true),
			array('add_date, modification_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, stream_id, career_id, add_date, modification_date, published, status', 'safe', 'on'=>'search'),
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
			'stream' => array(self::BELONGS_TO, 'Stream', 'stream_id'),
			'career' => array(self::BELONGS_TO, 'Career', 'career_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'stream_id' => 'Stream',
			'career_id' => 'Career',
			'add_date' => 'Add Date',
			'modification_date' => 'Modification Date',
			'published' => 'Published',
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
		$criteria->compare('stream_id',$this->stream_id);
		$criteria->compare('career_id',$this->career_id);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('published',$this->published);
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
	 * @return StreamHasCareer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
