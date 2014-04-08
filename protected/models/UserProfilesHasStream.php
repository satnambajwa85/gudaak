<?php

/**
 * This is the model class for table "user_profiles_has_stream".
 *
 * The followings are the available columns in table 'user_profiles_has_stream':
 * @property integer $id
 * @property integer $user_profiles_id
 * @property integer $stream_id
 * @property string $add_date
 * @property integer $reccomended
 * @property integer $self
 * @property integer $default
 * @property integer $status
 * @property string $modified_date
 * @property integer $updated_by
 *
 * The followings are the available model relations:
 * @property Stream $stream
 * @property UserProfiles $userProfiles
 */
class UserProfilesHasStream extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_profiles_has_stream';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_profiles_id, stream_id', 'required'),
			array('user_profiles_id, stream_id, reccomended, self, default, status, updated_by', 'numerical', 'integerOnly'=>true),
			array('add_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_profiles_id, stream_id, add_date, reccomended, self, default, status, modified_date, updated_by', 'safe', 'on'=>'search'),
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
			'userProfiles' => array(self::BELONGS_TO, 'UserProfiles', 'user_profiles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_profiles_id' => 'User Profiles',
			'stream_id' => 'Stream',
			'add_date' => 'Add Date',
			'reccomended' => 'Reccomended',
			'self' => 'Self',
			'default' => 'Default',
			'status' => 'Status',
			'modified_date' => 'Modified Date',
			'updated_by' => 'Updated By',
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
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('stream_id',$this->stream_id);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('reccomended',$this->reccomended);
		$criteria->compare('self',$this->self);
		$criteria->compare('default',$this->default);
		$criteria->compare('status',$this->status);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('updated_by',$this->updated_by);

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
	 * @return UserProfilesHasStream the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
