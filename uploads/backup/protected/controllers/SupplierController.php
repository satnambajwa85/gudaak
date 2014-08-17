<?php

class SupplierController extends Controller
{
	public $filpickerKey = "AlqJxqOBnROGcRhBT1jPFz";
    public $projectStatus = array(
							'0'=>array(
								'client'=>'',
								'supplier'=>'New Lead'),
                            '1'=>array(
								'client'=>'',
								'supplier'=>'Seeking Clarification'),
							'2'=>array(
								'client'=>'',
								'supplier'=>'Proposal Submitted'),
							'3'=>array(
								'client'=>'',
								'supplier'=>'(We are not using this for time being)Accepted pitch by client'),
							'4'=>array(
								'client'=>'',
								'supplier'=>'Proposal Accepted'),
							'5'=>array(
								'client'=>'',
								'supplier'=>'Project Completed'),
							'6'=>array(
								'client'=>'',
								'supplier'=>'Proposal Archived')
							
							);

    
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
                       array('allow', // allow authenticated user to perform 'create' and 'test' actions
                             'actions'=>array('view','account','index','profile','Deletemilestone','Release','Reminder','Fundingrequestsendstatus','ajaxProfile','ajaxPortfolio','AjaxSaveReferences','rfp','pitch','AjaxChatHandler','projectStatusHandler','test','faq','ajaxGetPortfolio','updateLegalStatus','pastClients','payments'),
                    'users'=>array('@'),
                       ),
                       array('deny',  // deny all users
                               'users'=>array('*'),
                       ),
               );
    }
	public function actionIndex()
	{
		//CVarDumper::dump($_POST,10,1);;die;
		$supplier = Suppliers::model()->findByPk(Yii::app()->user->profileId);
		/*If suppliers sign the agreement */
		if(isset($_POST["Suppliers"]) && isset($_POST["action"]))
		{
			//CVarDumper::dump($_POST,10,1);;die;
			$supplier->status= 3;

			$supplier->save();
            Yii::app()->user->setFlash('success',"Perfect! You are officially inducted into the marketplace. You will soon start receiving leads as per your preferences. You can always update your profile to change any of your selected preferences, to add new clients or to add portfolio items.");

		}
		$tokenGen = new ServicesFirebaseTokenGenerator(APP_SECRET);
		if(isset($_POST["Services"]["test"]))
		{	
			//CVarDumper::dump($_POST,10,1);die;
			/* Suppliers services start here*/
			$allData=SuppliersHasServices::model()->findAllByAttributes(array("suppliers_id"=>yii::app()->user->profileId));
				foreach($allData as $record){
					if(!array_key_exists ($record->services_id,$_POST["Services"])){
						$record->status= 0;
					}
					else{
						$record->status= 1;
					}
					$record->save();
					
				}
			$this->actionLogSave(Yii::app()->user->id,'Prefrence Changed ','Prefrences changed ',0);
			Yii::app()->user->setFlash('success','<strong>Services Updated.</Strong> You will only receive proposals for the checked services. You may update again as soon as you have more capacity.');
			
		}

		$services = Services::model()->findAll();
		
		//get all projects allocated 
		
		//$suppliers_projects_proposals = SuppliersProjectsProposals::model()->findAllByAttributes(array("suppliers_id"=>yii::app()->user->profileId),array("order"=>"add_date ASC"));
		//$suppliers_projects_proposals = SuppliersProjectsProposals::model()->findAll("suppliers_id= :suppId order by add_date   ",array(":suppId"=>yii::app()->user->profileId));
		$suppliers_projects_proposals = SuppliersProjectsProposals::model()->findAll(array('order'=>'add_date DESC', 'condition'=>'suppliers_id=:x', 'params'=>array(':x'=>yii::app()->user->profileId)));
		$token = $tokenGen->createToken(array("type"=>"3"));
		$setAttributes = array(
			'services'=>$services,
			'suppliers_projects_proposals'=>$suppliers_projects_proposals,
            'token'=>$token,
			'supplier'=>$supplier
		);
		//CVarDumper::dump($suppliers_projects_proposals,10,1);die;
		$this->render('index',$setAttributes);
		
	}

	
	public function ActionRfp()
	{
        
		$tokenGen = new ServicesFirebaseTokenGenerator(APP_SECRET);
		//CVarDumper::dump($_REQUEST,10,1);die;
		if(!empty($_REQUEST["projectid"])){
			
			$project = SuppliersProjectsProposals::model()->findByAttributes(array("suppliers_id"=>yii::app()->user->profileId,"id"=>(int)$_REQUEST["projectid"]));
			//CVarDumper::dump($_REQUEST["projectid"],10,1);die;
            if(!empty($project)){
                $token = $tokenGen->createToken(array("id"=>yii::app()->user->id,"type"=>"3","name"=>$project->suppliers->first_name." ".$project->suppliers->last_name));

                $current_status = explode(',',$project->clientProjects->current_status);
                $project_status = CHtml::listData(CurrentStatus::model()->findAllByAttributes(array("id"=>$current_status)),'id','name','position');
                $setVariable= array(
                    "project"=>$project,
                    "token"=>$token,
                    "project_status"=>$project_status
                );


                //CVarDumper::dump($project_status,10,1);die;
                if(isset($_REQUEST["render"]))
                {
                    $this->render('project_rfp',$setVariable);
                }else{
                  $this->renderPartial('project_rfp',$setVariable);
                }
            }
            else{
                Yii::app()->user->setFlash('errors','Project Not found!');
                $this->redirect(array('supplier/index'));
            }
			//Flow testing 
			
		}
		


		
		
	}
	
	public function ActionUpdateLegalStatus()
	{
		//CVarDumper::dump($_POST,10,1);die;
		if(isset($_POST['Suppliers']["status"])){

			$supplier= Suppliers::model()->findByAttributes(array("id"=>yii::app()->user->profileId));
			$returnVar = array("iserror"=>false,
							   "success"=>array(),
							   "errors"=>array()
							  );
				switch($_POST['action']){
				case 'approve' :
					$supplier->status = 3;

					if($supplier->save())
					{
                        $returnVar["iserror"] = false;
						$returnVar["success"]= "Perfect! You are officially inducted into the marketplace. You will soon start receiving leads as per your preferences. You can always update your profile to change any of your selected preferences, to add new clients or to add portfolio items.";

						$maildata['name'] = $proposal->clientProjects->clientProfiles->users->display_name;
                        $maildata['email'] = $proposal->clientProjects->clientProfiles->users->username;
                        $title='Seeking Clarification';
                        $description =  $proposal->suppliers->name." is seeking clarification for ".$proposal->clientProjects->name;
                        $this->sendMail($maildata,"seek_clarification");
                        $this->actionLogSave($supplier->users->id,"Supplier Signed Agreement",$supplier->users->username." has signed the agreement.",0);
					}else
					{
						$returnVar["iserror"] = true;
						$returnVar["errors"]= "Error";
					}
					  
				break;

				default ;
				
				
			}
				
				die(json_encode($returnVar));


		}
		
		
	}
	
	/*Fire chat Ajax handler*/
	public function ActionAjaxChatHandler()
	{
			/*to set room id*/
		
		if(isset($_POST['action'])){
			if(isset($_POST['proposalId'])){
			$proposal= SuppliersProjectsProposals::model()->findByAttributes(array("id"=>$_POST["proposalId"]));
			$returnVar = array("iserror"=>false,
							   "success"=>array(),
							   "errors"=>array()
							  );
				switch($_POST['action']){
				case 'setroom' :
					$proposal->chat_room_id = $_POST["room"];
                    if($_POST["stat"]== 0)
                    {
					   $proposal->status = 1;
                        $maildata['name'] = $proposal->clientProjects->clientProfiles->users->display_name;
                        $maildata['email'] = $proposal->clientProjects->clientProfiles->users->username;
                        $maildata['id'] = $proposal->id;
                        $maildata['pid'] = $proposal->client_projects_id;
                        $title='Seeking Clarification';
                        $title="<a href='".Yii::app()->createUrl('/client/pitch',array("id"=>$proposal->id,"pid"=>$proposal->client_projects_id))."'>Seeking Clarification</a>";
                        $description =  $proposal->suppliers->name." is seeking clarification for ".$proposal->clientProjects->name;
                        $this->sendMail($maildata,"seek_clarification");

                        $this->actionLogSave($proposal->clientProjects->clientProfiles->users_id,$title, $description,1,$proposal->id,$proposal->status);
                    }
					if($proposal->save())
					{
						$returnVar["success"]= true;

					}else
					{
						$returnVar["iserror"] = true;
						$returnVar["errors"]= "Error";
					}
					  
				break;
				case 'getroom' :
					$room=array("room"=>$proposal->chat_room_id);
					if(empty($proposal->chat_room_id)){ $room=array("room"=>false);}
					//die(CVarDumper::dump($room,10,1));							   
					$returnVar["success"]=$room;
				break;
				default ;
				
				
			}
				
				die(json_encode($returnVar));
			}
			else
			{
				// return false later on 
			}
		}
		
		
		
	}
	public function ActionPitch()
	{
		$tokenGen = new ServicesFirebaseTokenGenerator(APP_SECRET);
		//Processed Ajax request 
		if(isset($_POST["req"]))
		{
			$this->ajaxSavePitchDoc($_POST);
		}
		if(isset($_POST["SuppliersProjectsProposals"]))
		{	
			$this->savePitch($_POST);
		}
		
		// Serve page opening
		if(!empty($_REQUEST["projectid"])){
			$project = SuppliersProjectsProposals::model()->findByAttributes(array("suppliers_id"=>yii::app()->user->profileId,"id"=>(int)$_REQUEST["projectid"]));
			
            $profile = Suppliers::model()->findByPk(Yii::app()->user->profileId);

			$token = $tokenGen->createToken(array("id"=>yii::app()->user->id,"type"=>"3","name"=>$project->suppliers->first_name." ".$project->suppliers->last_name));
			
			$current_status = explode(',',$project->clientProjects->current_status);
			
			$project_status = CHtml::listData(CurrentStatus::model()->findAllByAttributes(array("id"=>$current_status)),'id','name');
			
			//get all questions id's 
			$allQuestion= array();
			foreach($project->clientProjects->clientProjectsQuestions as $key=>$q){
				$allQuestion[]=$q->id;
			}
            $project_ans = SuppliersProjectAnswer::model()->findAllByAttributes(array("question_id"=>$allQuestion,"suppliers_id"=>yii::app()->user->profileId));
			//creating list of answers
			$ans_list= array();
			foreach($project_ans as $ans){
				$ans_list[$ans->question_id]= $ans->answer;
			}
			
			$supplierTeam = new SuppliersProjectTeam;
			//Flow testing 
			
			
		}
		//finding ratings sum on farmulla based 
		$sumref= array(
			'q1'=>0,
			'q2'=>0,
			'q3'=>0,
			'q4'=>0,
			'average'=>0,
			'totalratings'=>0
			
		);
		
		$c= 0;
		$allref= SuppliersHasReferences::model()->findAllByAttributes(array("status"=>1,"suppliers_id"=>Yii::app()->user->profileId));

		if(!empty($allref)){
			$totalratings = count($allref);
            //CVarDumper::dump(count($project->suppliers->suppliersHasReferences),10,1);
            //die();
		    if($totalratings>0){
                foreach($allref as $ref){
                    if($ref->status == 1){

                        $sumref["q1"]= (int)$sumref["q1"] + (int)$ref->q1_communication_rating ;
                        $sumref["q2"]= (int)$sumref["q2"] + (int)$ref->q2_skill_rating  ;
                        $sumref["q3"]= (int)$sumref["q3"] + (int)$ref->q3_timelines_ratings  ;
                        $sumref["q4"]= (int)$sumref["q4"] + (int)$ref->q4_independence_rating  ;

                        $c++;
                    }
                }


                /*
                * Farmulla to calculate ratings
                * Total average rating out of 10
                * average = (totalRatingObtained*100)/(weightageNumber * numberOfPeopleRated)
                * questions = (totalSumObtained * 100) / (weightageNumber * numberofPeopleRated)
                */
                $sumref["totalratings"] = $totalratings;
                $sumref["average"] = $sumref["q1"] + $sumref["q2"] +$sumref["q3"] +$sumref["q4"];
                $sumref["average"] = number_format((float)((((int)$sumref["average"]))/(4 *$totalratings)),1);

                $sumref["q1"] = number_format((float)((((int)$sumref["q1"]))/($totalratings)),2);
                $sumref["q2"] = number_format((float)((((int)$sumref["q2"]))/($totalratings)),2);
                $sumref["q3"] = number_format((float)((((int)$sumref["q3"]))/($totalratings)),2);
                $sumref["q4"] = number_format((float)((((int)$sumref["q4"]))/($totalratings)),2);

			
		      }
        }
		
		/*CVarDumper::dump($allref,10,1);
		CVarDumper::dump($sumref,10,1);die;*/
		$setVariable= array(
                "profile"=>$profile,
				"project"=>$project,
				"token"=>$token,
				"project_status"=>$project_status,
				"sumref"=>$sumref,
                "ans_list"=>$ans_list,
                "supplierTeam"=>$supplierTeam,
                "allref"=>$allref
		);
		
		
		
		//CVarDumper::dump($setVariable,10,1);die;
			
		if(isset($_REQUEST["render"]))
			$this->render('project_pitch',$setVariable);
		else
			$this->renderPartial('project_pitch',$setVariable);
		
	}
	
	private function savePitch($data)
	{
		//CVarDumper::dump($data,10,1);die;
		$data = $data["SuppliersProjectsProposals"];
		$response = array('iserror'=>false,"errors"=>array(),"success"=>array());
		$propsal= SuppliersProjectsProposals::model()->findByAttributes(array("suppliers_id"=>yii::app()->user->profileId,"id"=>(int)$data["id"]));
		
		$propsal->attributes = $data;
		if(isset($data["start_date"]))
			$propsal->start_date = date("Y-m-d",strtotime($data["start_date"]));
		
		if($propsal->save()){
			
			
			if(isset($_POST["answer"])){
				foreach($_POST["answer"] as $key=>$q)
				{
					$sup =  SuppliersProjectAnswer::model()->findByAttributes(array("question_id"=>$key,"suppliers_id"=>yii::app()->user->profileId)) ;
					if(empty($sup))
						$sup = new SuppliersProjectAnswer ;
					$sup->question_id = $key;
					$sup->answer = $q;
					$sup->suppliers_id= yii::app()->user->profileId;
					$sup->created = date("Y-m-d H:s");
					//CVarDumper::dump($data,10,1);
					$sup->save();
				}
			}
			$response["iserror"]= false;
			$success =array("msg"=>"Saved Succesfully!!");
			array_push($response["success"],$success);
		}else
		{
			$response["iserror"]= true;
			$errors = array("msg"=>"Server Error!!");
			array_push($response["errors"],$errors);
		}
			
		echo json_encode($response);
		die;
	}
	
    public function ActionProjectStatusHandler($projectid,$stat){
        $tokenGen = new ServicesFirebaseTokenGenerator(APP_SECRET);
		$pid = $projectid;
		if(!empty($pid) && !empty($stat)){
			
			//Logic for profile required fileds
			$project = SuppliersProjectsProposals::model()->findByAttributes(array("suppliers_id"=>yii::app()->user->profileId,"id"=>$pid));
			$canSubmit= true;
            
			if($stat==2)
			{
				//check for file completion
				if($this->checkPitchBeforeSubmit($project)){
					$canSubmit= false;
                    $msg = "Either of the following is not complete in your account:<br>1. Profile<br>2. FAQ's<br>3. Pitch Details<br>4. Proposal<br>5. Custom Questions (if any)";
                    //Yii::app()->user->setFlash('errors','Not able to submit, You might have not filled pitch details!');
                    //Yii::app()->user->setFlash('errors',$msg);
                    $stat==$project->status;
				}

					
			}
            //die($canSubmit);
			//CVarDumper::dump($project->clientProjects->clientProfiles->users->username,10,1);die;
			if($canSubmit){
				$project->status= $stat;
                $maildata  =array();
                $maildata['email'] = $project->clientProjects->clientProfiles->users->username;
                $maildata['name'] = $project->suppliers->users->display_name;
				
				$maildata['id'] = $project->id;
				$maildata['pid'] = $project->client_projects_id;
				
				if($project->save()){

                    if($stat == 2)
                    {
                        $title="<a href='".Yii::app()->createUrl('/client/pitch',array("id"=>$project->id,"pid"=>$project->client_projects_id))."'>Proposal Submitted</a>";
                        $description =  $project->suppliers->name." has pitched for ".$project->clientProjects->name;
                        $show= true;

                        //sending mail to client informing about pitch
                        unset($maildata);
                        $maildata['id'] = $project->id;
				        $maildata['pid'] = $project->client_projects_id;
                        $maildata['email']=$project->clientProjects->clientProfiles->users->username;
                        $maildata['name']=$project->clientProjects->clientProfiles->users->display_name;
                        $maildata['project'] = $project->clientProjects->name;
                        $maildata['projects'] = $project;
                        $maildata['team'] = SupplierTeam::model()->findAllByAttributes(array('suppliers_id'=>$project->suppliers->id));
						if($this->sendMail($maildata,"project_submit")){
                            //Sending mail to supplier informing submitted pitch
                            unset($maildata);
                            $maildata['id'] = $project->id;
				            $maildata['pid'] = $project->client_projects_id;
                            $maildata['name']    = $project->suppliers->users->display_name;
                            $maildata['email']   = $project->suppliers->users->username;
                            $maildata['project'] = $project->clientProjects->name;
                            $this->sendMail($maildata,"project_submit_supplier");
                        }


                        //CVarDumper::dump($project->clientProjects->clientProfiles->users_id,10,1);die;
                        Yii::app()->user->setFlash('success','Your pitch has been sent to the client. We will notify you once it is approved or rejected.');





                        //CVarDumper::dump($project->clientProjects->clientProfiles->users_id,10,1);die;
                    }
                    else if($stat == 1)
                    {
                        $title="<a href='".Yii::app()->createUrl('/client/pitch',array("id"=>$project->id,"pid"=>$project->client_projects_id))."'>Seeking Clarification</a>";
                        //$title='Seeking Clarification';
                        $description =  $project->suppliers->name." is seeking clarification regarding ".$project->clientProjects->name;
                        $show= true;
                        $maildata['id'] = $project->id;
                        $maildata['pid'] = $project->client_projects_id;
                        $this->sendMail($maildata,"seek_clarification");
                        Yii::app()->user->setFlash('success','Project has archived');
                    }
                    else
                    {
                        if($stat == 6){
                            unset($maildata);
                            $maildata['id'] = $project->id;
				            $maildata['pid'] = $project->client_projects_id;
                            $maildata['name'] =$project->suppliers->first_name;
                            $maildata['email'] =$project->suppliers->users->username;
                            $maildata['project'] = $project->clientProjects->name;
                            $this->sendMail($maildata,"project_reject");
                        
                            //$title= $this->projectStatus[$stat]["supplier"];
                             $title="<a href='".Yii::app()->createUrl('/client/pitch',array("id"=>$project->id,"pid"=>$project->client_projects_id))."'>".$this->projectStatus[$stat]["supplier"]."</a>";
                            $description =  $this->projectStatus[$stat]["supplier"]." for project ".$project->clientProjects->name;
                            $show= false;
                            Yii::app()->user->setFlash('success','Project has been archived');
                        }
                    }
                    //CVarDumper::dump($title,10,1);die;
                   
                    $this->actionLogSave($project->clientProjects->clientProfiles->users_id,$title, $description,$show,$project->id,$project->status,0);

				}

			}
			//Flow testing 
			
		}
		
		$token = $tokenGen->createToken(array("id"=>yii::app()->user->id,"type"=>"3","name"=>$project->suppliers->first_name." ".$project->suppliers->last_name));
		$current_status = explode(',',$project->clientProjects->current_status);
		$project_status = CHtml::listData(CurrentStatus::model()->findAllByAttributes(array("id"=>$current_status)),'id','name','position');
		$setVariable= array(
			"project"=>$project,
			"token"=>$token,
			"project_status"=>$project_status
		);
		//die;
		//CVarDumper::dump($setVariable,10,1);die;
		$this->redirect(array('supplier/pitch','render'=>"full", 'projectid'=>$project->id,'stat'=>$project->status));
		//$this->render('project_rfp',$setVariable);
		
        
    
    }
	
	private function checkPitchBeforeSubmit($project){
		$return = 0;
       /* echo "<br>submit : ".$project->suppliers->is_application_submit;
        echo "<br>start : ".empty($project->start_date);
        echo "<br>min price : ".empty($project->min_price );
        echo "<br>max price : ".empty($project->max_price) ;
        echo "<br>Why Us : ".empty($project->default_q2_ans) ;
        echo   "<br>cusomt : ".$this->checkIfCustomAnswer($project) ;*/
        $errormsg ="";
        $i=1;
		if(!$project->suppliers->is_application_submit){
            $return = 1;
            $errormsg.= $i++.". Please complete & submit your profile including the Basics & FAQs."."<br>";
        }
        if(empty($project->start_date) || empty($project->min_price ) || empty($project->max_price) )
        {
            $return = 1;
            $errormsg.= $i++.". Please complete the price and timeline estimates."."<br>";
        }
        if(empty($project->default_q2_ans) ||  // checking Why Us filled or not
			$this->checkIfCustomAnswer($project) // checking if custom question has answered or not
		){

			$return = 1;
            $errormsg.= $i++.". Please complete the proposal question 'Why us'."."<br>";
		}
		if($return)
        	Yii::app()->user->setFlash('errors',$errormsg);

		return $return;

	}

    private function checkIfCustomAnswer($project)
    {
        $qCount = count($project->clientProjects->clientProjectsQuestions);
        $qIds = array();
        foreach($project->clientProjects->clientProjectsQuestions as $q){
            $qIds[]=$q->id;
        }
        $aIds  = SuppliersProjectAnswer::model()->findAllByAttributes(array("question_id"=>$qIds,"suppliers_id"=>yii::app()->user->profileId));
        $aCount = count($aIds);
        //echo $aCount." == ".$qCount;
        return ($aCount == $qCount ? false : true);
    }
	
	//Supplier Account Manuplation
	public function actionProfile()
	{
		/**** Starts Save Logic for diffrent forms ******/
		
		if(isset($_POST['Suppliers'])){
			$this->saveProfile($_POST);
		}
		
		
		$portfolio_render=false;
		if(isset($_POST["SuppliersHasPortfolio"]))
		{
			//CVarDumper::dump($_POST);
			$this->savePortfolio($_POST);
			$portfolio_render=true;
		}
		/**** /Ends Save Logic for diffrent forms ******/
		
		

		$profile				=	Suppliers::model()->findByAttributes(array("users_id"=>Yii::app()->user->id));
		$services				=	Services::model()->findAll();
		$industries				=	Industries::model()->findAll();
        $skills	                =	Skills::model()->findAll();
		$selecetedServices		=	array();
		$selecetedSkills		=	array();
		$selecetedIndustries	=	array();
		$supplierTeam1			=	new SupplierTeam;
        $priceTier              =   PriceTier::model()->findAllByAttributes(array("price_zone"=> $profile->cities->states->price_zone_id ))   ;   
		
		foreach($profile->suppliersHasServices as $ser)
			$selecetedServices[]	=	$ser->services_id;
		foreach($profile->suppliersHasIndustries as $ind)
			$selecetedIndustries[]	=	$ind->industries_id;
        
        foreach($profile->suppliersHasSkills as $skill)
			$selecetedSkills[]	=	$skill->skills_id;
	

		
		//Array of all variable needed in profile section .
		$setVariable= array(
			'profile'=>$profile,
			//'changePassword'=>$changePassword,
			//'password'=>$password,
			'skills'=>$skills,
			'supplierTeam'=>$profile->supplierTeams,
			'supplierTeam1'=>$supplierTeam1,
			'services'=>$services,
			'skills'=>$skills,
			'selecetedServices'=>$selecetedServices,
			'selecetedIndustries'=>$selecetedIndustries,
			'selecetedSkills'=>$selecetedSkills,
			'industries'=>$industries,
            'priceTier'=>$priceTier
            );
		
		//CVarDumper::dump($setVariable,10,1);die;
		if(isset($_GET["show"])){
			$formParam =  $_GET["show"];
			switch($formParam)
			{
				case "basic" :
					$this->renderPartial('basic_partial',$setVariable);
					break;
				case "portfolio" : 
					$portfolio = SuppliersHasPortfolio::model()->findAllByAttributes(array("suppliers_id" =>yii::app()->user->profileId),array('order'=>'add_date DESC'));
					$portfolioSave = new SuppliersHasPortfolio;
					$setVariable['portfolio']=$portfolio;
					$setVariable['portfolioSave']=$portfolioSave;
					$this->renderPartial('portfolio_partial',$setVariable);
					break;
				case "past" :
				
					$SupplierReferences = new SuppliersHasReferences;
					$allReferences = SuppliersHasReferences::model()->findAllByAttributes(array("suppliers_id"=>yii::app()->user->profileId));
					$setVariable['SupplierReferences']=$SupplierReferences;
					$setVariable['allReferences']=$allReferences;
					$this->renderPartial('partial_past_clients',$setVariable);
					break;
				case "pitch":
					$this->renderPartial("partial_sample_pitch",$setVariable);
					break;
				case "estimate":
					$this->renderPartial("partial_sample_estimate",$setVariable);
					break;
				default : 
					$this->renderPartial('basic_partial',$setVariable);
			}
			
		}
		else
		{
			//if($portfolio_render){
				$portfolio = SuppliersHasPortfolio::model()->findAllByAttributes(array("suppliers_id" =>yii::app()->user->profileId),array('order'=>'add_date DESC'));
				//CVarDumper::dump(json_encode($portfolio[1]->suppliersPortfolioHasSkills),10,1);
				
					$portfolioSave = new SuppliersHasPortfolio;
					$portfolioSkills = new SuppliersPortfolioHasSkills;
					$setVariable['portfolio']=$portfolio;
					$setVariable['portfolioSave']=$portfolioSave;
					$setVariable['portfolioSkills']=$portfolioSkills;

					$this->render('portfolio_partial',$setVariable);
			/*}
			else
				$this->render('basic_partial',$setVariable);*/
		}
	}
	
    public function actionPastClients()
    {
        $SupplierReferences = new SuppliersHasReferences;
        $allReferences = SuppliersHasReferences::model()->findAllByAttributes(array("suppliers_id"=>yii::app()->user->profileId));
		$setVariable['SupplierReferences']=$SupplierReferences;
		$setVariable['allReferences']=$allReferences;
		$this->render('partial_past_clients',$setVariable);
    }
    private function saveProfile($data){
        //CVarDumper::dump($_POST,10,1);die;

			$profile =	Suppliers::model()->findByAttributes(array("users_id"=>Yii::app()->user->id));
			$profile->attributes			=	$data['Suppliers'];
			$profile->is_profile_complete	=	1;// profile completed
			//$profile->status				=	1;// profile completed

			if(isset($data["Suppliers"]["accept_new_project_date"]))
			{
				$profile->accept_new_project_date= date('Y-m-d', strtotime($data["Suppliers"]["accept_new_project_date"]));
			}
			//CVarDumper::dump($profile->accept_new_project_date,10,1);
			if($profile->save()){

				/******* saving Supplier industries ********/
				SuppliersHasIndustries::model()->deleteAll('suppliers_id = ?' , array(yii::app()->user->profileId));
				if(isset($data['Industries']))
					foreach($data['Industries'] as $indus){
					$indusList						=	new SuppliersHasIndustries;
					$indusList->industries_id		=	$indus;
					$indusList->suppliers_id		=	yii::app()->user->profileId;
					$indusList->add_date			=	date('Y-m-d H:i:s');
					$indusList->status				=	1;
					$indusList->save();
				}
				/* project industry end here*/

				/******saving skills***********/
                SuppliersHasSkills::model()->deleteAll('suppliers_id = ?' , array(yii::app()->user->profileId));
				if(isset($data["SuppliersHasSkills"])){
						foreach($data["SuppliersHasSkills"]["skills_id"] as $skill)
						{
                            //$skill = Skills::model()->findByAttributes(array("name"=>$record));
							     $skills = new SuppliersHasSkills;
                                 $skills->skills_id=  $skill;
							     $skills->suppliers_id = yii::app()->user->profileId;
							     $skills->status =1;
							     $skills->add_date = date('Y-m-d H:i:s');
							     $skills->save();


						}
					}

				/******saving services*********/
				$seleServ= SuppliersHasServices::model()->findAllByAttributes(array('suppliers_id'=>yii::app()->user->profileId,"status"=>0));
				$status0 = CHtml::listData($seleServ,'services_id','status');
				//CVarDumper::dump($seleServ,10,1);die;
				//CVarDumper::dump($status0,10,1);die;
				SuppliersHasServices::model()->deleteAll('suppliers_id  = ?' , array(yii::app()->user->profileId));
					if(isset($data['Services']))
						foreach($data['Services'] as $indus){

							$serviceList					=	new SuppliersHasServices;
							$serviceList->services_id		=	$indus;
							$serviceList->suppliers_id 		=	yii::app()->user->profileId;
							$serviceList->add_date			=	date('Y-m-d H:i:s');
							if(isset($status0[$indus]))
								$serviceList->status		=	0;
							else
								$serviceList->status		=	1;
							$serviceList->save();
					}


					$this->actionLogSave(Yii::app()->user->id,'Edit Profile','Awesome! Your Profile has been submitted for Approval. You should be good to go soon',0);
				Yii::app()->user->setFlash('success','Profile Saved!');
                    //Sending profile complete mail
                $data=array();
                $data['name']	 =	$profile->first_name;
                $data['email']	 =	$profile->users->username;
                    //$this->sendMail($data,'complete_profile');
					Yii::app()->user->setFlash('success','Your profile details have been saved.');
			}
			else
			{
				Yii::app()->user->setFlash('errors','Profile details not updated!');
			}

    }
	// Saving portfolio details 
	private function savePortfolio($data)
	{
		//CVarDumper::dump($data,10,1);die;
		$response = array('iserror'=>false,"errors"=>array(),"success"=>array());
		if(isset($_POST["SuppliersHasPortfolio"]["id"]) && !empty($_POST["SuppliersHasPortfolio"]["id"])){
			$portfolioSave =SuppliersHasPortfolio::model()->findByPk($_POST["SuppliersHasPortfolio"]["id"]);
			Yii::app()->user->setFlash('success','Project updated!');
		}
		else{
			$portfolioSave = new SuppliersHasPortfolio;
			Yii::app()->user->setFlash('success','Portfolio added!');
		}
		   	
		$portfolioSave->attributes = $_POST["SuppliersHasPortfolio"]; 
		$portfolioSave->suppliers_id= yii::app()->user->profileId;  
		$portfolioSave->add_date=  date('Y-m-d H:i:s');
		if(empty($_POST["SuppliersHasPortfolio"]["cover"])){
			$portfolioSave->cover=  "https://www.filepicker.io/api/file/5AfKdWvKS6nOZSD2TeC8";
			//$portfolioSave->cover=  "https://www.filepicker.io/api/file/XsgBB8ZSqmjRftjlnb8w";
			//$portfolioSave->cover=  "default_portfolio.jpg";
		}
		
		if($portfolioSave->save())
		{
			
			//Saving portfolio skills 
			if(isset($_POST["SuppliersHasSkills"]['skills_id'])){
				SuppliersPortfolioHasSkills::model()->deleteAll('portfolio_id = ?' , array($portfolioSave->id));
				foreach($_POST["SuppliersHasSkills"]['skills_id'] as $key=>$record){
                    $portfolioSkills = new SuppliersPortfolioHasSkills;
					$skill = Skills::model()->findByAttributes(array("name"=>$record));
                    if(!empty($skill)){
                        $portfolioSkills->skills_id= $skill->id;
                    }else
                    {
                        $portfolioSkills->skills_id= $record;
                    }
					$portfolioSkills->portfolio_id= $portfolioSave->id;
					$portfolioSkills->status= 1;
					$portfolioSkills->add_date= date('Y-m-d H:i:s');
					$portfolioSkills->save();
					//CVarDumper::dump($portfolioSkills,10,1);die;
				}
				//Yii::app()->user->setFlash('success','Portfolio saved!');
			}else{
                SuppliersPortfolioHasSkills::model()->deleteAll('portfolio_id = ?' , array($portfolioSave->id));
            }

			$response["iserror"]= false;
			$success =array("msg"=>"Project Saved !!");
			array_push($response["success"],$success);
		}
		else{
			$response["iserror"]= true;
			$errors = array("msg"=>"Server Error!!");
			array_push($response["errors"],$errors);
			//Yii::app()->user->setFlash('error','Portfolio saved!');
			//CVarDumper::dump($portfolioSave,10,1);die;
		}
		
		// uncomment if request would be ajax
		//echo json_encode($response);
		//die;
	}
	
	public function ActionAccount()
	{	
		$password	=	0;
		$profile	=	Suppliers::model()->findByAttributes(array("users_id"=>Yii::app()->user->id));
		//$fileName	=	$profile->logo;
		if(isset($_POST['Suppliers'])){
			
			$profile->attributes	=	$_POST['Suppliers'];
            if(isset($_POST['cities_id']))
			     $profile->cities_id	=	$_POST['cities_id'];
			//CVarDumper::dump($_POST,10,1);die;
			//$profile->logo	=	empty($fileName)?"":$fileName;
			if($profile->save()){
			
				$this->actionLogSave(Yii::app()->user->id,'Edit Profile','Profile details updated successfully',0);
				Yii::app()->user->setFlash('success','Profile details updated successfully');
			}
			else
			{
				Yii::app()->user->setFlash('error','Profile details not Updated');
			}
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
					$this->actionLogSave(Yii::app()->user->id,'Password Changed','Your account password has been changed successfully',1);
						Yii::app()->user->setFlash('pass_success','Your password has been reset.');
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
	
	//Create a new account for refered 
	private function createNewClient($data)
	{
		$email = $data["client_email"];
		$users	=	Users::model()->findByAttributes(array('username'=>$email));
		
		if(empty($users)){
			//echo " user not found";
			$users					=	new Users;
			$users->username		=	$email;
			//$password				=	time();
			$password				=	123456;
			$users->password		=	$password;
			$users->status			=	1;
			$users->role_id			=	2;
			$users->display_name	=	$data['client_first_name'];
			$users->add_date		=	date('Y-m-d H:i:s');
			if($users->save())
			{
				//echo "user added ".$users->id;
								
				$profile	                =	new ClientProfiles;
				$profile->first_name	    =	$data['client_first_name'];
				$profile->last_name			=	$data['client_last_name'];
				$profile->company_name		=	$data['company_name'];
				$profile->email				=	$email;
				$profile->users_id		    =	$users->id;
				$profile->cities_id		    =	134717; //default for new york
				//$profile->time_zone_id	    =	1;
				$profile->status			=	1;
				$profile->add_date		    =	date('Y-m-d H:i:s');
				$profile->save();
				
				return $profile->id;			
			}
			else
			{
				return false;
			}
						
		}
		if($users->role_id == 2){
			$profileId = ClientProfiles::model()->findByAttributes(array('users_id'=>$users->id));
			return empty($profileId)?false:$profileId->id;
		}
		else 
		{
			return false;
		}
		
		
	}
	
	// FAQs implementations
	public function ActionFaq($show=null)
	{
		
		if(isset($_POST["SuppliersFaqAnswers"])){
			
            //CVarDumper::dump($_POST,10,1);die;;
			$response = array('iserror'=>false,"errors"=>array(),"success"=>array());
			foreach($_POST["SuppliersFaqAnswers"] as $key=>$ans )
			{
                //if(!empty($ans)){
                    $faq_ans = SuppliersFaqAnswers::model()->findByAttributes(array("faq_id"=>$key,'suppliers_id'=>yii::app()->user->profileId));
                    if(empty($faq_ans))
                        $faq_ans = new SuppliersFaqAnswers;
                    $faq_ans->faq_id = $key;
                    $faq_ans->suppliers_id = yii::app()->user->profileId;
                    $faq_ans->answers = $ans;
                    $faq_ans->status = 1;
                    $faq_ans->publish = 1;
                    if($faq_ans->save()){
                        $sup = Suppliers::model()->findByAttributes(array("id"=>Yii::app()->user->profileId));
                        $sup->is_faq_complete = 1;
                        $sup->save();

                    }
                //}
					
			}
			$response["iserror"]= false;
			$success =array("msg"=>"FAQs Saved.");
			array_push($response["success"],$success);
            if($_POST["action"]=='ajax'){
                $profile = Suppliers::model()->findByPk(yii::app()->user->profileId);
                if($profile->status == 0){
                    $profile->status = 1;
                }
                $profile->is_application_submit = 1;
                if(!$profile->save())
                {
                    $response["iserror"]= true;
                    $success =array("msg"=>"FAQs Saved with some errors.");
			         array_push($response["success"],$success);
                }
              echo json_encode($response);
              die;
            }
		}
		
		if(empty($show))
		{
			$show='about';
		}
		//$faq = Faq::model()->findAllByAttributes(array('type'=>$show));
        // On requirement change
		$faq = Faq::model()->findAll();
		$profile = Suppliers::model()->findByPk(yii::app()->user->profileId);

		$list	=	array();
		foreach($faq as $question)
			$list[$question->type][$question->id]=$question->question;
		$answers	=	SuppliersFaqAnswers::model()->findAllByAttributes(array('suppliers_id'=>yii::app()->user->profileId));
		$ansList	=	array();
		foreach($answers as $answer)
			$ansList[$answer->faq_id]=$answer->answers;
		//CVarDumper::Dump($faq,10,1);die;
		
		if(isset($_POST['action']) && $_POST['action']=='noajax')
        {
            Yii::app()->user->setFlash('success',"FAQs Saved");
            $this->render("faq",array('faq'=>$faq,'ansList'=>$ansList,'profile'=>$profile));

        }else
        {
		  $this->renderPartial("faq",array('faq'=>$faq,'ansList'=>$ansList,'profile'=>$profile));
        }
	}
	
	//List of Ajax Methods to save and retrive data
	
	//Render partial for portfolio 
	public function ActionAjaxGetPortfolio()
	{
		
		if(isset($_POST["portofolioId"]))
		{
            if($_POST["portofolioId"]==0)
                $portfolio = new SuppliersHasPortfolio;
            else
                $portfolio = SuppliersHasPortfolio::model()->findByAttributes(array("id"=>$_POST["portofolioId"],"suppliers_id" =>yii::app()->user->profileId));
			$selecetedSkills = array();
			foreach($portfolio->suppliersPortfolioHasSkills as $skill)
				$selecetedSkills[]	=	$skill->skills_id;
			
			$services				=	Services::model()->findAll();
			$skills	                =	Skills::model()->findAll();
			$setVariable = array(
				'portfolio'=>$portfolio,
				'selecetedSkills'=>$selecetedSkills,
				'services'=>$services,
				'skills'=>$skills
			
			);
			
			//CVarDumper::dump($setVariable,10,1);die;
			$this->renderPartial('_portfolio_view',$setVariable);
		}else
		{
			echo "server error";
			
		}
	}
	
	private function ajaxSavePitchDoc($data)
	{
		$response = array('iserror'=>false,"errors"=>array(),"success"=>array());
		if(isset($data['path']) && isset($data['action']))
		{
			switch($_POST['action']){
					case "savedoc" :
						$doc= new SupplierDocuments;
						$doc->path = $data["path"];
						$doc->name = $data["name"];
						$doc->size = $data["size"];
						$doc->extension = $data["extension"];
						$doc->type = $data["extension"];
						$doc->suppliers_propsal_id = $data["pid"];
						//$doc->add_date= date("d-m-y")
						
						if($doc->save())
						{	
							$response["iserror"]= false;
							$success =array("msg"=>"Saved Succesfully!!","lastInsertedId"=>$doc->id);
							array_push($response["success"],$success);
						}
						else
						{
							
							$response["iserror"]= true;
							$errors = array("msg"=>"Server Error!!");
							array_push($response["errors"],$errors);
						}
						break;
					
					case "removedoc" : 
						if(!empty($_POST["pid"])){
							$doc= SupplierDocuments::model()->findByPk($_POST["pid"]);
							//CVarDumper::dumper($doc,10,1);die;
							if($doc->delete()){
								$response["iserror"]= false;
							$success =array("msg"=>"Deleted Succesfully");
							array_push($response["success"],$success);
							}else
							{
							$response["iserror"]= true;
							$errors = array("msg"=>"Server Error: Not able to delete. Please Try Again");
							array_push($response["errors"],$errors);
							}
						}
						else
						{
							$response["iserror"]= true;
							$errors = array("msg"=>"Server Error!!");
							array_push($response["errors"],$errors);
							
						}
						
					break;
					default:
						$response["iserror"]= true;
						$errors = array("msg"=>"Unauthorized Access");
						array_push($response["errors"],$errors);
				}
		}// end checking variable
		else{
			$response["iserror"]= true;
			$errors = array("msg"=>"Bad Request. Server Error");
			array_push($response["errors"],$errors);
		}
		echo json_encode($response);
		die;
	}
	public function ActionAjaxProfile(){
		
		if(isset($_POST))
		{
			$response = array('iserror'=>false,"errors"=>array(),"success"=>array());
			if(isset($_POST['memberid']) && isset($_POST['action']))
			{
				
				switch($_POST["action"])
				{
					case "remove" :
						$data= SupplierTeam::model()->findByAttributes(array('id'=>$_POST["memberid"],'suppliers_id'=>Yii::app()->user->profileId));
					if($data->delete())
					{
						$response["iserror"]= false;
						$success =array("msg"=>"Deleted Succesfully");
						array_push($response["success"],$success);
					}
					else
					{
						$response["iserror"]= true;
						$errors = array("msg"=>"Server Error");
						array_push($response["errors"],$errors);
					}
						break;
					case "add" :
					
						$supplierTeam = new SupplierTeam;
						$supplierTeam->suppliers_id = yii::app()->user->profileId;
						$supplierTeam->first_name = $_POST["first_name"];
						$supplierTeam->experiance = $_POST["experiance"];
						if($supplierTeam->save())
						{
							$response["iserror"]= false;
							$success =array("msg"=>"Team Member Added",
											"lastInsertedId"=>$supplierTeam->id
																 );
 							array_push($response["success"],$success);
							
						}
						else
						{
							$response["iserror"]= true;
							$errors = array("msg"=>"Server Error");
							array_push($response["errors"],$errors);
						}
					
						break;
                    case "addprojectteam" :
					   
						$supplierTeam = new SuppliersProjectTeam;
						$supplierTeam->project_proposal_id = $_POST["pid"];
						$supplierTeam->name = $_POST["name"];
						$supplierTeam->description = $_POST["description"];
						$supplierTeam->image = $_POST["memberimage"];
						$supplierTeam->created = date("Y-m-d H:s");
						$supplierTeam->modified = date("Y-m-d H:s");
						if($supplierTeam->save())
						{
							$response["iserror"]= false;
							$success =array("msg"=>"Team Member Added",
											"lastInsertedId"=>$supplierTeam->id
																 );
 							array_push($response["success"],$success);
							
						}
						else
						{
							$response["iserror"]= true;
							$errors = array("msg"=>"Server Error".CVarDumper::dump($supplierTeam,10,1));
							array_push($response["errors"],$errors);
						}
					
						break;
					case "removeprojectteam" :
						$data= SuppliersProjectTeam::model()->findByAttributes(array('id'=>$_POST["memberid"]));
					if($data->delete())
					{
						$response["iserror"]= false;
						$success =array("msg"=>"Deleted Succesfully");
						array_push($response["success"],$success);
					}
					else
					{
						$response["iserror"]= true;
						$errors = array("msg"=>"Server Error");
						array_push($response["errors"],$errors);
					}
						break;
					default :
							$response["iserror"]= true;
							$errors = array("msg"=>"Un-Authorize Access!!");
							array_push($response["errors"],$errors);
				}
			}
			
		}else
		{
			$response["iserror"]= true;
			array_push($response["errors"],"Server Error");
		}
		echo json_encode($response);
		die;
	}
	public function ActionAjaxPortfolio(){

		if(isset($_POST))
		{
			$response = array('iserror'=>false,"errors"=>array(),"success"=>array());
			if(isset($_POST['action']))
			{
				switch($_POST['action']){
					case "remove" :
							$data1= SuppliersPortfolioHasSkills::model()->findByAttributes(array('portfolio_id'=>$_POST["portfolioId"]));
						if(!empty($data1))
							$data1->delete();
						
							$data= SuppliersHasPortfolio::model()->findByAttributes(array('id'=>$_POST["portfolioId"],'suppliers_id'=>Yii::app()->user->profileId));
							if($data->delete()){
								$response["iserror"]= false;
								$success =array("msg"=>"Deleted Succesfully");
								array_push($response["success"],$success);
							}else
							{
								$response["iserror"]= true;
								$errors = array("msg"=>"Error. PLease Try Again");
								array_push($response["errors"],$errors);
							}
						
						break;
					
					case "add" :

					if(isset($_POST["SuppliersHasPortfolio"]["id"]) && !empty($_POST["SuppliersHasPortfolio"]["id"])){
						$portfolioSave =SuppliersHasPortfolio::model()->findByPk($_POST["SuppliersHasPortfolio"]["id"]);
					}
					else{
						$portfolioSave = new SuppliersHasPortfolio;
					}

					$portfolioSave->attributes = $_POST["SuppliersHasPortfolio"];
					$portfolioSave->suppliers_id= yii::app()->user->profileId;
					$portfolioSave->add_date=  date('Y-m-d H:i:s');
					if(empty($_POST["SuppliersHasPortfolio"]["cover"])){
						$portfolioSave->cover=  "https://www.filepicker.io/api/file/XsgBB8ZSqmjRftjlnb8w";
						//$portfolioSave->cover=  "default_portfolio.jpg";
					}

					if($portfolioSave->save())
					{

						//Saving portfolio skills
						if(isset($_POST["SuppliersHasSkills"]['skills_id'])){
							SuppliersPortfolioHasSkills::model()->deleteAll('portfolio_id = ?' , array($portfolioSave->id));
							foreach($_POST["SuppliersHasSkills"]['skills_id'] as $key=>$record){
								$portfolioSkills = new SuppliersPortfolioHasSkills;

								$portfolioSkills->portfolio_id= $portfolioSave->id;
								$portfolioSkills->skills_id= $record;
								$portfolioSkills->status= 1;
								$portfolioSkills->add_date= date('Y-m-d H:i:s');
								$portfolioSkills->save();
								//CVarDumper::dump($portfolioSkills,10,1);die;
							}
							//Yii::app()->user->setFlash('success','Portfolio saved!');
						}

						$response["iserror"]= false;
						$success =array("msg"=>"Project Saved");
						array_push($response["success"],$success);
					}else{
						$response["iserror"]= true;
						$errors = array("msg"=>"Server Error");
						array_push($response["errors"],$errors);
						//Yii::app()->user->setFlash('error','Portfolio saved!');
						//CVarDumper::dump($portfolioSave,10,1);die;
					}
						
					break;
					default:
						$response["iserror"]= true;
						$errors = array("msg"=>"Unauthorized Access");
						array_push($response["errors"],$errors);
				}
			}// end checking variable
		}// end checking post request
		else
		{
			$response["iserror"]= true;
			array_push($response["errors"],"Server Error");
		}
		echo json_encode($response);
		die;
	}
	public function ActionAjaxSaveReferences()
	{
		if(isset($_POST))
		{
			$response = array('iserror'=>false,"errors"=>array(),"success"=>array());
			$action ="";
			if(isset($_POST["action"])){$action= $_POST["action"];}else{ $action= "add";};
			if(!empty($action))
			{
				
				switch($action){
					case "add" :
							$suppliersHasReferences= SuppliersHasReferences::model()->findByAttributes(array("client_email"=>$_POST["SuppliersHasReferences"]["client_email"],"suppliers_id"=>Yii::app()->user->profileId)) ;
					//CVarDumper::dump($suppliersHasReferences,10,1);
							if(!empty($suppliersHasReferences)){
								$response["iserror"]= true;
								$errors = array("msg"=>"Client already added. Add a different client.");
								array_push($response["errors"],$errors);
							}
							else	
							{
                                unset($suppliersHasReferences);
								$suppliersHasReferences= new SuppliersHasReferences ;
								$suppliersHasReferences->attributes = $_POST['SuppliersHasReferences'];
							    $suppliersHasReferences->suppliers_id = Yii::app()->user->profileId;
							    $suppliersHasReferences->project_name = $_POST["SuppliersHasReferences"]["company_name"];
							    $suppliersHasReferences->company_name = $_POST["SuppliersHasReferences"]["company_name"];
							// Creating new client
							//echo "creating users";
							$client_id=$this->createNewClient($_POST['SuppliersHasReferences']);
							if($client_id){
								
								$suppliersHasReferences->client_id= $client_id; 
								
								//CVarDumper::dump($suppliersHasReferences,10,1);die;
								if($suppliersHasReferences->save())
								{
									//
									//Send reference a mail 
		
									$maildata = $_POST['SuppliersHasReferences'];
									$supplier = Suppliers::model()->findByAttributes(array("id"=>yii::app()->user->profileId));
                                    $newClient = ClientProfiles::model()->findByPk($client_id);
									$maildata["supplier_id"]= $supplier->users_id ;
									$maildata['company_name'] = $supplier->name;
									$maildata['first_name'] = $supplier->first_name ;
									$maildata['last_name'] = $supplier->last_name ;
									$maildata['email'] = $suppliersHasReferences->client_email ;
									$maildata['id'] = $suppliersHasReferences->id ;
                                    $maildata['client_id'] = $client_id ;
                                    $maildata['client_userName'] = $newClient->users->username ;
                                    $maildata['client_password'] = $newClient->users->password ;
											 
									$response["iserror"]= false;
									
									//CVarDumper::dump($maildata,10,1);die;
                                    $this->sendMail($maildata,"reference");
									if(true)
									{
										$success =array("msg"=>"Recommendation Request Sent","lastInsertedId"=>$suppliersHasReferences->id);
									}	
									else
									{
										$success =array("msg"=>"Saved Succesfully,but not able to send a mail to client.","lastInsertedId"=>$suppliersHasReferences->id);
									}
									array_push($response["success"],$success);
								}
								else{
									//CVarDumper::dump($suppliersHasReferences,10,1);die;
									$response["iserror"]= true;
									$listerror = array();
									foreach($suppliersHasReferences->errors as $key=>$er)
									{
										array_push($listerror,$er);
									}
									$errors = array("msg"=>$listerror);
									array_push($response["errors"],$errors);
								}
							}
							else{
								
								$response["iserror"]= true;
								$errors = array("msg"=>"This email id is already in use.");
								array_push($response["errors"],$errors);
							}
							}
							
						break;
					
					case "remove" : 
					
						$data= SuppliersHasReferences::model()->findByAttributes(array('id'=>$_POST["referenceId"],'suppliers_id'=>Yii::app()->user->profileId));
					
						if($data->delete()){
								$response["iserror"]= false;
								$success =array("msg"=>"Deleted Succesfully");
								array_push($response["success"],$success);
						}else{
							
							$response["iserror"]= true;
							$errors = array("msg"=>"Error. Please Try Again,");
							array_push($response["errors"],$errors);
						}
					break;
					case "follow" : 
						$refId = $_POST['referenceId'];
						$supplierHasRef = SuppliersHasReferences::model()->findByAttributes(array("id"=>$refId));
						$maildata = $supplierHasRef->attributes;
						$maildata["supplier_id"]	= $supplierHasRef->suppliers_id ;
						$maildata['company_name'] 	= $supplierHasRef->suppliers->name;
						$maildata['first_name'] 	= $supplierHasRef->suppliers->first_name ;
						$maildata['last_name'] 		= $supplierHasRef->suppliers->last_name ;
						$maildata['email']			= $supplierHasRef->client_email ;
						$maildata['client_id'] 		= $supplierHasRef->client_id ;
						
						if($this->sendMail($maildata,"followup"))
						{
							$response["iserror"]= false;
							$success =array("msg"=>"Sent a reminder to ".$supplierHasRef->client_email);
							array_push($response["success"],$success);
						}	
						else
						{
							$response["iserror"]= true;
							$errors =array("msg"=>"Unable to send a reminder to ".$supplierHasRef->client_email);
							array_push($response["errors"],$errors);
						}
						
					break;
					default:
						$response["iserror"]= true;
						$errors = array("msg"=>"Unauthorize Access");
						array_push($response["errors"],$errors);
				}
			}// end checking variable
			else{
				$response["iserror"]= true;
			array_push($response["errors"],"Bad Request");
			}
		}// end checking post request
		else
		{
			$response["iserror"]= true;
			array_push($response["errors"],"Server Error");
		}
		$res["res"]= $response;
		echo json_encode($res);
		die;
		
	}
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function actionLogSave($for,$title,$description,$notification,$proposalId=null,$projectStatus=0,$is_checked=0){




        if(!empty($proposalId))
        {
            Log::model()->updateAll(array('is_active'=>0),'proposal_id="'.$proposalId.'"');
        }
		$log				=	new Log;
		$log->login_id		=	Yii::app()->user->id;
		$log->title			=	$title;
		$log->for_user		=	$for;
		$log->description	=	$description;
		//$log->notification	=	$notification ;
		$log->notification	=	$notification == true ? 1 :0 ;
		$log->is_read		=	0;
		$log->add_date		=	date('Y-m-d H:i:s');
		$log->status		=	1;
		$log->project_status=	$projectStatus;
		$log->proposal_id 	=	$proposalId;
		$log->is_checked 	=	$is_checked;
		$log->is_active	    =	1;
		if($log->save()){
            //echo "saved";
        }
        else{

            throw new CHttpException(500,'Something went wrong .');
            CVarDumper::dump($log,10,1);
        }

	}

    public function actionView()
	{

		parent::getLocationByIp("115.249.130.53");
		die;
        /*$data['name']	 =	"Pratham";
        $data['email']	 =	"pratham@venturepact.com";
        echo $this->sendMail($data,'complete_profile');*/

	}
	public function sendMail($data,$type)
	{
		$templete 	=	 	'';	
		switch($type){
			
			case 'followup' :
				$templete	=	'followup';		
				$link = $data['client_email'].",".$data['client_id'].",".$data['supplier_id'].",".$data["id"] ;
				$subject = 'Reminder -'.$data["company_name"].' is requesting a Recommendation';
				$body = $this->renderPartial('/mails/supplier_reference_followup_tpl',
										array(	'data' => $data,
                                                'link'=>base64_encode($link)),
											 true
											);
			break;
			case 'reference' :
				$templete	=	'reference';
				$link = $data['client_email'].",".$data['client_id'].",".$data['supplier_id'].",".$data["id"] ;
				$subject = 'VenturePact: '.$data["company_name"].' is requesting a Recommendation';
				$body = $this->renderPartial('/mails/supplier_reference_tpl',
										array(	'data' => $data,
                                                'link'=>base64_encode($link)),
											 true
											);
												
			break;
            case "project_reject" :
				$templete	=	'project_reject';
                $subject = 'Project Archived';
                $body = $this->renderPartial('/mails/supplier_proj_reject_tpl',
										array(	'data' => $data),
											 true
											);
                        
            break;
            case "project_submit" :
            //CVarDumper::dump($data,10,1);die;
				$templete	=	'project_submit';
                $subject = 'VenturePact: You Have Received a Proposal';
				$body = $this->renderPartial('/mails/supplier_project_submit_tpl',
										array(	'data' => $data),
											 true
											);
                // echo $body;
                // exit;                           
            break;
            case "project_submit_supplier" :
             	$templete	=	'project_submit_supplier';   
				$subject = 'You Proposal Has Been Submitted';
				$body = $this->renderPartial('/mails/supplier_project_submit_to_supplier_tpl',
										array('data' => $data),
											 true
											);
            break;
            case "seek_clarification" :
				$templete	=	'seek_clarification';              	 
			    $subject = 'VenturePact: Need Clarification About Your Requirements';
				$body = $this->renderPartial('/mails/seek_clarification_tpl',
										array('data' => $data),
											 true
											);
            break; 
            case "complete_profile" :
				$templete	=	'complete_profile';			
                $subject = 'VenturePact: Complete Your Profile ';
				$body = $this->renderPartial('/mails/complete_profile_tpl',
										array(	'data' => $data),
											 true
											);
            break;
            
            case "send_invoice" :
				$templete	=	'send_invoice';			
                $subject = 'VenturePact: Invoice ';
                       
				$body = $this->renderPartial('/mails/send_invoice',
										array(	'data' => $data),
											 true
											);
                $email = "";                            
               
                $to_email = $data[1]['client_email'];                       
            break;
            
            case "send_reminder" :
				$templete	=	'send_reminder';			
                $subject = 'VenturePact: Reminder ';
                       
				$body = $this->renderPartial('/mails/send_reminder',
										array(	'data' => $data),
											 true
											);
                $email = "";                            
               
                $to_email = $data[1]['client_email']; 
              
              break;  
             case "send_release" :
				$templete	=	'send_release';			
                $subject = 'VenturePact: Release Funds';
                       
				$body = $this->renderPartial('/mails/send_release',
										array(	'data' => $data),
											 true
											);
                $email = "";                            
               
                $to_email = $data[1]['client_email'];                              
            break;
            
			
			default:
			break;			
		}

        $fromname   = "VenturePact Team";
		$from		= Yii::app()->params['adminEmail'];
        
        if(isset($data['email']))
        {
            $to			= $data['email'];    
        }else{
            $to         = "";
        }
        
        if(isset($email))
        {
            $user   =    Users::model()->findByAttributes(array('id'=>Yii::app()->user->id));
            $from   =    $user->username;
            $to     =    $to_email;
        }
        
        //$to = "sandeep.verma@venturepact.com";
        
		/*$mail		=	Yii::app()->Smtpmail;
        $mail->SetFrom($from,'Venturepact');
        $mail->Subject	=	$subject;
        $mail->MsgHTML($body);
        $mail->AddAddress($to, "");	
		
        if(!$mail->Send()) {
            return 0;
        }else {
			return 1;
        }
		*/
		require_once("sendgrid-php/sendgrid-php.php");
        $options = array("turn_off_ssl_verification" => true);
        $sendgrid = new SendGrid('riteshtandon231981', 'venturepact1', $options);
        $mail = new SendGrid\Email();
        $mail->addTo($to)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
        if($sendgrid->send($mail)) {
			if(parent::mailLog($subject,$to,$templete,$body))
				return 1;
        }else {
            return 0;
        }
		
		
	}


    public function actionPayments()
	{
	   $milestoneStatus = parent::milestoneStatusarray();
       $supplier_project_proposal_id = 467;
       
       $milestones = SupplierHasMilestones::model()->FindAllByAttributes(array("supplier_project_proposal_id"=>$supplier_project_proposal_id));
        
       
	   if(Yii::app()->request->isAjaxRequest)
       {
             
             if($_POST['hidden_milestone_id'] > 0)
             {
               $model  = SupplierHasMilestones::model()->findByPK($_POST['hidden_milestone_id']);
             }
             else
             {
               $model = new SupplierHasMilestones;
             }
    
             
             $model->module     = $_POST['module'];
             $model->start_date = date("Y-m-d",strtotime($_POST['start_date']));
             $model->end_date   = date("Y-m-d",strtotime($_POST['end_date']));
             $model->amount     = $_POST['amount'];
             
             $model->supplier_project_proposal_id = $supplier_project_proposal_id;
             $model->date   = date("Y-m-d H:m:s");
             $model->status = 0;
             $model->transaction = "abc";
             $model->note = "def";
             
             if($model->save())
             {
                echo $model->id;
                
             }else{
                echo "0";
             }
             exit;
      
       }
	   $this->render('payments',array("milestones"=>$milestones,"milestonesStatus"=>$milestoneStatus));
	}
    
    public function actionDeletemilestone()
    {
        $id = $_POST['id'];
        $model  = SupplierHasMilestones::model()->findByPK($id);
        if($model->delete())
        {
            echo "1";    
        }else{
            echo "0";
        }
        exit;
    }
    
    public function actionFundingrequestsendstatus()
    {
        if($_POST['id'] > 0)
        {
            $model  = SupplierHasMilestones::model()->findByPK($_POST['id']);
            $model->status = 1;
            if($model->save())
            {
                
               $data = parent::fetch_data_for_email($model->supplier_project_proposal_id);
               $data = array($model,$data);
               $this->sendMail($data,"send_invoice");
               parent::actionMilestonesstatus($_POST['id'],0,1,"test");                
            }else{
                echo "0";
            }
        }
    }
    
    public function actionReminder()
    {
         $model  = SupplierHasMilestones::model()->findByPK($_POST['id']);
         $data = parent::fetch_data_for_email($model->supplier_project_proposal_id);
         $data = array($model,$data);
         $this->sendMail($data,"send_reminder");
    }
    
    public function actionRelease()
    {
         
        if($_POST['id'] > 0)
        {
            $model  = SupplierHasMilestones::model()->findByPK($_POST['id']);
            $model->status = 3;
            if($model->save())
            {
               $data = parent::fetch_data_for_email($model->supplier_project_proposal_id);
               $data = array($model,$data);
               $this->sendMail($data,"send_release");
               parent::actionMilestonesstatus($_POST['id'],2,3,"test");                
            }else{
                echo "0";
            }
        }
         
    }
    
 
    
    
    
    
    
}
