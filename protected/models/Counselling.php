<?php

/**
 * This is the model class for table "counselling".
 *
 * The followings are the available columns in table 'counselling':
 * @property integer $id
 * @property integer $counselor_id
 * @property integer $user_profiles_id
 * @property string $type
 * @property string $counselor_comments
 * @property string $user_comments
 * @property string $add_date
 * @property integer $published
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Counselor $counselor
 * @property UserProfiles $userProfiles
 * @property CounselorDetails[] $counselorDetails
 */
class Counselling extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'counselling';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('counselor_id, user_profiles_id', 'required'),
			array('counselor_id, user_profiles_id, published, status', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>50),
			array('counselor_comments, user_comments, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, counselor_id, user_profiles_id, type, counselor_comments, user_comments, add_date, published, status', 'safe', 'on'=>'search'),
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
			'userProfiles' => array(self::BELONGS_TO, 'UserProfiles', 'user_profiles_id'),
			'counselorDetails' => array(self::HAS_MANY, 'CounselorDetails', 'counselling_id'),
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
			'user_profiles_id' => 'User Profiles',
			'type' => 'Type',
			'counselor_comments' => 'Counselor Comments',
			'user_comments' => 'User Comments',
			'add_date' => 'Add Date',
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
		$criteria->compare('counselor_id',$this->counselor_id);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('counselor_comments',$this->counselor_comments,true);
		$criteria->compare('user_comments',$this->user_comments,true);
		$criteria->compare('add_date',$this->add_date,true);
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
	 * @return Counselling the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
