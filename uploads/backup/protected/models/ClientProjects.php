<?php

/**
 * This is the model class for table "client_projects".
 *
 * The followings are the available columns in table 'client_projects':
 * @property integer $id
 * @property integer $client_profiles_id
 * @property string $name
 * @property string $description
 * @property string $tag_line
 * @property string $business_problem
 * @property string $about_company
 * @property string $team_size
 * @property integer $is_call_scheduled
 * @property string $summary
 * @property string $requirement_change_scale
 * @property string $unique_features
 * @property string $min_budget
 * @property string $max_budget
 * @property string $custom_budget_range
 * @property string $absolute_necessary_language
 * @property string $good_know_language
 * @property string $which_one_is_important
 * @property string $questions_for_supplier
 * @property string $current_status
 * @property string $other_status
 * @property integer $state
 * @property string $add_date
 * @property string $start_date
 * @property string $preferences
 * @property string $regions
 * @property string $tier
 * @property string $other_current_status
 *
 * The followings are the available model relations:
 * @property CallSchedules[] $callSchedules
 * @property ChatMessages[] $chatMessages
 * @property ClientProjectDocuments[] $clientProjectDocuments
 * @property ClientProjectFlows[] $clientProjectFlows
 * @property ClientProjectProgress[] $clientProjectProgresses
 * @property ClientProfiles $clientProfiles
 * @property ClientProjectsHasIndustries[] $clientProjectsHasIndustries
 * @property ClientProjectsHasServices[] $clientProjectsHasServices
 * @property ClientProjectsHasSkills[] $clientProjectsHasSkills
 * @property ClientProjectsHasSupplierTeam[] $clientProjectsHasSupplierTeams
 * @property ClientProjectsHasZones[] $clientProjectsHasZones
 * @property ClientProjectsQuestions[] $clientProjectsQuestions
 * @property ProjectReferences[] $projectReferences
 * @property ProjectUniqueFeatures[] $projectUniqueFeatures
 * @property ProjectsFeaturesAndEstimations[] $projectsFeaturesAndEstimations
 * @property SuppliersProjectsProposals[] $suppliersProjectsProposals
 */
class ClientProjects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_profiles_id ', 'required'),
			array('client_profiles_id, is_call_scheduled, state', 'numerical', 'integerOnly'=>true),
			array('name, tag_line, current_status, other_current_status', 'length', 'max'=>100),
			array('team_size, preferences', 'length', 'max'=>20),
			array('requirement_change_scale, regions, tier', 'length', 'max'=>50),
			array('min_budget, max_budget', 'length', 'max'=>15),
			array('custom_budget_range, which_one_is_important', 'length', 'max'=>25),
			array('absolute_necessary_language, good_know_language', 'length', 'max'=>45),
			array('other_status', 'length', 'max'=>255),
			array('description, business_problem, about_company, summary, unique_features, questions_for_supplier, add_date, start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_profiles_id, name, description, tag_line, business_problem, about_company, team_size, is_call_scheduled, summary, requirement_change_scale, unique_features, min_budget, max_budget, custom_budget_range, absolute_necessary_language, good_know_language, which_one_is_important, questions_for_supplier, current_status, other_status, state, add_date, start_date, preferences, regions, tier, other_current_status', 'safe', 'on'=>'search'),
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
			'callSchedules' => array(self::HAS_MANY, 'CallSchedules', 'client_projects_id'),
			'chatMessages' => array(self::HAS_MANY, 'ChatMessages', 'client_projects_id'),
			'clientProjectDocuments' => array(self::HAS_MANY, 'ClientProjectDocuments', 'client_projects_id'),
			'clientProjectFlows' => array(self::HAS_MANY, 'ClientProjectFlows', 'client_projects_id'),
			'clientProjectProgresses' => array(self::HAS_MANY, 'ClientProjectProgress', 'client_projects_id'),
			'clientProfiles' => array(self::BELONGS_TO, 'ClientProfiles', 'client_profiles_id'),
			'clientProjectsHasIndustries' => array(self::HAS_MANY, 'ClientProjectsHasIndustries', 'client_projects_id'),
			'clientProjectsHasServices' => array(self::HAS_MANY, 'ClientProjectsHasServices', 'client_projects_id'),
			'clientProjectsHasSkills' => array(self::HAS_MANY, 'ClientProjectsHasSkills', 'client_projects_id'),
			'clientProjectsHasSupplierTeams' => array(self::HAS_MANY, 'ClientProjectsHasSupplierTeam', 'client_projects_id'),
			'clientProjectsHasZones' => array(self::HAS_MANY, 'ClientProjectsHasZones', 'client_projects_id'),
			'clientProjectsQuestions' => array(self::HAS_MANY, 'ClientProjectsQuestions', 'client_projects_id'),
			'projectReferences' => array(self::HAS_MANY, 'ProjectReferences', 'client_projects_id'),
			'projectUniqueFeatures' => array(self::HAS_MANY, 'ProjectUniqueFeatures', 'client_projects_id'),
			'projectsFeaturesAndEstimations' => array(self::HAS_MANY, 'ProjectsFeaturesAndEstimations', 'client_projects_id'),
			'suppliersProjectsProposals' => array(self::HAS_MANY, 'SuppliersProjectsProposals', 'client_projects_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_profiles_id' => 'Client Profiles',
			'name' => 'Name',
			'description' => 'Description',
			'tag_line' => 'Tag Line',
			'business_problem' => 'Business Problem',
			'about_company' => 'About Company',
			'team_size' => 'Team Size',
			'is_call_scheduled' => 'Is Call Scheduled',
			'summary' => 'Summary',
			'requirement_change_scale' => 'Requirement Change Scale',
			'unique_features' => 'Unique Features',
			'min_budget' => 'Min Budget',
			'max_budget' => 'Max Budget',
			'custom_budget_range' => 'Custom Budget Range',
			'absolute_necessary_language' => 'Absolute Necessary Language',
			'good_know_language' => 'Good Know Language',
			'which_one_is_important' => 'Which One Is Important',
			'questions_for_supplier' => 'Questions For Supplier',
			'current_status' => 'Current Status',
			'other_status' => 'Other Status',
			'state' => 'State',
			'add_date' => 'Add Date',
			'start_date' => 'Start Date',
			'preferences' => 'Preferences',
			'regions' => 'Regions',
			'tier' => 'Tier',
			'other_current_status' => 'Other Current Status',
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

		if($this->other_status!=4 && $this->other_status!="")
		{
			$check	=	 array(0,1,2,3);
			$criteria->compare('other_status',$check,true);
		}
		else
		{
			$criteria->compare('other_status',$this->other_status,true);
		}

		$criteria->compare('id',$this->id);
		$criteria->compare('client_profiles_id',$this->client_profiles_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tag_line',$this->tag_line,true);
		$criteria->compare('business_problem',$this->business_problem,true);
		$criteria->compare('about_company',$this->about_company,true);
		$criteria->compare('team_size',$this->team_size,true);
		$criteria->compare('is_call_scheduled',$this->is_call_scheduled);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('requirement_change_scale',$this->requirement_change_scale,true);
		$criteria->compare('unique_features',$this->unique_features,true);
		$criteria->compare('min_budget',$this->min_budget,true);
		$criteria->compare('max_budget',$this->max_budget,true);
		$criteria->compare('custom_budget_range',$this->custom_budget_range,true);
		$criteria->compare('absolute_necessary_language',$this->absolute_necessary_language,true);
		$criteria->compare('good_know_language',$this->good_know_language,true);
		$criteria->compare('which_one_is_important',$this->which_one_is_important,true);
		$criteria->compare('questions_for_supplier',$this->questions_for_supplier,true);
		$criteria->compare('current_status',$this->current_status,true);
		//$criteria->compare('other_status',$this->other_status,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('preferences',$this->preferences,true);
		$criteria->compare('regions',$this->regions,true);
		$criteria->compare('tier',$this->tier,true);
		$criteria->compare('other_current_status',$this->other_current_status,true);

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
	 * @return ClientProjects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
