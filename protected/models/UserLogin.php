<?php

/**
 * This is the model class for table "user_login".
 *
 * The followings are the available columns in table 'user_login':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $activation
 * @property string $add_date
 * @property string $last_login
 * @property integer $login_status
 * @property integer $block
 * @property integer $status
 * @property integer $user_role_id
 *
 * The followings are the available model relations:
 * @property Counselor[] $counselors
 * @property Schools[] $schools
 * @property UserRole $userRole
 * @property UserProfiles[] $userProfiles
 */
class UserLogin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $name;
	public function tableName()
	{
		return 'user_login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username,password, add_date, user_role_id', 'required'),
			array('activation, login_status, block, status, user_role_id', 'numerical', 'integerOnly'=>true),
			array('username, password', 'length', 'max'=>50),
			array('username','unique'),
			array('last_login', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username,name, password, activation, add_date, last_login, login_status, block, status, user_role_id', 'safe', 'on'=>'search'),
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
			'counselors' => array(self::HAS_MANY, 'Counselor', 'user_login_id'),
			'schools' => array(self::MANY_MANY, 'Schools', 'schools_has_user_login(user_login_id, schools_id)'),
			'userRole' => array(self::BELONGS_TO, 'UserRole', 'user_role_id'),
			'userProfiles' => array(self::HAS_MANY, 'UserProfiles', 'user_login_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'activation' => 'Activation',
			'add_date' => 'Add Date',
			'last_login' => 'Last Login',
			'login_status' => 'Login Status',
			'block' => 'Block',
			'status' => 'Status',
			'user_role_id' => 'User Role',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('login_status',$this->login_status);
		$criteria->compare('block',$this->block);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_role_id',$this->user_role_id);

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
	 * @return UserLogin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
