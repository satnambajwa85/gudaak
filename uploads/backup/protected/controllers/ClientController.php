<?php
class ClientController extends Controller
{
	public $filpickerKey = "AlqJxqOBnROGcRhBT1jPFz";
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions

				'actions'=>array('account','index','basic','budget','mockup','pitch','portfolio','cancelrelease','release','cancelfund','fund','payments','faq','compare','supplierReference','references','projectDelete','calculate','project','pitchUp','statusUpdate','cityUpdate','createSkill','basicSave'),

				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('supplierReference'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function actionIndex()
	{
		$new_projects		=	new ClientProjects;
		if(isset($_POST['ClientProjects'])){
			$new_projects->attributes			=	$_POST['ClientProjects'];
			$new_projects->client_profiles_id	=	Yii::app()->user->profileId;
			$new_projects->other_status			=	0;
			$new_projects->preferences			=	'no-preferences';
			$new_projects->add_date				=	date('Y-m-d');
			$new_projects->current_status		=	2;
			//$new_projects->current_status		=	$_POST['ClientProjects']['current_status'];
			$new_projects->save();
			/*if(0){
				if(isset($_POST['Skills']))
				foreach($_POST['Skills'] as $key){
					if($key!=''){
						if(!is_numeric($key)){
							$sk		=	Skills::model()->findByAttributes(array('name'=>$key));
							$key	=	$sk->id;
						}
						$condition					=	array('client_projects_id'=>$new_projects->id,'skills_id'=>$key);
						$skill						=	ClientProjectsHasSkills::model()->findByAttributes($condition);
						if(empty($skill))
							$skill					=	new ClientProjectsHasSkills;
						$skill->skills_id			=	$key;
						$skill->client_projects_id	=	$new_projects->id;
						$skill->add_date			=	date('Y-m-d');
						$skill->status				=	1;
						$skill->save();
					}
				}
			}*/
			$this->redirect(array('/client/project','id'=>$new_projects->id));
		}
		$client_projects	=	ClientProjects::model()->findAllByAttributes(array('client_profiles_id'=>Yii::app()->user->profileId,'state'=>array(1,2)),array('order'=>'id DESC'));
       
		$skills			=	Skills::model()->findAll();
		$status			=	CurrentStatus::model()->findAll();
		$this->render('index',array('projects'=>$client_projects,'newProject'=>$new_projects,'status'=>$status,'skills'=>$skills));
	}
	public function actionAccount()
	{
		$password	=	0;
		$profile	=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
		$fileName	=	$profile->image;
		if(isset($_POST['ClientProfiles'])){
			$profile->attributes	=	$_POST['ClientProfiles'];
			//$profile->cities_id		=	$_POST['cities_id'];
			$profile->image			=	$_POST['ClientProfiles']['image'];
			//$profile->team_size		=	(isset($_POST['ClientProfiles']['team_size']))?$_POST['ClientProfiles']['team_size']:'1-2';
			$profile->status		=	1;
			if($profile->save()){
				Yii::app()->user->profileStatus	=	1;
				//$this->actionLogSave(Yii::app()->user->id,'Edit Profile','Profile details updated successfully',0);
				Yii::app()->user->setFlash('success','Profile details updated successfully');
			}
			else
				Yii::app()->user->setFlash('error','Error while updating your profile.');
		}
		$changePassword		=	new ChangePassword;
		if(isset($_POST['ChangePassword'])){
			$password	=	1;
			$changePassword->attributes=$_POST['ChangePassword'];
			if($changePassword->validate())
			{
				$record		=	Users::model()->findByPk(Yii::app()->user->id);
				$password	=	$record->password;
				if($password	==	$_POST['ChangePassword']['current_password']){
					$record->password			=	$_POST['ChangePassword']['new_password'];
					$record->confirm_password	=	$_POST['ChangePassword']['new_password'];
					if($record->save()){
						$record->unsetAttributes();
						$changePassword->unsetAttributes();
						//$this->actionLogSave(Yii::app()->user->id,'Password Changed','Your account password has been changed successfully',1);
						Yii::app()->user->setFlash('pass_success','Password changed successfully');
					}
					else
						Yii::app()->user->setFlash('pass_success','New Password not saved');
				}
				else{
					Yii::app()->user->setFlash('error','Current Password is not valid');
				}
				
				
			}
		}	

		$this->render('account',array('profile'=>$profile,'changePassword'=>$changePassword,'password'=>$password));
	}
	
	public function actionCityUpdate()
	{
		$profile	=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
		if(isset($_POST['city'])){
			$profile->cities_id		=	$_POST['city'];
			$profile->status		=	1;
			if($profile->save())
				Yii::app()->user->profileStatus	=	1;
		}
		die;
	}
	public function actionCreateSkill()
	{
		$skill	=	Skills::model()->findByAttributes(array('name'=>$_POST['name']));
		if(empty($skill))
			$skill	=	new Skills;
		if(isset($_POST['name'])){
			$skill->name		=	$_POST['name'];
			$skill->description	=	'added by user';
			$skill->skillscol	=	0;
			if($skill->save())
				echo $skill->id;
		}
		die;
	}
	
	
	public function actionStatusUpdate()
	{
		$profile			=	Users::model()->findByPk(Yii::app()->user->id);
		$profile->status	=	0;
		$profile->save();
	}
	public function actionBasic($id)
	{
		$client_projects	=	ClientProjects::model()->findByPk($id);
		if(isset($_POST['ClientProjects'])){
			// start current status part from here 
			$listStatus	=	array();
			$listRegion	=	array();
			$listTier	=	array();
			if(isset($_POST['current_status']))
				$client_projects->current_status		=	$_POST['current_status'];
			//foreach($_POST['current_status'] as $sta){
				//$listStatus[]	=	$sta;
			//}
			//$client_projects->current_status		=	implode(',',$listStatus);
			
			// end here current status part
			if(isset($_POST['options']))
			foreach($_POST['options'] as $sel)
				$listRegion[]	=	$sel;
			if(isset($_POST['tier']))
			foreach($_POST['tier'] as $sel2)
				$listTier[]	=	$sel2;
			$client_projects->attributes			=	$_POST['ClientProjects'];
			$client_projects->client_profiles_id	=	Yii::app()->user->profileId;
			//$client_projects->current_status		=	implode(',',$listStatus);
			$client_projects->other_current_status	=	(isset($_POST['ClientProjects']['other_current_status']))?$_POST['ClientProjects']['other_current_status']:'';
			$client_projects->regions				=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && $_POST['ClientProjects']['preferences']!='regoin')
				$client_projects->regions	=	'';
			$client_projects->start_date =	(isset($_POST['ClientProjects']['start_date']))?date('Y-m-d',strtotime($_POST['ClientProjects']['start_date'])):'';
			if($client_projects->other_status==4){
				$client_projects->state	=	2;
				//$this->actionLogSave(Yii::app()->user->id,'Project Submitted','You project '.$client_projects->name.' submitted sucessfully.',1);
				$users	=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
				$client_data=array();
				$client_data['name']		=	$users->first_name;
				$client_data['email']		=	$users->email;
				$this->sendMail($client_data,'submit_rfp');
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
				echo '1';
			}
			else
				echo '0';
			die;
		}
		$industries				=	Industries::model()->findAll();
		$services				=	Services::model()->findAll("status in(0,1)");
		$currentStatus			=	CurrentStatus::model()->findAll("id in(2,1) order by id desc");
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
		
		
		$profile 	=	ClientProfiles::model()->FindByPk(Yii::app()->user->profileId);
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
			$view	=	'basicDisable';
		else
			$view	=	'basic';
		$this->renderPartial($view,array('project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills));
	}
	
	public function actionProject($id)
	{
		$client_projects		=	ClientProjects::model()->findByPk($id);
		$industries				=	Industries::model()->findAll();
		$services				=	Services::model()->findAll("status in(0,1)");
		$currentStatus			=	CurrentStatus::model()->findAll("id in(2,1) order by id desc");
		$selecetedServices		=	array();
		$selecetedIndustries	=	array();
		$selecetedSkills		=	array();
		if(isset($client_projects->clientProjectsHasServices))
			foreach($client_projects->clientProjectsHasServices as $ser)
				$selecetedServices[]	=	$ser->services_id;
		if(isset($client_projects->clientProjectsHasSkills))
			foreach($client_projects->clientProjectsHasSkills as $skill)
			$selecetedSkills[]	=	$skill->skills_id;
		if(isset($client_projects->clientProjectsHasIndustries))
			foreach($client_projects->clientProjectsHasIndustries as $ind)
			$selecetedIndustries[]	=	$ind->industries_id;
		$selecetedStatus		=	explode(',',$client_projects->current_status);
		$selecetedTier			=	explode(',',$client_projects->tier);
		$selecetedRegions		=	explode(',',$client_projects->regions);
		
		
		$profile 	=	ClientProfiles::model()->FindByPk(Yii::app()->user->profileId);
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
		
		
		$skills	=	Skills::model()->findAll();
		if($client_projects->other_status==4)
			$view	=	'basicDisable';
		else
			$view	=	'basic';
		
		Yii::app()->clientscript->scriptMap['parsley.min.js'] = false;
		Yii::app()->clientscript->scriptMap['page.js'] = false;
			
		$this->render($view,array('project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills));
	}
	public function actionProjectDelete()
	{
		$id					=	$_POST['id'];
		$profile 			=	ClientProjects::model()->FindByPk($id);
		$profile->state		=	0;
		//$this->actionLogSave(Yii::app()->user->id,'References','You got new references from your client.',1);
		echo $profile->save();
	}
	public function actionCompare($id)
	{
		$list	=	SuppliersProjectsProposals::model()->findAllByAttributes(array('client_projects_id'=>$id,'status'=>array(1,2,4,5)));
		$tokenGen = new ServicesFirebaseTokenGenerator(APP_SECRET);
		$token = $tokenGen->createToken(array("type"=>"2"));
		
		$this->render('compare',array('list'=>$list,'token'=>$token));
	}
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
			$client_projects->client_profiles_id	=	Yii::app()->user->profileId;
			$client_projects->regions				=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && ($_POST['ClientProjects']['preferences']!='regoin' || $_POST['ClientProjects']['preferences']!='no-preferences'))
				$client_projects->regions	=	'';
			$client_projects->start_date		=	(isset($_POST['ClientProjects']['start_date']))?date('Y-m-d',strtotime($_POST['ClientProjects']['start_date'])):'';	
			$client_projects->save();
		}
		
		$profile 	=	ClientProfiles::model()->FindByPk(Yii::app()->user->profileId);
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
	public function actionPitch($id)
	{
		$re					=	Log::model()->findByAttributes(array('proposal_id'=>$id,'is_active'=>'1','is_checked'=>0));
		if(!empty($re)){
			$re->is_checked		=	1;
			$re->update_date	=	date('Y-m-d H:i:s');
			$re->save();
		}
		$tokenGen = new ServicesFirebaseTokenGenerator(APP_SECRET);
		$project = SuppliersProjectsProposals::model()->findByPk($id);
		$token = $tokenGen->createToken(array("id"=>yii::app()->user->id,"type"=>"2","name"=>$project->clientProjects->clientProfiles->first_name." ".isset($project->clientProjects->clientProfiles->last_name)?$project->clientProjects->clientProfiles->last_name:''));
		$current_status = explode(',',$project->clientProjects->current_status);
		$project_status = CHtml::listData(CurrentStatus::model()->findAllByAttributes(array("id"=>$current_status)),'id','name');
		$sumref= array('q1'=>"",'q2'=>"",'q3'=>"",'q4'=>"",'average'=>'','totalratings'=>"");
		$c= 0;
		if(!empty($project->suppliers->suppliersHasReferences)){
			$totalratings = count($project->suppliers->suppliersHasReferences);
			foreach($project->suppliers->suppliersHasReferences as $ref){
				if($ref->status == 1){
					$sumref["q1"]= (int)$sumref["q1"] + (int)$ref->q1_communication_rating ;
					$sumref["q2"]= (int)$sumref["q2"] + (int)$ref->q2_skill_rating  ;
					$sumref["q3"]= (int)$sumref["q3"] + (int)$ref->q3_timelines_ratings  ;
					$sumref["q4"]= (int)$sumref["q4"] + (int)$ref->q4_independence_rating  ;
					$c++;
				}
			}
			if($c==0)
				$c=1;
			$sumref["totalratings"] = $totalratings= $c;
            $sumref["average"] = $sumref["q1"] + $sumref["q2"] +$sumref["q3"] +$sumref["q4"];
			$sumref["average"] = number_format((float)((((int)$sumref["average"]))/(4*$totalratings)),1);

			$sumref["q1"] = number_format((float)((((int)$sumref["q1"]))/($totalratings)),2);
			$sumref["q2"] = number_format((float)((((int)$sumref["q2"]))/($totalratings)),2);
			$sumref["q3"] = number_format((float)((((int)$sumref["q3"]))/($totalratings)),2);
			$sumref["q4"] = number_format((float)((((int)$sumref["q4"]))/($totalratings)),2);

			
		}
		$allQuestion= array();
		foreach($project->clientProjects->clientProjectsQuestions as $key=>$q)
			$allQuestion[]=$q->id;

		$project_ans = SuppliersProjectAnswer::model()->findAllByAttributes(array("question_id"=>$allQuestion,"suppliers_id"=>$project->suppliers_id));
		$ans_list= array();
		foreach($project_ans as $ans){
			$ans_list[$ans->question_id]= $ans->answer;
		}
		
		$allref= SuppliersHasReferences::model()->findAllByAttributes(array("status"=>1,"suppliers_id"=>$project->suppliers_id));
		$setVariable= array(
				"project"=>$project,
				"token"=>$token,
				"project_status"=>$project_status,
				"sumref"=>$sumref,
				'allref'=>$allref,
				'ans_list'=>$ans_list
				
			);
		$this->render('project_pitch',$setVariable);
	}
	public function actionPitchUp($id)
	{
		$project	=	SuppliersProjectsProposals::model()->findByPk($id);
		if(isset($_REQUEST['action']) && $_REQUEST['action']=='reject'){
			$project->status	=	6;
			if($project->save()){
				$messg='We are sorry. '.$project->clientProjects->clientProfiles->first_name.' did not accept your proposal for '.$project->clientProjects->name.'.';
				$var	=	CHtml::link('Proposal Rejected',array('supplier/rfp','render'=>'full','projectid'=>$project->id,'stat'=>$project->status));
				$this->actionLogSave($project->suppliers->users_id,$var,$messg,1,$id,$project->status);
				$client_data=array();
				$client_data['name']		=	$project->suppliers->first_name;
				$client_data['project']		=	(isset($project->clientProjects->name))?$project->clientProjects->name:'';
				$client_data['email']		=	(isset($project->suppliers->users))?$project->suppliers->users->username:'';
				$client_data['client']		=	(isset($project->clientProjects->clientProfiles->first_name))?$project->clientProjects->clientProfiles->first_name:'';
				$client_data['clientEmail']		=	(isset($project->clientProjects->clientProfiles->users->username))?$project->clientProjects->clientProfiles->users->username:'';
				echo $this->sendMail($client_data,'rejected');
				$reject	=	SuppliersProjectsProposals::model()->countByAttributes(array('client_projects_id'=>$project->client_projects_id,'status'=>6));
				if(!($reject%3)){
					$this->sendMail($client_data,'rejectedAll');
				}
			}
			die;
		}
		elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='complete'){
			$project->status	=	5;
			if($project->save()){
				$messg='Congratulations! '.$project->clientProjects->clientProfiles->first_name.' was happy with your work.';
				
				$var	=	CHtml::link('Project Completed',array('supplier/rfp','render'=>'full','projectid'=>$project->id,'stat'=>$project->status));
				$this->actionLogSave($project->suppliers->users_id,$var,$messg,1,$id,$project->status);
				/*$client_data=array();
				$client_data['name']		=	$project->suppliers->first_name;
				$client_data['project']		=	(isset($project->clientProjects->name))?$project->clientProjects->name:'';
				$client_data['email']		=	(isset($project->suppliers->users))?$project->suppliers->users->username:'';
				$client_data['client']		=	(isset($project->clientProjects->clientProfiles->first_name))?$project->clientProjects->clientProfiles->first_name:'';
				$client_data['clientEmail']		=	(isset($project->clientProjects->clientProfiles->users->username))?$project->clientProjects->clientProfiles->users->username:'';
				echo $this->sendMail($client_data,'rejected');*/
				echo '1';
			}
			die;
		}
		else{
			$projectId	=	$project->client_projects_id;
			$list		=	SuppliersProjectsProposals::model()->findAllByAttributes(array('client_projects_id'=>$projectId));
			foreach($list as $data){
				$oldStas	=	$data->status;
				if($data->id == $id)
					$data->status	=	4;
				else
					$data->status	=	6;
				if($data->save()){
					if($data->status ==	4){	
						$refe					=	new SuppliersHasReferences;
						$refe->client_id		=	Yii::app()->user->profileId;
						$refe->suppliers_id		=	$data->suppliers_id;
						$refe->project_name		=	$data->clientProjects->name;
						$refe->client_email		=	$data->clientProjects->clientProfiles->email;
						$refe->company_name		=	$data->clientProjects->clientProfiles->company_name;
						$refe->client_first_name=	$data->clientProjects->clientProfiles->first_name;
						$refe->client_last_name	=	isset($data->clientProjects->clientProfiles->last_name)?$data->clientProjects->clientProfiles->last_name:'';
						$refe->status			=	0;
						$refe->save();
					}
					$messgA	='Congratulations! '.$data->clientProjects->clientProfiles->first_name.' has decided to work with you on '.$data->clientProjects->name.'.';
					$messgR	='We are sorry. '.$data->clientProjects->clientProfiles->first_name.' did not accept your proposal for '.$data->clientProjects->name.'.';
					if($data->status==4){
						$messg	=	$messgA;
						$nam	=	'Proposal Awarded';
					}else{
						$messg	=	$messgR;
						$nam	=	'Proposal Rejected';
					}
					
					$var	=	CHtml::link($nam,array('supplier/rfp','render'=>'full','projectid'=>$project->id,'stat'=>$data->status));
					if($oldStas != 6)
						$this->actionLogSave($data->suppliers->users_id,$var,$messg,1,$id,$data->status);
					
					$client_data				=	array();
					$client_data['name']		=	$data->suppliers->first_name;
					$client_data['project']		=	(isset($project->clientProjects->name))?$project->clientProjects->name:'';
					$client_data['id']			=	$project->client_projects_id;
					$client_data['stat']		=	$project->status;
					$client_data['email']		=	(isset($data->suppliers->users))?$data->suppliers->users->username:'';
					$client_data['client']		=	(isset($project->clientProjects->clientProfiles->first_name))?$project->clientProjects->clientProfiles->first_name:'';
					$client_data['clientEmail']		=	(isset($project->clientProjects->clientProfiles->users->username))?$project->clientProjects->clientProfiles->users->username:'';
					if($data->status==4)
						$this->sendMail($client_data,'accepted');
					//else
						//$this->sendMail($client_data,'rejected');
				}
			}
			echo '1';
			die;
		}
	}
	public function actionPortfolio($id)
	{
		$portfolio = SuppliersHasPortfolio::model()->findAllByAttributes(array("suppliers_id" =>$id));
		$setVariable['portfolio']=$portfolio;
		$this->renderPartial('portfolio_partial',$setVariable);
	}
	public function actionFaq($id)
	{
		$questions	=	Faq::model()->findAll();
		$list	=	array();
		foreach($questions as $question)
			$list[$question->type][$question->id]=$question->question;
		$answers	=	SuppliersFaqAnswers::model()->findAllByAttributes(array('suppliers_id'=>$id));
		$anwList	=	array();
		foreach($answers as $answers)
			$anwList[$answers->faq_id]=$answers->answers;
		$this->renderPartial('faq',array('answer'=>$anwList,'question'=>$list));
	}
	public function actionMockup($id)
	{
		if(isset($_POST['action']) && $_POST['action']=='delete'){
			$img	=	$_POST['imageId'];
			$docs	=	ClientProjectDocuments::model()->findByPk($img);
			$docs->delete();
			echo '1';
		}
		elseif(isset($_POST['data'])){
			$data	=	json_decode($_POST['data']);
			$listIds	=	array();
			foreach($data as $item){
				$val	=	(array)$item;
				$docs						=	new ClientProjectDocuments;
				$docs->client_projects_id	=	$id;
				$docs->path					=	$val['url'];
				$docs->type					=	$val['mimetype'];
				$docs->name					=	$val['filename'];
				$docs->size					=	$val['size'];
				$docs->status				=	1;
				$docs->add_date				=	date('Y-m-d');
				if($docs->save()){
					echo '<tr><td><span class="label label-success">'.$docs->type.'</span> '.$docs->name.' ('.round((($docs->size)/1024),2).' KB)</td><td><a href="'.$docs->path.'" target="_blank">View</a></td><td><a href="javascript:void(0);" class="removeImg" rel="'.$docs->id.'">Delete</a></td></tr>';
				}
			}
		}
		die;
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
			$client_projects->client_profiles_id	=	Yii::app()->user->profileId;
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
    public function actionSupplierReference($link)
	{
		$data		=	explode(',',base64_decode($link));
		$email		=	$data[0];
		$clientId	=	$data[1];
		$supplierId	=	$data[2];
		$id			=	$data[3];
		$client		=	ClientProfiles::model()->findBYPk($clientId);
		$ref		=	SuppliersHasReferences::model()->findBYPk($id);
		
		if(!empty($client) && $client->id==$ref->client_id && $client->users->username	==	$email){
			$login				=	new LoginForm;
			$login->username	=	$client->users->username;
			$login->password	=	$client->users->password;
			if($login->login())
				$this->redirect(array('/client/references','id'=>$ref->id));
			else{
				Yii::app()->user->setFlash('loginError','You account is not varified yet.');
				$this->redirect(array('site/login'));
			}
		}
	}
	public function actionReferences($id)
	{
		$refe	=	SuppliersHasReferences::model()->findByPk($id);		
		$profile	=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
		$company	=	(!empty($refe->suppliers->name))?$refe->suppliers->name:'Not set';
		$refe->company_name	=	(empty($profile->company_name)?$refe->company_name : $profile->company_name);
		if(isset($_POST['SuppliersHasReferences'])){
			$refe->attributes	=	$_POST['SuppliersHasReferences'];
			$refe->q1_communication_rating	=	(isset($_POST['q1_communication_rating']))?$_POST['q1_communication_rating']:'1';
			$refe->industry_id				=	(isset($_POST['industry_id']))?$_POST['industry_id']:'1';
			$refe->q2_skill_rating			=	(isset($_POST['skill_rating']))?$_POST['skill_rating']:'0';
			$refe->q3_timelines_ratings		=	(isset($_POST['timelines_ratings']))?$_POST['timelines_ratings']:'0';
			$refe->q4_independence_rating	=	(isset($_POST['independence_rating']))?$_POST['independence_rating']:'0';
			$refe->status					=	1;
			$pre	=	0;
			$client_projects	=	ClientProjects::model()->findAllByAttributes(array('client_profiles_id'=>Yii::app()->user->profileId));
			if($pre==0)
				$pre	=	count($client_projects);
			
			$allref	=	SuppliersHasReferences::model()->findAllByAttributes(array("status"=>1,"client_id"=>$refe->client_id));
			if($pre==0)
				$pre	=	count($allref);
			
			if($refe->save()){
				Yii::app()->user->setFlash('success','Thank you for reviewing the service provider. We really appreciate it as it helps us maintain a high standard of service.');
				$var	=	CHtml::link('You Got Reviewed',array('supplier/pastClients','render'=>'full'));
				$this->actionLogSave($refe->suppliers->users_id,$var,'One of your clients has reviewed your work',1);
				$client_data['name']	=	$refe->client->first_name;
				$client_data['supplier']=	$refe->suppliers->first_name.' '.$refe->suppliers->last_name;
				$client_data['email']	=	$refe->client->users->username;
				$client_data['password']=	$refe->client->users->password;
				$client_data['clientEmail']	=	$refe->suppliers->users->username;//supplier email for same
				if($pre == 0){
                    $this->sendMail($client_data,'referance');
                }
				$this->sendMail($client_data,'referance1');
			}
		}
		$this->render('references',array('model'=>$refe,'company'=>$company));
	}
	public function actionCompany()
	{
		$this->renderPartial('company');
	}
	public function actionQuestions()
	{
		$this->renderPartial('custom_questions');
	}
	public function actionPreferences()
	{
		$this->renderPartial('preferences');
	}
	public function actionScope()
	{
		$this->renderPartial('product_scope');
	}
    public function actionProgress()
	{
		$this->renderPartial('progress');
	}
	public function actionProposal()
	{
		$this->renderPartial('proposal');
	}
	public function actionChangePassword()
	{		
		$changePassword		=	new ChangePassword;	
		if(isset($_POST['ChangePassword'])){
			$changePassword->attributes=$_POST['ChangePassword'];
			if($changePassword->validate())
			{
				$record		=	Users::model()->findByPk(Yii::app()->user->id);
				$password	=	$record->password;
				if($password	==	$_POST['ChangePassword']['current_password']){
					$record->password			=	$_POST['ChangePassword']['new_password'];
					$record->ConfirmPassword	=	$_POST['ChangePassword']['new_password'];
					if($record->save()){
						$record->unsetAttributes();
						$changePassword->unsetAttributes();
						Yii::app()->user->setFlash('success','Password changed successfully');
					}
					else
						Yii::app()->user->setFlash('error','New Password not saved');
				}
				else{
					Yii::app()->user->setFlash('error','Current Password is not valid');
				}
				
			}
		}			
		$this->render('account',array('changePassword'=>$changePassword,'password'=>1));
	}
	
	public function actionLogSave($for,$title,$description,$notification,$proposalId=null,$projectStatus=0,$is_checked=0)
	{
        if(!empty($proposalId))
            Log::model()->updateAll(array('is_active'=>0),'proposal_id="'.$proposalId.'"');
        $log				=	new Log;
		$log->login_id		=	Yii::app()->user->id;
		$log->title			=	$title;
		$log->for_user		=	$for;
		$log->description	=	$description;
		$log->notification	=	$notification;
		$log->is_read		=	0;
		$log->add_date		=	date('Y-m-d H:i:s');
		$log->status		=	1;
		$log->project_status=	$projectStatus;
		$log->proposal_id 	=	$proposalId;
		$log->is_checked 	=	$is_checked;
		$log->is_active	    =	1;
		$log->save();
	}
	public function sendMail($data,$type)
	{
		$admin	=	1;
		$templete =	'';
		switch($type){
			case 'accepted':
				$templete	=	'accepted';
				$subject = 'VenturePact: Proposal Accepted';
				$body = $this->renderPartial('/mails/proj_client_accept_tpl',
										array(	'name' => $data['name'],
												'project_name' => $data['project'],
												'email'=>$data['email'],
												'id'=>$data['id'],
												'stat'=>$data['stat'],), true);
				$admin	=	2;
				$subject1 = 'VenturePact: Proposal Accepted';
				$body1 = $this->renderPartial('/mails/proj_accept_tpl',
										array(	'name' => $data['client'],
										), true);
				
			break;
			case 'rejected':
				$templete	=	'rejected';
				$subject = 'VenturePact: Proposal Rejected';
				$body = $this->renderPartial('/mails/proj_client_reject_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email']), true);
				$admin	=	2;
				$subject1 = 'VenturePact: Proposal Rejected';
				$body1 = $this->renderPartial('/mails/proj_reject_tpl',
										array(	'name' => $data['client'],), true);
			break;
			case 'rejectedAll':
				$templete	=	'rejectedAll';
				$admin		=	3;
				$subject1	=	'VenturePact: All Proposal Rejected';
				$body1		=	$this->renderPartial('/mails/proj_reject_all_tpl',
										array(	'name' => $data['client'],
												'email'=>$data['clientEmail']), true);
			break;
//			case 'create_proj':
//				$admin=0;
//				$subject = 'VenturePact: Project Started';
//				$body = $this->renderPartial('/mails/new_proj_tpl',
//										array(	'name' => $data['name'],
//												'email'=>$data['email']), true);
//			break;
			case 'submit_rfp':
				$templete	=	'submit_rfp';
				$subject = 'VenturePact: RFP Successfully Submitted';
				$body = $this->renderPartial('/mails/rfp_submitted_tpl',
										array(	'name' => $data['name'],
												'data' => $data,
												'email'=>$data['email']), true);
			break;
			case 'referance':
				$templete	=	'referance';
				$subject	=	'VenturePact: Recommendation Successfully Submitted';
				$body		=	$this->renderPartial('/mails/reference_tpl',
										array(	'name' => $data['name'],
												'supplier' => $data['supplier'],
												'password' => $data['password'],
												'email'=>$data['email']), true);
			break;
			case 'referance1':
				$templete	=	'referance1';
				$admin		=	4;
				$subject	=	'VenturePact: New Recommendation';
				$body		=	$this->renderPartial('/mails/reference_supplier_tpl',
										array(	'name' => $data['name'],
												'supplier' => $data['supplier'],
												'email'=>$data['email'],
												'link'=>CHtml::link('click here', $this->createAbsoluteUrl('supplier/pastClients',array('render'=>'full')))
												), true);
												
			break;
            
            case "send_release" :
				$templete	=	'send_release_client';			
                $subject = 'VenturePact: Release Funds';
                  
				$body = $this->renderPartial('/mails/send_release_client',
										array(	'data' => $data),
											 true
											);
                                            
                                       
                $email = "";  
                
                $to_email = $data[1]['supplier_email'];   
                $from_email = $data[1]['client_email'];
                                           
            break;
            
           case "send_fund" :
				$templete	=	'send_fund_client';			
                $subject = 'VenturePact: Send Funds';
                  
				$body = $this->renderPartial('/mails/send_fund_client',
										array(	'data' => $data),
											 true
											);
                                            
                                       
                $email = "";  
                
                $to_email = $data[1]['supplier_email'];   
                $from_email = $data[1]['client_email'];
                                           
            break;
            
            
            case "cancel_send_fund" :
				$templete	=	'send_fund_client';			
                $subject = 'VenturePact: Cancel Funds';
                  
				$body = $this->renderPartial('/mails/send_cancel_fund_client',
										array(	'data' => $data),
											 true
											);
                                            
                                       
                $email = "";  
                
                $to_email = $data[1]['supplier_email'];   
                $from_email = $data[1]['client_email'];
                                           
            break;
            
             case "cancel_release_fund" :
				$templete	=	'send_fund_client';			
                $subject = 'VenturePact: Cancel Payment';
                  
				$body = $this->renderPartial('/mails/send_cancel_release_client',
										array(	'data' => $data),
											 true
											);
                                            
                                       
                $email = "";  
                
                $to_email = $data[1]['supplier_email'];   
                $from_email = $data[1]['client_email'];
                                           
            break;
            
            
			default:
			break;			
		}
		$from		=	Yii::app()->params['adminEmail'];
		$to			=	(isset($data['email']))?$data['email']:''; 
		$to1		=	(isset($data['clientEmail']))?$data['clientEmail']:'';
        
        if(isset($email))
        {
            $from = $from_email;
            $to = $to_email;
           // $to = "sandeep.verma@venturepact.com";
        }
        
        
		$fromname   = "VenturePact Team";
		require_once("sendgrid-php/sendgrid-php.php");
		$options = array("turn_off_ssl_verification" => true);
		$sendgrid = new SendGrid('riteshtandon231981', 'venturepact1', $options);
		$mail = new SendGrid\Email();
		$mail1 = new SendGrid\Email();
		if($admin==0)
		{
			$mail->addTo($to)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
		}
		elseif($admin==4)
		{
			$mail->addTo($to1)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
		}
		elseif($admin==2){
			$mail->addTo($to)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
			$mail1->addTo($to1)->setFrom($from)->setFromName($fromname)->setSubject($subject1)->setHtml($body1);
			if($sendgrid->send($mail1))
				parent::mailLog($subject1,$to1,$templete,$body1);
			
		}elseif($admin==3){
			$mail1->addTo($to1)->setFrom($from)->setFromName($fromname)->setSubject($subject1)->setHtml($body1);
			  if($sendgrid->send($mail1))
				parent::mailLog($subject1,$to1,$templete,$body1);
			
		}else{
			$mail->addTo($to)->addTo($from)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
		}
		if(!$sendgrid->send($mail))
			return 0;
        else
		{
			parent::mailLog($subject,$to,$templete,$body);
			return 1;
		}
	}

	public function actionBasicSave($id)
	{
		$client_projects	=	ClientProjects::model()->findByPk($id);
		if(isset($_POST['ClientProjects'])){
			// start current status part from here 
			$listStatus	=	array();
			$listRegion	=	array();
			$listTier	=	array();
			if(isset($_POST['current_status']))
				$client_projects->current_status		=	$_POST['current_status'];
			//foreach($_POST['current_status'] as $sta){
				//$listStatus[]	=	$sta;
			//}
			//$client_projects->current_status		=	implode(',',$listStatus);
			
			// end here current status part
			if(isset($_POST['options']))
			foreach($_POST['options'] as $sel)
				$listRegion[]	=	$sel;
			if(isset($_POST['tier']))
			foreach($_POST['tier'] as $sel2)
				$listTier[]	=	$sel2;
			$client_projects->attributes			=	$_POST['ClientProjects'];
			$client_projects->client_profiles_id	=	Yii::app()->user->profileId;
			//$client_projects->current_status		=	implode(',',$listStatus);
			$client_projects->other_current_status	=	(isset($_POST['ClientProjects']['other_current_status']))?$_POST['ClientProjects']['other_current_status']:'';
			$client_projects->regions				=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && $_POST['ClientProjects']['preferences']!='regoin')
				$client_projects->regions	=	'';
			$client_projects->start_date =	(isset($_POST['ClientProjects']['start_date']))?date('Y-m-d',strtotime($_POST['ClientProjects']['start_date'])):'';
			
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
				echo '1';
			}
			else
				echo '0';
			die;
		}
		$industries				=	Industries::model()->findAll();
		$services				=	Services::model()->findAll("status in(0,1)");
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
		
		
		$profile 	=	ClientProfiles::model()->FindByPk(Yii::app()->user->profileId);
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
			$view	=	'basicDisable';
		else
			$view	=	'basic';
		$this->renderPartial($view,array('project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills));
	}


    
    
    public function actionPayments()
    {
           $milestoneStatus = parent::milestoneStatusarray();
           $supplier_project_proposal_id = 467;
           
           $milestones = SupplierHasMilestones::model()->FindAllByAttributes(array("supplier_project_proposal_id"=>$supplier_project_proposal_id));
            
      
    	   $this->render('payments',array("milestones"=>$milestones,"milestonesStatus"=>$milestoneStatus));
    }
    
    public function actionFund()
    {
        if($_POST['id'] > 0)
        {
            $model  = SupplierHasMilestones::model()->findByPK($_POST['id']);
            $model->status = 2;
            if($model->save())
            {
               $data = parent::fetch_data_for_email($model->supplier_project_proposal_id);
               $data = array($model,$data); 
               $this->sendMail($data,"send_fund");
               parent::actionMilestonesstatus($_POST['id'],1,2,"test");                
            }else{
                echo "0";
            }
        }
    }
    
    public function actionCancelfund()
    {
        if($_POST['id'] > 0)
        {
            $model  = SupplierHasMilestones::model()->findByPK($_POST['id']);
            $model->status = 5;
            if($model->save())
            {
               $data = parent::fetch_data_for_email($model->supplier_project_proposal_id);
               $data = array($model,$data); 
               $this->sendMail($data,"cancel_send_fund");
               parent::actionMilestonesstatus($_POST['id'],1,5,"test");                
            }else{
                echo "0";
            }
        }
    }
    
    public function actionrelease()
    {
        if($_POST['id'] > 0)
        {
            $model  = SupplierHasMilestones::model()->findByPK($_POST['id']);
            $model->status = 4;
            if($model->save())
            {
                
               $data = parent::fetch_data_for_email($model->supplier_project_proposal_id);
               $data = array($model,$data); 
               $this->sendMail($data,"send_release");
               parent::actionMilestonesstatus($_POST['id'],3,4,"test");                
            }else{
                echo "0";
            }
        }
    }
    public function actionCancelrelease()
    {
        if($_POST['id'] > 0)
        {
            $model  = SupplierHasMilestones::model()->findByPK($_POST['id']);
            $model->status = 6;
            if($model->save())
            {
               $data = parent::fetch_data_for_email($model->supplier_project_proposal_id);
               $data = array($model,$data); 
               $this->sendMail($data,"cancel_send_fund");
               parent::actionMilestonesstatus($_POST['id'],3,6,"test");                
            }else{
                echo "0";
            }
        }
    }

}
?>
