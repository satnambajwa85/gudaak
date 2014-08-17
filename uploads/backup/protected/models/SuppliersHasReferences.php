<?php

/**
 * This is the model class for table "suppliers_has_references".
 *
 * The followings are the available columns in table 'suppliers_has_references':
 * @property integer $id
 * @property string $client_first_name
 * @property string $client_last_name
 * @property string $project_name
 * @property string $client_email
 * @property string $company_name
 * @property string $year_engagement
 * @property integer $client_id
 * @property integer $suppliers_id
 * @property integer $industry_id
 * @property integer $q1_communication_rating
 * @property integer $q2_skill_rating
 * @property integer $q3_timelines_ratings
 * @property integer $q4_independence_rating
 * @property string $provider_do_well
 * @property string $provider_improve
 * @property string $problems_during_development
 * @property string $client_project_description
 * @property integer $status
 * @property string $created
 * @property integer $modified
 *
 * The followings are the available model relations:
 * @property Industries $industry
 */
class SuppliersHasReferences extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_has_references';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_name, client_email, client_id, suppliers_id', 'required'),
			array('client_id, suppliers_id, industry_id, q1_communication_rating, q2_skill_rating, q3_timelines_ratings, q4_independence_rating, status, modified', 'numerical', 'integerOnly'=>true),
			array('client_first_name, client_last_name, project_name, client_email, company_name', 'length', 'max'=>250),
			array('year_engagement', 'length', 'max'=>50),
			array('provider_do_well, provider_improve, problems_during_development, client_project_description, created', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_first_name, client_last_name, project_name, client_email, company_name, year_engagement, client_id, suppliers_id, industry_id, q1_communication_rating, q2_skill_rating, q3_timelines_ratings, q4_independence_rating, provider_do_well, provider_improve, problems_during_development, client_project_description, status, created, modified', 'safe', 'on'=>'search'),
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
            'client'  => array(self::BELONGS_TO, 'ClientProfiles', 'client_id'),
            'industry' => array(self::BELONGS_TO, 'Industries', 'industry_id'),
            'suppliers' => array(self::BELONGS_TO, 'Suppliers', 'suppliers_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_first_name' => 'Client First Name',
			'client_last_name' => 'Client Last Name',
			'project_name' => 'Project Name',
			'client_email' => 'Client Email',
			'company_name' => 'Company Name',
			'year_engagement' => 'Year Engagement',
			'client_id' => 'Client',
			'suppliers_id' => 'Suppliers',
			'industry_id' => 'Industry',
			'q1_communication_rating' => 'Q1 Communication Rating',
			'q2_skill_rating' => 'Q2 Skill Rating',
			'q3_timelines_ratings' => 'Q3 Timelines Ratings',
			'q4_independence_rating' => 'Q4 Independence Rating',
			'provider_do_well' => 'Provider Do Well',
			'provider_improve' => 'Provider Improve',
			'problems_during_development' => 'Problems During Development',
			'client_project_description' => 'Client Project Description',
			'status' => 'Status',
			'created' => 'Created',
			'modified' => 'Modified',
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
	public function customSearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		  $page_size = 50;
			if(isset($_REQUEST['pagesize']))
			{
				$page_size = $_REQUEST['pagesize'];   
			}
			
			if(isset($this->suppliers_id) && ($this->suppliers_id != ""))
			{
				$result = Suppliers::model()->findAll('name LIKE "%'.$this->suppliers_id.'%"');
				$supSearch=array();
				foreach($result as $supRes)
					$supSearch[]=$supRes->id;
				
				if(count($supSearch)>0)
					$criteria->compare('suppliers_id',$supSearch,true);
				else
					$criteria->compare('suppliers_id',$this->suppliers_id,true);	
			 
			}
			else
			{
				$criteria->compare('suppliers_id',$this->suppliers_id,true);
			}
			if(isset($this->client_id) && ($this->client_id != ""))
			{
				$result = ClientProfiles::model()->findAll('first_name LIKE "%'.$this->client_id.'%"');
				$cliSearch=array();
				foreach($result as $cliRes)
					$cliSearch[]=$cliRes->id;
				
				if(count($cliSearch)>0)
					$criteria->compare('client_id',$cliSearch,true);
				else
					$criteria->compare('client_id',$this->client_id,true);	
			 
			}
			else
			{
				$criteria->compare('client_id',$this->client_id,true);
			}
		
	
		$criteria->compare('id',$this->id);
		$criteria->compare('client_first_name',$this->client_first_name,true);
		$criteria->compare('client_last_name',$this->client_last_name,true);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('client_email',$this->client_email,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('year_engagement',$this->year_engagement,true);
		//$criteria->compare('client_id',$this->client_id);
		//$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('industry_id',$this->industry_id);
		$criteria->compare('q1_communication_rating',$this->q1_communication_rating);
		$criteria->compare('q2_skill_rating',$this->q2_skill_rating);
		$criteria->compare('q3_timelines_ratings',$this->q3_timelines_ratings);
		$criteria->compare('q4_independence_rating',$this->q4_independence_rating);
		$criteria->compare('provider_do_well',$this->provider_do_well,true);
		$criteria->compare('provider_improve',$this->provider_improve,true);
		$criteria->compare('problems_during_development',$this->problems_during_development,true);
		$criteria->compare('client_project_description',$this->client_project_description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
				
			),
			'pagination' => array('pageSize' => $page_size),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppliersHasReferences the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
