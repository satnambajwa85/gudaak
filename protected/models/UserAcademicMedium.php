<?php

/**
 * This is the model class for table "user_academic_medium".
 *
 * The followings are the available columns in table 'user_academic_medium':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $add_date
 * @property integer $published
 * @property integer $status
 * @property string $fileld1
 * @property string $field2
 * @property integer $user_class_id
 *
 * The followings are the available model relations:
 * @property UserClass $userClass
 * @property UserAcademicSubjects[] $userAcademicSubjects
 * @property UserProfiles[] $userProfiles
 */
class UserAcademicMedium extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_academic_medium';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, add_date, user_class_id', 'required'),
			array('published, status, user_class_id', 'numerical', 'integerOnly'=>true),
			array('title, fileld1, field2', 'length', 'max'=>45),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, add_date, published, status, fileld1, field2, user_class_id', 'safe', 'on'=>'search'),
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
			'userClass' => array(self::BELONGS_TO, 'UserClass', 'user_class_id'),
			'userAcademicSubjects' => array(self::HAS_MANY, 'UserAcademicSubjects', 'user_academic_medium_id'),
			'userProfiles' => array(self::HAS_MANY, 'UserProfiles', 'user_academic_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'add_date' => 'Add Date',
			'published' => 'Published',
			'status' => 'Status',
			'fileld1' => 'Fileld1',
			'field2' => 'Field2',
			'user_class_id' => 'User Class',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('fileld1',$this->fileld1,true);
		$criteria->compare('field2',$this->field2,true);
		$criteria->compare('user_class_id',$this->user_class_id);

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
	 * @return UserAcademicMedium the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
