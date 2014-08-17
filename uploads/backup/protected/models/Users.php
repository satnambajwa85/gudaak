<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property integer $role_id
 * @property string $display_name
 * @property string $username
 * @property string $password
 * @property string $linkedin
 * @property string $role
 * @property string $add_date
 * @property string $last_login
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ClientProfiles[] $clientProfiles
 * @property Log[] $logs
 * @property Notifications[] $notifications
 * @property Suppliers[] $suppliers
 * @property Role $role0
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $confirm_password;
	public $company_name;
	public $company_link;
	public $company_size;
	public $country;
	public $city;
	public $link;
	
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id, username, password', 'required'),
			array('username,linkedin', 'unique'),
			array('username', 'email'),
			array('role_id, status, link_status', 'numerical', 'integerOnly'=>true),
			array('display_name, password', 'length', 'max'=>100),
			array('username', 'length', 'max'=>150),
			array('linkedin', 'length', 'max'=>200),
			array('role', 'length', 'max'=>45),
			array('add_date, last_login', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, role_id, display_name, username, password, linkedin, role, add_date, last_login, status, link, link_status', 'safe', 'on'=>'search'),
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
			'clientProfiles' => array(self::HAS_MANY, 'ClientProfiles', 'users_id'),
			'logs' => array(self::HAS_MANY, 'Log', 'login_id'),
			'notifications' => array(self::HAS_MANY, 'Notifications', 'users_id'),
			'suppliers' => array(self::HAS_MANY, 'Suppliers', 'users_id'),
			'roles' => array(self::BELONGS_TO, 'Role', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'role_id' => 'Role',
			'display_name' => 'Display Name',
			'username' => 'Username',
			'password' => 'Password',
			'linkedin' => 'Linkedin',
			'role' => 'Role',
			'add_date' => 'Add Date',
			'last_login' => 'Last Login',
			'status' => 'Status',
			'company_name' => 'Company Name',
			'company_link' => 'Company Link',
			'company_size' => 'Company Size',
			'country' => 'Country',
			'city' => 'City',
			'link'=>'Link',
			'link_status'=>'Link Active',
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
        $page_size = 50;
        if(isset($_REQUEST['pagesize']))
        {
            $page_size = $_REQUEST['pagesize'];   
        }
        
        
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
            'pagination' => array(
                        'pageSize' => $page_size,
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
