<?php

class ClientProjectsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view','budget','calculate'),
				'expression'=>'Yii::app()->user->role=="admin"',
				//'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		$client_projects	=	ClientProjects::model()->findByPk($id);
		if(isset($_POST['ClientProjects'])){
			//CVarDumper::dump($_POST['Client_id'],10,1);die;
			// start current status part from here 
			$listStatus	=	array();
			$listRegion	=	array();
			$listTier	=	array();
			if(isset($_POST['current_status']))
			foreach($_POST['current_status'] as $sta){
				$listStatus[]	=	$sta;
			}
			// end here current status part
			if(isset($_POST['options']))
			foreach($_POST['options'] as $sel)
				$listRegion[]	=	$sel;
			if(isset($_POST['tier']))
			foreach($_POST['tier'] as $sel2)
				$listTier[]	=	$sel2;
			$client_projects->attributes			=	$_POST['ClientProjects'];
			$client_projects->client_profiles_id	=	$_POST['Client_id'];
			$client_projects->current_status		=	implode(',',$listStatus);
			$client_projects->other_current_status	=	(isset($_POST['ClientProjects']['other_current_status']))?$_POST['ClientProjects']['other_current_status']:'';
			$client_projects->regions				=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && $_POST['ClientProjects']['preferences']!='regoin')
				$client_projects->regions	=	'';
			$client_projects->start_date =	(isset($_POST['ClientProjects']['start_date']))?date('Y-m-d',strtotime($_POST['ClientProjects']['start_date'])):'';
			$client_projects->other_status					=	(isset($_POST['other_status']))?$_POST['other_status']:'1';
			if($client_projects->other_status==4){
				$client_projects->state	=	2;
				//$this->actionLogSave(Yii::app()->user->id,'Project Submitted','You project '.$client_projects->name.' submitted sucessfully.',1);
				$users	=	ClientProfiles::model()->findByPk($client_projects->client_profiles_id);
				$client_data=array();
				$client_data['name']		=	$users->first_name;
				$client_data['email']		=	$users->email;
				//$this->sendMail($client_data,'submit_rfp');
			}
			if($client_projects->save()){
				/* project industry start here*/
				ClientProjectsHasIndustries::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Industries']))
				foreach($_POST['Industries'] as $indus){
					$condition						=	array('industries_id'=>$indus,'client_projects_id'=>$client_projects->id);
					$indusList						=	ClientProjectsHasIndustries::model()->findByAttributes($condition);
					if(empty($indusList))
						$indusList						=	new ClientProjectsHasIndustries;
					$indusList->industries_id		=	$indus;
					$indusList->client_projects_id	=	$client_projects->id;
					$indusList->add_date			=	date('Y-m-d H:i:s');
					$indusList->status				=	1;
					$indusList->save();
				}
				/* project industry end here*/
				
				/* project services start here*/
				ClientProjectsHasServices::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Services']))
				foreach($_POST['Services'] as $indus){
					$condition							=	array('services_id'=>$indus,'client_projects_id'=>$client_projects->id);
					$serviceList						=	ClientProjectsHasServices::model()->findByAttributes($condition);
					if(empty($serviceList))
						$serviceList					=	new ClientProjectsHasServices;
					$serviceList->services_id			=	$indus;
					$serviceList->client_projects_id	=	$client_projects->id;
					$serviceList->add_date				=	date('Y-m-d H:i:s');
					$serviceList->status				=	1;
					$serviceList->save();
				}
				/* project flow or steps start here*/
				ClientProjectFlows::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Flows']))
				foreach($_POST['Flows'] as $key=>$val){
					if($val!=''){
					$condition					=	array('client_projects_id'=>$client_projects->id,'step'=>$key);
					$flow						=	ClientProjectFlows::model()->findByAttributes($condition);
					if(empty($flow))
						$flow					=	new ClientProjectFlows;
					$flow->step					=	$key;
					$flow->client_projects_id	=	$client_projects->id;
					$flow->description			=	$val;
					$flow->status				=	1;
					$flow->save();
					}
				}
				/* project flow or steps end here*/
				/* project skills or steps start here*/
				ClientProjectsHasSkills::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Skills']))
				foreach($_POST['Skills'] as $key){
					if($key!=''){
						if(!is_numeric($key)){
							$sk		=	Skills::model()->findByAttributes(array('name'=>$key));
							$key	=	$sk->id;
						}
						$condition					=	array('client_projects_id'=>$client_projects->id,'skills_id'=>$key);
						$skill						=	ClientProjectsHasSkills::model()->findByAttributes($condition);
						if(empty($skill))
							$skill					=	new ClientProjectsHasSkills;
						$skill->skills_id			=	$key;
						$skill->client_projects_id	=	$client_projects->id;
						$skill->add_date			=	date('Y-m-d');
						$skill->status				=	1;
						$skill->save();
					}
				}
				/* project skills or steps end here*/
				
				
				/* project Project Referance or steps start here*/
				ProjectReferences::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['ClientProjects']['projectReferences']))
					foreach($_POST['ClientProjects']['projectReferences'] as $link){
						if($link!=''){
							$ref					=	new ProjectReferences;
							$ref->client_projects_id=	$client_projects->id;
							$ref->details			=	$link;
							$ref->status			=	1;
							$ref->add_date			=	date('Y-m-d H:i:s');
							if(!$ref->save())
								CVarDumper::dump($ref,10,1);
						}
				}
				/* project Referance or steps end here*/

				/* Project Question start here*/
				ClientProjectsQuestions::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Question']))
					foreach($_POST['Question'] as $link){
						if($link!=''){
							$ref					=	new ClientProjectsQuestions;
							$ref->client_projects_id=	$client_projects->id;
							$ref->question			=	$link;
							$ref->status			=	1;
							$ref->add_date			=	date('Y-m-d H:i:s');
							$ref->save();
							//	CVarDumper::dump($ref,10,1);
						}
				}
				/* project Question end here*/
			 
				$this->redirect(array('view','id'=>$client_projects->id));
			}
			else
				echo '0';
			die;
		}
		$industries				=	Industries::model()->findAll();
		$services				=	Services::model()->findAll();
		$currentStatus			=	CurrentStatus::model()->findAll();
		$selecetedServices		=	array();
		$selecetedIndustries	=	array();
		$selecetedSkills		=	array();
		foreach($client_projects->clientProjectsHasServices as $ser)
			$selecetedServices[]	=	$ser->services_id;
		foreach($client_projects->clientProjectsHasSkills as $skill)
			$selecetedSkills[]	=	$skill->skills_id;
		foreach($client_projects->clientProjectsHasIndustries as $ind)
			$selecetedIndustries[]	=	$ind->industries_id;
		$selecetedStatus		=	explode(',',$client_projects->current_status);
		$selecetedTier			=	explode(',',$client_projects->tier);
		$selecetedRegions		=	explode(',',$client_projects->regions);
		
		
		$profile 	=	ClientProfiles::model()->FindByPk($client_projects->client_profiles_id);
		$country	=	$profile->cities->states_id;
		$region		=	$profile->cities->states->countries_id;
		$list		=	States::model()->findAllByAttributes(array('countries_id'=>$region));
		
		if($client_projects->preferences=='regoin'){
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$selecetedRegions));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		}
		elseif($client_projects->preferences=='no-preferences'){
			$listRegion			=	Countries::model()->findAll();
			foreach($listRegion as $listReg)
				$selecetedRegion[]	=	$listReg->id;
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$selecetedRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		}
		else{
			$da			=	States::model()->findByPk($country);
			$tier		=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			
		}
		
		ksort($filt);
		$skills	=	Skills::model()->findAll();
		if($client_projects->other_status==4)
			$view	=	'create';
		else
			$view	=	'create';
	  //CVarDumper::dump($client_projects->preferences,10,1);die;
		$this->render('_view',array('project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills,'preference'=>$client_projects->preferences)); 
	 	
	
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
/*	public function actionCreate()
	{
		$model=new ClientProjects;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientProjects']))
		{
			$model->attributes=$_POST['ClientProjects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
*/
  public function actionCreate()
  {
	  	if(! empty($_POST['ClientProjects']['id'])&& isset($_POST['ClientProjects']['id']))
		{
			$id	=	$_POST['ClientProjects']['id'];
			$client_projects	=	ClientProjects::model()->findByPk($id);
		}
		else
		{
	 		$client_projects	=	new ClientProjects;
		}
		if(isset($_POST['ClientProjects'])){
		 
			// start current status part from here 
			$listStatus	=	array();
			$listRegion	=	array();
			$listTier	=	array();
			if(isset($_POST['current_status']))
			foreach($_POST['current_status'] as $sta){
				$listStatus[]	=	$sta;
			}
			// end here current status part
			if(isset($_POST['options']))
			foreach($_POST['options'] as $sel)
				$listRegion[]	=	$sel;
			if(isset($_POST['tier']))
			foreach($_POST['tier'] as $sel2)
				$listTier[]	=	$sel2;
			$client_projects->attributes			=	$_POST['ClientProjects'];
			$client_projects->client_profiles_id	=	$_POST['Client_id'];
			$client_projects->current_status		=	implode(',',$listStatus);
			$client_projects->other_current_status	=	(isset($_POST['ClientProjects']['other_current_status']))?$_POST['ClientProjects']['other_current_status']:'';
			$client_projects->regions				=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && $_POST['ClientProjects']['preferences']!='regoin')
				$client_projects->regions			=	'';
			$client_projects->start_date 			=	(isset($_POST['ClientProjects']['start_date']))?date('Y-m-d',strtotime($_POST['ClientProjects']['start_date'])):'';
			$client_projects->other_status					=	(isset($_POST['other_status']))?$_POST['other_status']:'1';
			if($client_projects->other_status==4){
				$client_projects->state	=	2;
				//$this->actionLogSave(Yii::app()->user->id,'Project Submitted','You project '.$client_projects->name.' submitted sucessfully.',1);
			//	$users	=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
			//	$client_data=array();
			//	$client_data['name']		=	$users->first_name;
			//	$client_data['email']		=	$users->email;
			//	$this->sendMail($client_data,'submit_rfp');
			}
			//$client_projects->other_status=4;
			//$client_projects->state	=	2;
			if($client_projects->save()){
				/* project industry start here*/
				ClientProjectsHasIndustries::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Industries']))
				foreach($_POST['Industries'] as $indus){
					$condition						=	array('industries_id'=>$indus,'client_projects_id'=>$client_projects->id);
					$indusList						=	ClientProjectsHasIndustries::model()->findByAttributes($condition);
					if(empty($indusList))
						$indusList						=	new ClientProjectsHasIndustries;
					$indusList->industries_id		=	$indus;
					$indusList->client_projects_id	=	$client_projects->id;
					$indusList->add_date			=	date('Y-m-d H:i:s');
					$indusList->status				=	1;
					$indusList->save();
				}
				/* project industry end here*/
				
				/* project services start here*/
				ClientProjectsHasServices::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Services']))
				foreach($_POST['Services'] as $indus){
					$condition							=	array('services_id'=>$indus,'client_projects_id'=>$client_projects->id);
					$serviceList						=	ClientProjectsHasServices::model()->findByAttributes($condition);
					if(empty($serviceList))
						$serviceList					=	new ClientProjectsHasServices;
					$serviceList->services_id			=	$indus;
					$serviceList->client_projects_id	=	$client_projects->id;
					$serviceList->add_date				=	date('Y-m-d H:i:s');
					$serviceList->status				=	1;
					$serviceList->save();
				}
				/* project flow or steps start here*/
				ClientProjectFlows::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Flows']))
				foreach($_POST['Flows'] as $key=>$val){
					if($val!=''){
					$condition					=	array('client_projects_id'=>$client_projects->id,'step'=>$key);
					$flow						=	ClientProjectFlows::model()->findByAttributes($condition);
					if(empty($flow))
						$flow					=	new ClientProjectFlows;
					$flow->step					=	$key;
					$flow->client_projects_id	=	$client_projects->id;
					$flow->description			=	$val;
					$flow->status				=	1;
					$flow->save();
					}
				}
				/* project flow or steps end here*/
				/* project skills or steps start here*/
				ClientProjectsHasSkills::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Skills']))
				foreach($_POST['Skills'] as $key){
					if($key!=''){
						if(!is_numeric($key)){
							$sk		=	Skills::model()->findByAttributes(array('name'=>$key));
							$key	=	$sk->id;
						}
						$condition					=	array('client_projects_id'=>$client_projects->id,'skills_id'=>$key);
						$skill						=	ClientProjectsHasSkills::model()->findByAttributes($condition);
						if(empty($skill))
							$skill					=	new ClientProjectsHasSkills;
						$skill->skills_id			=	$key;
						$skill->client_projects_id	=	$client_projects->id;
						$skill->add_date			=	date('Y-m-d');
						$skill->status				=	1;
						$skill->save();
					}
				}
				/* project skills or steps end here*/
				
				
				/* project Project Referance or steps start here*/
				ProjectReferences::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['ClientProjects']['projectReferences']))
					foreach($_POST['ClientProjects']['projectReferences'] as $link){
						if($link!=''){
							$ref					=	new ProjectReferences;
							$ref->client_projects_id=	$client_projects->id;
							$ref->details			=	$link;
							$ref->status			=	1;
							$ref->add_date			=	date('Y-m-d H:i:s');
							if(!$ref->save())
								CVarDumper::dump($ref,10,1);
						}
				}
				/* project Referance or steps end here*/

				/* Project Question start here*/
				ClientProjectsQuestions::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Question']))
					foreach($_POST['Question'] as $link){
						if($link!=''){
							$ref					=	new ClientProjectsQuestions;
							$ref->client_projects_id=	$client_projects->id;
							$ref->question			=	$link;
							$ref->status			=	1;
							$ref->add_date			=	date('Y-m-d H:i:s');
							$ref->save();
							//	CVarDumper::dump($ref,10,1);
						}
				}
				/* project Question end here*/
			if(isset($_REQUEST['ajax']) && $_REQUEST['ajax']){
			echo $client_projects->id;
			die;
			}
			
			
				$this->redirect(array('view','id'=>$client_projects->id));
			}
			else
				echo '0';
			die;
		}
		$industries				=	Industries::model()->findAll();
		$services				=	Services::model()->findAll();
		$currentStatus			=	CurrentStatus::model()->findAll();
		$selecetedServices		=	array();
		$selecetedIndustries	=	array();
		$selecetedSkills		=	array();
		foreach($client_projects->clientProjectsHasServices as $ser)
			$selecetedServices[]	=	$ser->services_id;
		foreach($client_projects->clientProjectsHasSkills as $skill)
			$selecetedSkills[]	=	$skill->skills_id;
		foreach($client_projects->clientProjectsHasIndustries as $ind)
			$selecetedIndustries[]	=	$ind->industries_id;
		$selecetedStatus		=	explode(',',$client_projects->current_status);
		$selecetedTier			=	explode(',',$client_projects->tier);
		$selecetedRegions		=	explode(',',$client_projects->regions);
		
		/*$profile 	=	ClientProfiles::model()->FindByPk($client_projects->client_profiles_id);
		$country	=	$profile->cities->states_id;
		$region		=	$profile->cities->states->countries_id;
		$list		=	States::model()->findAllByAttributes(array('countries_id'=>$region));
		
		if($client_projects->preferences=='regoin'){
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$selecetedRegions));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		}
		elseif($client_projects->preferences=='no-preferences'){*/
			$listRegion			=	Countries::model()->findAll();
			foreach($listRegion as $listReg)
				$selecetedRegion[]	=	$listReg->id;
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$selecetedRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		
		/* }else{
			$da			=	States::model()->findByPk($country);
			$tier		=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			
		}
		*/
		ksort($filt);
		$skills	=	Skills::model()->findAll();
		if($client_projects->other_status==4)
			$view	=	'create';
		else
			$view	=	'create';
		$this->render($view,array('project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'preference'=>$client_projects->preferences,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills)); 
	 }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	/*public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientProjects']))
		{
			$model->attributes=$_POST['ClientProjects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
*/
    
    
    public function large_value($val1,$val2)
    {
        if($val1 > $val2)
        {
            return $val1;
        }else{
            return $val2;
        }
    }
    
 	public function actionUpdate($id)
	{
		$client_projects	=	ClientProjects::model()->findByPk($id);
        $old_model = ClientProjects::model()->findByPk($id);
        
		if(isset($_POST['ClientProjects'])){
		 
        // CVarDumper::Dump($client_projects,10,1);die;
                           
		    $description = "";
            
            $clientProjectarray = $_POST['ClientProjects'];
            
            //CVarDumper::Dump($_POST['ClientProjects'],10,1);die;
			$client_id= $client_projects->client_profiles_id;
			// start current status part from here 
			$listStatus	=	array();
			$listRegion	=	array();
			$listTier	=	array();
			if(isset($_POST['current_status']))
			foreach($_POST['current_status'] as $sta){
				$listStatus[]	=	$sta;
			}
			// end here current status part
			if(isset($_POST['options']))
			foreach($_POST['options'] as $sel)
				$listRegion[]	=	$sel;
			if(isset($_POST['tier']))
			foreach($_POST['tier'] as $sel2)
				$listTier[]	=	$sel2;
				 
			$client_projects->attributes			=	$_POST['ClientProjects'];
			$client_projects->client_profiles_id	=	$client_id;
			$client_projects->current_status		=	implode(',',$listStatus);
			$client_projects->other_current_status	=	(isset($_POST['ClientProjects']['other_current_status']))?$_POST['ClientProjects']['other_current_status']:'';
			$client_projects->regions				=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && $_POST['ClientProjects']['preferences']!='regoin')
				$client_projects->regions	=	'';
			$client_projects->start_date =	(isset($_POST['ClientProjects']['start_date']))?date('Y-m-d',strtotime($_POST['ClientProjects']['start_date'])):'';
			$client_projects->other_status					=	(isset($_POST['other_status']))?$_POST['other_status']:'1';
			if($client_projects->other_status==4){
				$client_projects->state	=	2;
				//$this->actionLogSave(Yii::app()->user->id,'Project Submitted','You project '.$client_projects->name.' submitted sucessfully.',1);
				$users	=	ClientProfiles::model()->findByPk($client_projects->client_profiles_id);
				$client_data=array();
				$client_data['name']		=	$users->first_name;
				$client_data['email']		=	$users->email;
				//$this->sendMail($client_data,'submit_rfp');
			}
			if($client_projects->save()){
	
              
              foreach($client_projects as $key=>$value)
              {
                  if($value!=$old_model[$key])
                  {
                       $description .= 'old record '.$key.' = '.$old_model[$key].' -- new record '.$key.' = '.$value."<br><hr>";
                  }
                 
              }
              
       
   
				/* project industry start here*/
              	ClientProjectsHasIndustries::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Industries']))
                {
                    foreach($_POST['Industries'] as $indus){
    					$condition						=	array('industries_id'=>$indus,'client_projects_id'=>$client_projects->id);
    					$indusList						=	ClientProjectsHasIndustries::model()->findByAttributes($condition);
    					if(empty($indusList))
    						$indusList						=	new ClientProjectsHasIndustries;
    					$indusList->industries_id		=	$indus;
    					$indusList->client_projects_id	=	$client_projects->id;
    					$indusList->add_date			=	date('Y-m-d H:i:s');
    					$indusList->status				=	1;
    					$indusList->save();
			    	}    
                }
				
                
                //if()
                
				/* project industry end here*/
                $client_industries = ClientProjectsHasServices::model()->findByAttributes(array('client_projects_id'=>$client_projects->id));
			//	CVarDumper::Dump($_POST['Services'],10,1)."<br>";
          
               
            
                
				/* project services start here*/
				ClientProjectsHasServices::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Services']))
				foreach($_POST['Services'] as $indus){
					$condition							=	array('services_id'=>$indus,'client_projects_id'=>$client_projects->id);
					$serviceList						=	ClientProjectsHasServices::model()->findByAttributes($condition);
					if(empty($serviceList))
						$serviceList					=	new ClientProjectsHasServices;
					$serviceList->services_id			=	$indus;
					$serviceList->client_projects_id	=	$client_projects->id;
					$serviceList->add_date				=	date('Y-m-d H:i:s');
					$serviceList->status				=	1;
					$serviceList->save();
				}
                
				if(isset($client_industries->id) && isset($client_projects->clientProjectsHasServices[0]->id))
                {
                    if($client_industries->services->name!=$client_projects->clientProjectsHasServices[0]->services->name)
                    {
                        $description .= 'old record service = '.$client_industries->services->name.' -- new record  service = '.$client_projects->clientProjectsHasServices[0]->services->name."<br><hr>";
                    }
                }
                /* project flow or steps start here*/
                
                
                
                            
                
				ClientProjectFlows::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Flows']))
				foreach($_POST['Flows'] as $key=>$val){
					if($val!=''){
					$condition					=	array('client_projects_id'=>$client_projects->id,'step'=>$key);
					$flow						=	ClientProjectFlows::model()->findByAttributes($condition);
					if(empty($flow))
						$flow					=	new ClientProjectFlows;
					$flow->step					=	$key;
					$flow->client_projects_id	=	$client_projects->id;
					$flow->description			=	$val;
					$flow->status				=	1;
					$flow->save();
					}
				}
                
 
                
				/* project flow or steps end here*/
                
                
				/* project skills or steps start here*/
                
                $client_project_flow = ClientProjectsHasSkills::model()->findALLByAttributes(array('client_projects_id'=>$client_projects->id));
                
                
                
				ClientProjectsHasSkills::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Skills']))
				foreach($_POST['Skills'] as $key){
					if($key!=''){
						if(!is_numeric($key)){
							$sk		=	Skills::model()->findByAttributes(array('name'=>$key));
							$key	=	$sk->id;
						}
						$condition					=	array('client_projects_id'=>$client_projects->id,'skills_id'=>$key);
						$skill						=	ClientProjectsHasSkills::model()->findByAttributes($condition);
						if(empty($skill))
							$skill					=	new ClientProjectsHasSkills;
						$skill->skills_id			=	$key;
						$skill->client_projects_id	=	$client_projects->id;
						$skill->add_date			=	date('Y-m-d');
						$skill->status				=	1;
						$skill->save();
					}
				}
                
                
                //skills in logs
                $count_old_skills = count($client_project_flow);
                $count_new_skills = count($client_projects->clientProjectsHasSkills);
                $large_val = $this->large_value($count_old_skills,$count_new_skills);
                
                if($large_val > 0)
                {
                    $old = "";
                    $new = "";
                    for($j=0;$j<$large_val;$j++)
                    {
                          $old_skills = isset($client_project_flow[$j]->skills->name)?$client_project_flow[$j]->skills->name:"";
                          $new_skills = isset($client_projects->clientProjectsHasSkills[$j]->skills->name)?$client_projects->clientProjectsHasSkills[$j]->skills->name:"";
                          
                          $old .= $old_skills.",";
                          $new .= $new_skills.",";
                          
                    }
                    if(($old!="" && $new!="") && ($old!=$new))
                    {
                        $description .="Old Skills = ".$old." -- New Skills = ".$new;    
                    }
                    
                }
                                   
               //end of skills in logs
                
            
				
				/* project Project Referance or steps start here*/
				ProjectReferences::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['ClientProjects']['projectReferences']))
					foreach($_POST['ClientProjects']['projectReferences'] as $link){
						if($link!=''){
							$ref					=	new ProjectReferences;
							$ref->client_projects_id=	$client_projects->id;
							$ref->details			=	$link;
							$ref->status			=	1;
							$ref->add_date			=	date('Y-m-d H:i:s');
							if(!$ref->save())
								CVarDumper::dump($ref,10,1);
						}
				}
				/* project Referance or steps end here*/

				/* Project Question start here*/
				ClientProjectsQuestions::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Question']))
					foreach($_POST['Question'] as $link){
						if($link!=''){
							$ref					=	new ClientProjectsQuestions;
							$ref->client_projects_id=	$client_projects->id;
							$ref->question			=	$link;
							$ref->status			=	1;
							$ref->add_date			=	date('Y-m-d H:i:s');
							$ref->save();
							//	CVarDumper::dump($ref,10,1);
						}
				}
				/* project Question end here*/
			    if($description!="")
                {
                   
                    parent::updateLog($client_projects->clientProfiles->users->id,$client_projects->clientProfiles->users->username,$description,Yii::app()->controller->id,Yii::app()->controller->action->id);   
                }
                 
                 
                
				$this->redirect(array('view','id'=>$client_projects->id));
			}
			else
				echo '0';
			die;
		}
		$industries				=	Industries::model()->findAll();
		$services				=	Services::model()->findAll();
		$currentStatus			=	CurrentStatus::model()->findAll();
		$selecetedServices		=	array();
		$selecetedIndustries	=	array();
		$selecetedSkills		=	array();
		foreach($client_projects->clientProjectsHasServices as $ser)
			$selecetedServices[]	=	$ser->services_id;
		foreach($client_projects->clientProjectsHasSkills as $skill)
			$selecetedSkills[]	=	$skill->skills_id;
		foreach($client_projects->clientProjectsHasIndustries as $ind)
			$selecetedIndustries[]	=	$ind->industries_id;
		$selecetedStatus		=	explode(',',$client_projects->current_status);
		$selecetedTier			=	explode(',',$client_projects->tier);
		$selecetedRegions		=	explode(',',$client_projects->regions);
		
		
		$profile 	=	ClientProfiles::model()->FindByPk($client_projects->client_profiles_id);
		$country	=	$profile->cities->states_id;
		$region		=	$profile->cities->states->countries_id;
		$list		=	States::model()->findAllByAttributes(array('countries_id'=>$region));
		
		if($client_projects->preferences=='regoin'){
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$selecetedRegions));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		}
		elseif($client_projects->preferences=='no-preferences'){
			$listRegion			=	Countries::model()->findAll();
			foreach($listRegion as $listReg)
				$selecetedRegion[]	=	$listReg->id;
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$selecetedRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		}
		else{
			$da			=	States::model()->findByPk($country);
			$tier		=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			
		}
		
		ksort($filt);
		$skills	=	Skills::model()->findAll();
		if($client_projects->other_status==4)
			$view	=	'create';
		else
			$view	=	'create';
	  //CVarDumper::dump($client_projects->preferences,10,1);die;
		$this->render($view,array('project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills,'preference'=>$client_projects->preferences)); 
	 	
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */

	public function actionDelete($id)
	{
		$project	=	$this->loadModel($id);
		//Deleting project documents
                if(!empty($project->clientProjectDocuments)){
                    echo "<br> Dleting Project Documents<br>";
                    $c = ClientProjectDocuments::model()->deleteAll("client_projects_id = $project->id");
                   echo "<br> Dleting Project Documents COMPLETED<br>";
                }

                //Deleting Project Flows
                if(!empty($project->clientProjectFlows)){
                    echo "<br> Dleting Project Flow<br>";
                    $c = ClientProjectFlows::model()->deleteAll("client_projects_id = $project->id");
                     echo "<br> Dleting Project Flow COMPLETED<br>";
                }

                //Deleting project INDUSTRIES
                if(!empty($project->clientProjectsHasIndustries)){
                     echo "<br> Dleting Project INDUSTRIES<br>";
                    ClientProjectsHasIndustries::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project INDUSTRIES completed<br>";
                }

                //Deleting project Services
                if(!empty($project->clientProjectsHasServices)){
                    echo "<br> Dleting Project Services<br>";
                    ClientProjectsHasServices::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Services<br>";

                }

                //Deleting project Skills
                if(!empty($project->clientProjectsHasSkills)){
                    echo "<br> Dleting Project Skills<br>";
                    ClientProjectsHasSkills::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Skills Completed<br>";
                }

                //Deleting project Project Suppliers team
                if(!empty($project->clientProjectsHasSupplierTeams)){
                    echo "<br> Dleting Project Suppliers Team <br>";
                    ClientProjectsHasSupplierTeams::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Suppliers Team Completed<br>";
                }

                //Deleting project Project Zone
                if(!empty($project->clientProjectsHasZones)){
                    echo "<br> Dleting Project Zone<br>";
                    ClientProjectsHasZones::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Zone Completed<br>";
                }

                //Deleting project Project QUESTIONS
                if(!empty($project->clientProjectsQuestions)){
                    echo "<br> Dleting Project  QUESTIONS<br>";
                    ClientProjectsQuestions::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project  QUESTIONS<br>";
                }

                //Deleting project Project Preference
                if(!empty($project->projectReferences)){
                    echo "<br> Dleting Project Preference<br>";
                    ProjectReferences::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Preference<br>";
                }

                //Deleting project Project Unique Feature
                if(!empty($project->projectUniqueFeatures))
                {
                    echo "<br> Dleting Project Unique Feature<br>";
                    ProjectUniqueFeatures::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Unique Feature<br>";
                }

                //Deleting project Project  Feature and estimation
                if(!empty($project->projectsFeaturesAndEstimations)){
                    echo "<br> Dleting Project Unique Feature and estimation<br>";
                    ProjectsFeaturesAndEstimations::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Unique Feature and estimation<br>";
                }

                //Deleting project Project  proposal assigned
                if(!empty($project->suppliersProjectsProposals)){
                    echo "<br> For project id $project->id";
                    foreach($project->suppliersProjectsProposals as $p){
                        //Delete all documents against a proposal
                        echo "<br> For propsal id $p->id";
                        if(!empty($p->supplierDocuments)){
                            echo "<br> Suppliers doc <br>";
                            $c = SupplierDocuments::model()->deleteAll("suppliers_propsal_id= $p->id");

                        }
                        //Delete all Team against a proposal
                        if(!empty($p->suppliersProjectTeams)){
                            echo "<br> Suppliers Team <br>";
                            $c = SuppliersProjectTeam::model()->deleteAll("project_proposal_id= $p->id");
                            echo "<br> Suppliers Team Completed  <br>";
                        }

                        $p->delete();
                    }


                }



                 $project->delete();
		
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ClientProjects');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClientProjects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientProjects']))
			$model->attributes=$_GET['ClientProjects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ClientProjects the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ClientProjects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ClientProjects $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	/*calcualte method from clientController for ajax*/
	public function actionCalculate($id)
	{
		$client_projects	=	ClientProjects::model()->findByPk($id);
		if(isset($_POST['ClientProjects'])){
			// start current status part from here 
			$listRegion	=	array();
			$listTier	=	array();
			// end here current status part
			if(isset($_POST['options']))
			foreach($_POST['options'] as $sel)
				$listRegion[]	=	$sel;
			if(isset($_POST['tier']))
			foreach($_POST['tier'] as $sel2)
				$listTier[]	=	$sel2;
			$client_projects->attributes			=	$_POST['ClientProjects'];
			$client_projects->client_profiles_id	=	$client_projects->client_profiles_id;
			$client_projects->regions				=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && ($_POST['ClientProjects']['preferences']!='regoin' || $_POST['ClientProjects']['preferences']!='no-preferences'))
				$client_projects->regions	=	'';
			$client_projects->start_date		=	(isset($_POST['ClientProjects']['start_date']))?date('Y-m-d',strtotime($_POST['ClientProjects']['start_date'])):'';	
			$client_projects->save();
		}
		
		$profile 	=	ClientProfiles::model()->FindByPk($client_projects->client_profiles_id);
		$country	=	$profile->cities->states_id;
		$region		=	$profile->cities->states->countries_id;
		$list		=	States::model()->findAllByAttributes(array('countries_id'=>$region));
		
		if($client_projects->preferences=='regoin'){
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$listRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		}
		elseif($client_projects->preferences=='no-preferences'){
			$listRegion			=	Countries::model()->findAll();
			foreach($listRegion as $listReg)
				$selecetedRegion[]	=	$listReg->id;
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$selecetedRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		}
		else{
			$da			=	States::model()->findByPk($country);
			$tier		=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->countries;
		}
		ksort($filt);
		$this->renderPartial('_budget', array('list'=>$filt,'sel'=>$listTier,'preference'=>$client_projects->preferences,'city'=>$profile->cities->name,'countryName'=>$profile->cities->states->name));
	}
	public function actionBudget($id)
	{
		$client_projects	=	ClientProjects::model()->findByPk($id);
		if(isset($_POST['ClientProjects'])){
			// start current status part from here 
			$listRegion	=	array();
			$listTier	=	array();
			// end here current status part
			if(isset($_POST['options']))
			foreach($_POST['options'] as $sel)
				$listRegion[]	=	$sel;
			if(isset($_POST['tier']))
			foreach($_POST['tier'] as $sel2)
				$listTier[]	=	$sel2;
			$client_projects->attributes			=	$_POST['ClientProjects'];
			$client_projects->client_profiles_id	=	$client_projects->client_profiles_id;
			$client_projects->regions	 			=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && $_POST['ClientProjects']['preferences']!='regoin')
				$client_projects->regions	=	'';
			//$client_projects->current_status		=	(isset($_POST['ClientProjects']['current_status']))?$_POST['ClientProjects']['current_status']:'';
			if($client_projects->save()){
				echo '1';
			}
			else
				echo '0';
			die;
		}
	}
}
