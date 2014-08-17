<?php

/**
 * This is the model class for table "client_profiles".
 *
 * The followings are the available columns in table 'client_profiles':
 * @property integer $id
 * @property integer $users_id
 * @property integer $cities_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_number
 * @property string $address1
 * @property string $company_link
 * @property string $add_date
 * @property integer $status
 * @property string $company_name
 * @property string $description
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Cities $cities
 * @property Users $users
 * @property ClientProjects[] $clientProjects
 */
class ClientProfiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public $country;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id, cities_id, first_name', 'required'),
			array('users_id, cities_id, status', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, email, phone_number', 'length', 'max'=>45),
			array('address1, company_link', 'length', 'max'=>50),
			array('company_name', 'length', 'max'=>100),
			array('image', 'length', 'max'=>500),
			array('add_date, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_id, cities_id, first_name, last_name, email, phone_number, address1, company_link, add_date, status, company_name, description, image', 'safe', 'on'=>'search'),
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
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'clientProjects' => array(self::HAS_MANY, 'ClientProjects', 'client_profiles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'users_id' => 'Users',
			'cities_id' => 'CitY',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'phone_number' => 'Phone Number',
			'address1' => 'Address1',
			'company_link' => 'Company Link',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'company_name' => 'Company Name',
			'description' => 'Description',
			'image' => 'Image',
			'country'=>'Country',
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
	/*public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('cities_id',$this->cities_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('company_link',$this->company_link,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
		));
	}
*/
			public function customSearch()
			{
				// @todo Please modify the following code to remove attributes that should not be searched.
		        
                $page_size = 50;
                if(isset($_REQUEST['pagesize']))
                {
                    $page_size = $_REQUEST['pagesize'];   
                }
                
				$criteria=new CDbCriteria;
		
				/*search by userid */
				if(isset($this->users_id) && ($this->users_id != ""))
				{
					$result 		=		Users::model()->findAll('username LIKE "%'.$this->users_id.'%"');
					$userSearch		=		array();
					foreach($result as $userRes)
						$userSearch[]=$userRes->id;
				
				 	if(count($userSearch)>0)
						$criteria->compare('users_id',$userSearch,true);
					else
						$criteria->compare('users_id',$this->users_id,true);	
			
				}
				else
				{
					$criteria->compare('users_id',$this->users_id,true);
				}
				
			/*search by location*/
				if(isset($this->cities_id) && ($this->cities_id != ""))
				{
					$result 		=		Cities::model()->findAll('name LIKE "%'.$this->cities_id.'%"');
					$citySearch		=		array();
					foreach($result as $cityRes)
						$citySearch[]=$cityRes->id;
				
				 	if(count($citySearch)>0)
						$criteria->compare('cities_id',$citySearch,true);
					else
						$criteria->compare('cities_id',$this->cities_id,true);	
			
				}
				else
				{
					$criteria->compare('cities_id',$this->cities_id,true);
				}
				
				$criteria->compare('id',$this->id);
			//	$criteria->compare('users_id',$this->users_id);
				$criteria->compare('first_name',$this->first_name,true);
				$criteria->compare('last_name',$this->last_name,true);
				$criteria->compare('email',$this->email,true);
				$criteria->compare('phone_number',$this->phone_number,true);
				$criteria->compare('address1',$this->address1,true);
				$criteria->compare('company_link',$this->company_link,true);
				$criteria->compare('add_date',$this->add_date,true);
				$criteria->compare('status',$this->status);
				$criteria->compare('company_name',$this->company_name,true);
				$criteria->compare('description',$this->description,true);
				$criteria->compare('image',$this->image,true);
		
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
	 * @return ClientProfiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
