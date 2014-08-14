<?php

/**
 * This is  he model class for table "suppliers".
 *
 * The followings are the available columns in table 'suppliers':
 * @property integer $id
 * @property integer $users_id
 * @property integer $cities_id
 * @property integer $price_tier_id
 * @property string $name
 * @property string $first_name
 * @property string $last_name
 * @property string $cover
 * @property string $logo
 * @property string $email
 * @property string $phone_number
 * @property string $tagline
 * @property string $short_description
 * @property string $details
 * @property string $modification_date
 * @property integer $status
 * @property string $skype_id
 * @property string $website
 * @property string $foundation_year
 * @property string $location
 * @property string $pricing_details
 * @property string $min_price
 * @property string $about_company
 * @property string $number_of_employee
 * @property string $rough_estimate
 * @property string $consultation_description
 * @property string $total_available_employees
 * @property string $standard_pitch
 * @property string $standard_service_agreement
 * @property string $default_q3_ans
 * @property string $accept_new_project_date
 * @property integer $is_faq_complete
 * @property string $default_q5_ans
 * @property string $default_q4_ans
 * @property string $default_q2_ans
 * @property string $default_q1_ans
 * @property string $add_date
 * @property integer $is_profile_complete
 * @property integer $is_application_submit
 *
 * The followings are the available model relations:
 * @property ChatMessages[] $chatMessages
 * @property SupplierTeam[] $supplierTeams
 * @property Cities $cities
 * @property Users $users
 * @property PriceTier $priceTier
 * @property SuppliersFaqAnswers[] $suppliersFaqAnswers
 * @property SuppliersHasIndustries[] $suppliersHasIndustries
 * @property SuppliersHasPortfolio[] $suppliersHasPortfolios
 * @property SuppliersHasReferences[] $suppliersHasReferences
 * @property SuppliersHasServices[] $suppliersHasServices
 * @property SuppliersHasSkills[] $suppliersHasSkills
 * @property SuppliersProjectsProposals[] $suppliersProjectsProposals
 */
class Suppliers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public $tireSa, $langTag,$langUse, $services;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id, cities_id', 'required'),
			array('users_id, cities_id, price_tier_id, status, is_faq_complete, is_profile_complete, is_application_submit', 'numerical', 'integerOnly'=>true),
			array('name, email, phone_number, tagline, skype_id, website, location', 'length', 'max'=>45),
			array('first_name, last_name, cover, standard_pitch, standard_service_agreement', 'length', 'max'=>250),
			array('logo, pricing_details', 'length', 'max'=>500),
			array('short_description', 'length', 'max'=>300),
			array('foundation_year', 'length', 'max'=>10),
			array('min_price', 'length', 'max'=>100),
			array('number_of_employee, total_available_employees', 'length', 'max'=>20),
			array('details, modification_date, about_company, rough_estimate, consultation_description, default_q3_ans, accept_new_project_date, default_q5_ans, default_q4_ans, default_q2_ans, default_q1_ans, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_id, cities_id, price_tier_id, name, first_name, last_name, cover, logo, email, phone_number, tagline, short_description, details, modification_date, status, skype_id, website, foundation_year, location, pricing_details, min_price, about_company, number_of_employee, rough_estimate, consultation_description, total_available_employees, standard_pitch, standard_service_agreement, default_q3_ans, accept_new_project_date, is_faq_complete, default_q5_ans, default_q4_ans, default_q2_ans, default_q1_ans, add_date, is_profile_complete, is_application_submit, langUse, langTag, services','safe', 'on'=>'search'),
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
			'chatMessages' => array(self::HAS_MANY, 'ChatMessages', 'suppliers_id'),
			'supplierTeams' => array(self::HAS_MANY, 'SupplierTeam', 'suppliers_id'),
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'priceTier' => array(self::BELONGS_TO, 'PriceTier', 'price_tier_id'),
			'suppliersFaqAnswers' => array(self::HAS_MANY, 'SuppliersFaqAnswers', 'suppliers_id'),
			'suppliersHasIndustries' => array(self::HAS_MANY, 'SuppliersHasIndustries', 'suppliers_id'),
			'suppliersHasPortfolios' => array(self::HAS_MANY, 'SuppliersHasPortfolio', 'suppliers_id'),
			'suppliersHasReferences' => array(self::HAS_MANY, 'SuppliersHasReferences', 'suppliers_id'),
			'suppliersHasServices' => array(self::HAS_MANY, 'SuppliersHasServices', 'suppliers_id'),
			'suppliersHasSkills' => array(self::HAS_MANY, 'SuppliersHasSkills', 'suppliers_id'),
			'suppliersProjectsProposals' => array(self::HAS_MANY, 'SuppliersProjectsProposals', 'suppliers_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Supplier ID',
			'users_id' => 'Users ID',
			'cities_id' => 'Cities',
			'price_tier_id' => 'Price Tier',
			'name' => 'Company Name',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'cover' => 'Cover',
			'logo' => 'Logo',
			'email' => 'Alternate Email',
			'phone_number' => 'Phone Number',
			'tagline' => 'Tagline',
			'short_description' => 'Short Description',
			'details' => 'Details',
			'modification_date' => 'Modification Date',
			'status' => 'Status',
			'skype_id' => 'Skype',
			'website' => 'Website',
			'foundation_year' => 'Foundation Year',
			'location' => 'Location',
			'pricing_details' => 'Pricing Details',
			'min_price' => 'Min Price',
			'about_company' => 'About Company',
			'number_of_employee' => 'Number Of Employee',
			'rough_estimate' => 'Rough Estimate',
			'consultation_description' => 'Consultation Description',
			'total_available_employees' => 'Total Available Employees',
			'standard_pitch' => 'Standard Pitch',
			'standard_service_agreement' => 'Standard Service Agreement',
			'default_q3_ans' => 'Default Q3 Ans',
			'accept_new_project_date' => 'Accept New Project Date',
			'is_faq_complete' => 'Is FAQ Submitted',
			'add_date' => 'Add Date',
			'is_profile_complete' => 'Is Profile Completed',
			'is_application_submit' => 'Is Application Submited',
			'langUse'=>'Language Using',
			'langTag'=>'Language Tags',		
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
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('cities_id',$this->cities_id);
		$criteria->compare('price_tier_id',$this->price_tier_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('tagline',$this->tagline,true);
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('skype_id',$this->skype_id,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('foundation_year',$this->foundation_year,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('pricing_details',$this->pricing_details,true);
		$criteria->compare('min_price',$this->min_price,true);
		$criteria->compare('about_company',$this->about_company,true);
		$criteria->compare('number_of_employee',$this->number_of_employee,true);
		$criteria->compare('rough_estimate',$this->rough_estimate,true);
		$criteria->compare('consultation_description',$this->consultation_description,true);
		$criteria->compare('total_available_employees',$this->total_available_employees,true);
		$criteria->compare('standard_pitch',$this->standard_pitch,true);
		$criteria->compare('standard_service_agreement',$this->standard_service_agreement,true);
		$criteria->compare('accept_new_project_date',$this->accept_new_project_date,true);
		$criteria->compare('is_faq_complete',$this->is_faq_complete);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('is_profile_complete',$this->is_profile_complete);
		$criteria->compare('is_application_submit',$this->is_application_submit);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
				
			),
			'pagination' => array('pageSize' => 50),
		));
	}
    
    public function getSkills()
    {
       $ret = "";
       foreach ($this->suppliersHasSkills as $record) {
            $ret .= ", ".$record->skills->name;
        }
        $ret = substr($ret,1,strlen($ret));
        return $ret;
    }
    
    public function getServices($status)
    {
       $ret = "";
       
       $model = SuppliersHasServices::model()->findAllByAttributes(array('status'=>$status, 'suppliers_id'=>$this->id));
       foreach ( $model as $record) {   
                $ret .= ",".$record->services->name;
          
            
        }
        $ret = substr($ret,1,strlen($ret));
        
        return $ret;
    }
    
    public function min_max()
    {
       $ret = "";
        //CVarDumper::dump($this->priceTier,10,1);die;
        if(isset($this->priceTier->min_price))
        {
            $ret = "$".$this->priceTier->min_price." - $".$this->priceTier->max_price;    
        }
        
        return $ret;
    }
  
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Suppliers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/*Custom Search*/
	public function customSearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
        $page_size = 50;
        if(isset($_REQUEST['pagesize']))
        {
            $page_size = $_REQUEST['pagesize'];   
        }
        
        
		$criteria=new CDbCriteria;
		
			if(isset($this->cities_id) && ($this->cities_id != ""))
			{
				$result = Cities::model()->findAll('name LIKE "%'.$this->cities_id.'%"');
				$citySearch=array();
				foreach($result as $cityRes)
					$citySearch[]=$cityRes->id;
				if(count($result)>0)
					$criteria->compare('cities_id',$citySearch,true);
				else
					$criteria->compare('cities_id',$this->cities_id,true);	
		
			}
			else
			{
				$criteria->compare('cities_id',$this->cities_id,true);
			}
		
			if(isset($this->price_tier_id) && $this->price_tier_id!="")
				{
					$resultPrice	 =	 PriceTier::model()->findAll(array("condition"=>"min_price = $this->price_tier_id"));
					$priceSearch		 =	 array();
					foreach($resultPrice as $priceRes)
					$priceSearch[]=$priceRes->id;
					 	if(count($priceSearch)>0)
							$criteria->compare('price_tier_id',$priceSearch,true);
						else
							$criteria->compare('price_tier_id',$this->price_tier_id,true);		
				}
			else
			{
				$criteria->compare('price_tier_id',$this->price_tier_id,true);	
			}
			
			/*For Search by Skills */
			if(isset($_REQUEST['Suppliers']['langUse'])&& !$_REQUEST['Suppliers']['langUse']=="")
				{	
					$this->langUse	 =	$_REQUEST['Suppliers']['langUse'];
					$resultSkills	 =	Skills::model()->findAll('name LIKE "%'.$this->langUse.'%"');
					$skillsSearch	 =	array();
					
					foreach($resultSkills as $skillRes)
						$skillsSearch[]		=	$skillRes->id;
					
					$suppSkills			= 	SuppliersHasSkills::model()->findAllByAttributes(array('skills_id'=>$skillsSearch));
					$supId				=	array();
					foreach($suppSkills as $supInfo)
						$supId[]		=	$supInfo->suppliers_id;
					
					if(count($supId)>0)
							$criteria->compare('id',$supId,true);
					else
							$criteria->compare('id',$this->langUse,true);
				}
			else
				{
					$criteria->compare('id',$this->langUse,true);	
				}
		
		/* for search by Service tags*/
		if(isset($_REQUEST['Suppliers']['langTag'])&& !$_REQUEST['Suppliers']['langTag']=="")
				{	
					$this->langTag	 =	$_REQUEST['Suppliers']['langTag'];
					$resultServices	 =	Services::model()->findAll('name LIKE "%'.$this->langTag.'%"');
					$servicesSearch	 =	array();
					
					foreach($resultServices as $skillRes)
						$servicesSearch[]		=	$skillRes->id;
					
				$suppservices		= 	SuppliersHasServices::model()->findAllByAttributes(array('services_id'=>$servicesSearch,'status'=>'0'));
				$supId				=	array();
				foreach($suppservices as $supInfo)
						$supId[]		=	$supInfo->suppliers_id;
					
				if(count($supId)>0)
							$criteria->compare('id',$supId,true);
				else
							$criteria->compare('id',$this->langTag,true);
				}
			else
				{
					$criteria->compare('id',$this->langTag,true);	
				}
		
		
		/* Search by Service */
		if(isset($_REQUEST['Suppliers']['services'])&& !$_REQUEST['Suppliers']['services']=="")
				{	
					$this->services	 =	$_REQUEST['Suppliers']['services'];
					$resultServices	 =	Services::model()->findAll('name LIKE "%'.$this->services.'%"');
					$servicesSearch	 =	array();
					
					foreach($resultServices as $skillRes)
						$servicesSearch[]		=	$skillRes->id;
					
				$suppservices		= 	SuppliersHasServices::model()->findAllByAttributes(array('services_id'=>$servicesSearch,'status'=>'1'));
				$supId				=	array();
				foreach($suppservices as $supInfo)
						$supId[]		=	$supInfo->suppliers_id;
					
				if(count($supId)>0)
							$criteria->compare('id',$supId,true);
				else
							$criteria->compare('id',$this->services,true);
				}
			else
				{
					$criteria->compare('id',$this->services,true);	
				}
		
	 
		$criteria->compare('id',$this->id);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('tagline',$this->tagline,true);
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('skype_id',$this->skype_id,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('foundation_year',$this->foundation_year,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('pricing_details',$this->pricing_details,true);
		$criteria->compare('min_price',$this->min_price,true);
		$criteria->compare('about_company',$this->about_company,true);
		$criteria->compare('number_of_employee',$this->number_of_employee,true);
		$criteria->compare('rough_estimate',$this->rough_estimate,true);
		$criteria->compare('consultation_description',$this->consultation_description,true);
		$criteria->compare('total_available_employees',$this->total_available_employees,true);
		$criteria->compare('standard_pitch',$this->standard_pitch,true);
		$criteria->compare('standard_service_agreement',$this->standard_service_agreement,true);
		$criteria->compare('accept_new_project_date',$this->accept_new_project_date,true);
		$criteria->compare('is_faq_complete',$this->is_faq_complete);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('is_profile_complete',$this->is_profile_complete);
		$criteria->compare('is_application_submit',$this->is_application_submit);
   
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
				
			),
         
			'pagination' => array('pageSize' => $page_size),
		));
	}
}
