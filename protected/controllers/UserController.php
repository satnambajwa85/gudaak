<?php
class UserController extends Controller
{
	public function filters(){
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
	public function accessRules() {
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('autoComplete'),
				'users' => array('*')					
				),
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','editProfile','test','tests','detailedReport','collage','userStreamRaitng','liveChat','articlesList','articles','summary','newsUpdates','exploreColleges','shortListedColleges','dynamicCourse','dynamicSearchResult','userShortlistCollage','userShortlistTest','userShortlistTestRemove','search','changePassword','application','questionsAnswer','upload','testMail','userProfileUpdate','retakeTest','news','readEvent','summaryDetails','summaryData','talkData','talk','feedbackAnswer','data','testDetails','autoComplete'),
				'users' => array('@')					
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('index','streamPreference','userStreamRaitng','userPrefferdCareer','subjectsDetails','streamExplore','userPreffredStream','streamCareerOptions','finalizedStream','streamList','stream','readFullStream','removeFinalStream','careerInfo'),
					'users' => array('@')
					//'expression' =>"Yii::app()->user->userType ==  'below10th'",
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('index','career','careerList','careerOptionsAjax', 'removeFinalCareer','careerDetails','userRaitng','finalizedCareer','addCareer','careerPreference','userFinalCareer','readFull','explore','userPrefferdCareer',),
					'users' => array('@')
					//'expression' =>"Yii::app()->user->userType ==  'student'",
				),
				array('deny','actions'=>array(),
					'users'=>array('*')
				)
			 	
			);
		}
	 
	
	//Default Layout will be dashboard for this controler
	public $layout='//layouts/dashboard';
	/**
	 * Declares class-based actions.
	 */
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
	public function beforeAction($action) 
	{
		if(!isset(Yii::app()->user->profileId)){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$data		=	SiteSetting::model()->findByAttributes(array('status'=>1,'published'=>1));
		Yii::app()->session['setting']	=	array('site_meta'=>$data->site_meta,
										'email'=>$data->email,
										'title'=>$data->title,
										'web_site'=>$data->web_site,
										'mobile'=>$data->mobile_no,
										'fax'=>$data->fax,
										'fb_link'=>$data->fb_link,
										'twittwe_link'=>$data->twittwe_link,
										'linkedin_link'=>$data->linkedin_link,
										'logo'=>$data->logo,
											);
		return true;
	}
	
	public function actionData(){
		$criteria = new CDbCriteria;  
		$criteria->addCondition('id <= 150');		
		$list	=	Course::model()->findAll($criteria);
		foreach($list as $dt){
			$spec	=	Specialization::model()->findByAttributes(array('title'=>$dt->interests));
			if(empty($spec)){
				$spec	=	new Specialization;
				$spec->title	=	$dt->interests;
				$spec->description	=	'Added by script into database';
				$spec->add_date	=	date('Y-m-d');
				$spec->status	=	1;
				$spec->save();
			}
			
			$courses	=	Courses::model()->findByAttributes(array('title'=>$dt->title));
			if(empty($courses)){
				$courses					=	new Courses;
				$courses->title				=	$dt->title;
				$courses->description		=	$dt->description;
				//$courses->specialization_id	=	$spec->id;
				$courses->save();
			
				
			}
			
					$courses	=	$dt->admission_criteria;
					$courses	=	$dt->entrance_exam;
					$courses	=	$dt->course_mode;
					$courses	=	$dt->fees;
					$courses	=	$dt->seats;
					$courses	=	$dt->collage_id;
					$courses	=	$courses->id;
		}
		CVarDumper::dump($list,10,1);
		die;
		
	}
	public function actionIndex()
	{
		if(!isset(Yii::app()->user->profileId)){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$model		=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		if(isset($_POST['UserProfiles'])){
			$model->attributes		=	$_POST['UserProfiles'];
			if($model->save()){
				$log					=	new Summary;
				$log->user_profile_id	=	Yii::app()->user->profileId;
				$log->schools_id		=	Yii::app()->user->schoolsId;
				$log->event_id			=	Yii::app()->user->profileId;
				$log->topic				=	'Profile';
				$log->event				=	'Updated Profile';
				$log->remarks			=	'User sccessfully updated his profile information';
				$log->add_date			=	date('Y-m-d H:i:s');
				$log->status			=	1;
				$log->save();
				
				Yii::app()->user->setFlash('updated',"Successfully updated.");
			}
		}
		$this->render('index',array('model'=>$model));
	}
	public function actionTalk()
	{
		
		$model	=	new Tickets('search');
		if(isset($_POST['Tickets'])){
			$user	=	UserProfiles::model()->findByPk(Yii::app()->user->profileId);
			$model->attributes	=	$_POST['Tickets'];
			$model->sender_id	=	Yii::app()->user->profileId;
			$model->receiver_id	=	Yii::app()->user->schoolsId;
			$model->status		=	1;
			$model->add_date	=	date('Y-m-d H:i:s');
			if($model->save()){
				$log					=	new Summary;
				$log->user_profile_id	=	Yii::app()->user->profileId;
				$log->schools_id		=	Yii::app()->user->schoolsId;
				$log->event_id			=	$model->id;
				$log->topic				=	'Talk to Counsellor';
				$log->event				=	'Asked query to counsellor';
				$log->remarks			=	'User submitted his/her query request to counsellor sccessfully.';
				$log->add_date			=	date('Y-m-d H:i:s');
				$log->status			=	1;
				$log->save();
				$this->refresh();
			}
		}
		$model->unsetAttributes();
		$model->sender_id	=	Yii::app()->user->profileId;
		
		
		$list	=	Tickets::model()->FindAllByAttributes(array('sender_id'=>Yii::app()->user->profileId));
		
		$this->render('talk',array('model'=>$model,'lists'=>$list));
	}
	public function actionUserProfileUpdate()
	{	
		if(isset($_REQUEST['Rid'])){
			if($_REQUEST['Rid']=='language'){
				$user					=	UserProfiles::model()->findByPk(Yii::app()->user->profileId);
				$user->language_known	=	$_REQUEST['profileData'];
				if($user->save()){
					$response		=	array('message'=>'sccessfully updated to language Knows.');
					echo json_encode($response);die;
				}
			}
			if($_REQUEST['Rid']=='medium'){
				$user						=	UserProfiles::model()->findByPk(Yii::app()->user->profileId);
				$user->medium_instruction	=	$_REQUEST['profileData'];
				if($user->save()){
					$response		=	array('message'=>'sccessfully updated to medium instruction.');
					echo json_encode($response);die;
				}
			}
		
		}
		if(isset($_REQUEST['interestID'])){
			$inId					=	$_REQUEST['interestID'];
			echo $inId;die;
			$interest				=	Interests::model()->findByPk($inId);
			$interest->title		=	$_REQUEST['interestValue'];
			$interest->add_date 	=	date('Y-m-d H:i:s');
			$interest->published 	=	1; 	 
			$interest->status	 	=	1;
			if($interest->save()){
				$response		=	array('message'=>'sccessfully updated to '.$interest->title.'.');
				echo json_encode($response);die;
			}
		}
		if(isset($_REQUEST['userInterest'])){
			$interest2				=	new	Interests;
			$interest2->title		=	$_REQUEST['userInterest'];
			$interest2->description	=	'Description here';
			$interest2->add_date 	=	date('Y-m-d H:i:s');
			$interest2->published 	=	1; 	 
			$interest2->status	 	=	1;
			if($interest2->save()){
				$userInterest					=	new UserProfilesHasInterests;
				$userInterest->user_profiles_id =	Yii::app()->user->profileId;
				$userInterest->interests_id 	 =	$interest2->id;
				$userInterest->add_date 	 	 =	date('Y-m-d H:i:s');
				$userInterest->status  	 	 	=	1;
				if($userInterest->save()){
					$response		=	array('message'=>'Saved user interest.');
					echo json_encode($response);die;
				}
			}
			//CVarDumper::dump($interest2,10,1);die;
		}
		if(isset($_REQUEST['subjectId'])){
			$sId					=	$_REQUEST['subjectId'];
			$subjects				=		UserSubjects::model()->findByPk($sId);
			$subjects->title		=	$_REQUEST['subjectIdValue'];
			if($subjects->save()){
				$response		=	array('message'=>'updated existing record.');
				echo json_encode($response);die;
			}
			
		}
		if(isset($_REQUEST['UserProfiles'])){
			$model					=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
			$model->attributes		=	$_POST['UserProfiles'];
			if($model->save()){
				Yii::app()->user->setFlash('updated',"Profile scessfully updated.");die;
			}
		}
		if(isset($_REQUEST['subject'])){
			$subjects				=	new	UserSubjects;
			$subjects->title		=	$_REQUEST['subject'];
			$subjects->description	=	'';
			$subjects->add_date		=	date('Y-m-d H:i:s');
			$subjects->published	=	1;
			$subjects->status		=	1;
			if($subjects->save()){
				$uSubjects						=	new	UserProfilesHasUserSubjects;
				$uSubjects->user_profiles_id	=	Yii::app()->user->profileId;
				$uSubjects->user_subjects_id	=	$subjects->id;
				//$uSubjects->percentage			=	$_REQUEST['UserProfiles']['percentage'];
				$uSubjects->add_date			=	date('Y-m-d H:i:s');
				$uSubjects->status 				=	1;
				$uSubjects->is_favorite			=	0;
				if($uSubjects->save()){
					$response		=	array('message'=>'Sucessfully updated current subject.');
					echo json_encode($response);die;
					
				}
			}
		
		}if(isset($_REQUEST['favorite'])){
			$subjects				=	new	UserSubjects;
			$subjects->title		=	$_REQUEST['favorite'];
			$subjects->description	=	'';
			$subjects->add_date		=	date('Y-m-d H:i:s');
			$subjects->published	=	1;
			$subjects->status		=	1;
			if($subjects->save()){
				$uSubjects						=	new	UserProfilesHasUserSubjects;
				$uSubjects->user_profiles_id	=	Yii::app()->user->profileId;
				$uSubjects->user_subjects_id	=	$subjects->id;
				$uSubjects->add_date			=	date('Y-m-d H:i:s');
				$uSubjects->is_favorite			=	1;
				if($uSubjects->save()){
					$response		=	array('message'=>'Sucessfully updated favourite.');
					echo json_encode($response);die;
					
				}
			}
		
		}if(isset($_REQUEST['lestFavorite'])){
			$subjects				=	new	UserSubjects;
			$subjects->title		=	$_REQUEST['lestFavorite'];
			$subjects->description	=	'';
			$subjects->add_date		=	date('Y-m-d H:i:s');
			$subjects->published	=	1;
			$subjects->status		=	1;
			if($subjects->save()){
				$uSubjects						=	new	UserProfilesHasUserSubjects;
				$uSubjects->user_profiles_id	=	Yii::app()->user->profileId;
				$uSubjects->user_subjects_id	=	$subjects->id;
				$uSubjects->add_date			=	date('Y-m-d H:i:s');
				$uSubjects->least_favourite		=	1;
				if($uSubjects->save()){
					$response		=	array('message'=>'Sucessfully updated Least favourite.');
					echo json_encode($response);die;
					
				}
			}
		
		}
 
	}
	public function actionEditProfile()
	{	
		if(!Yii::app()->user->profileId){
			$this->redirect(Yii::app()->createUrl('/site/'));
		}
		$model		=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		if(isset($_POST['UserProfiles']))
		{
			$model->attributes		=	$_POST['UserProfiles'];
			$model->display_name 	=	$_POST['UserProfiles']['first_name'].' '.$_POST['UserProfiles']['last_name'];
			if($model->save()){
				UserProfilesHasInterests::model()->deleteAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
				foreach($_POST['UserProfiles']['interest'] as $key=>$val){
					if($val!=0){
					$inst						=	new UserProfilesHasInterests;
					$inst->user_profiles_id		=	Yii::app()->user->profileId;
					$inst->interests_id			=	$key;
					$inst->add_date				=	date('Y-m-d');
					$inst->status				=	1;
					$inst->save();
					}
				}
				
				UserProfilesHasUserSubjects::model()->deleteAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
				foreach($_POST['UserProfiles']['currentSubject'] as $key=>$val){
					if(!empty($val)){					
						$subjev	=	UserSubjects::model()->FindByAttributes(array('title'=>$val));	
						if(empty($subjev)){
							$subjev				=	 new UserSubjects;
							$subjev->title		=	$val;
							$subjev->description=	$val;
							$subjev->add_date	=	date('Y-m-d');
							$subjev->published	=	1;
							$subjev->status		=	1;
							$subjev->save();
								
						}
						$inst						=	new UserProfilesHasUserSubjects;
						$inst->user_profiles_id		=	Yii::app()->user->profileId;
						$inst->user_subjects_id		=	$subjev->id;
						$inst->percentage			=	$_POST['UserProfiles']['percentage'][$key];
						$inst->add_date				=	date('Y-m-d');
						$inst->status				=	1;
						$inst->save();
					}
				}
				
				foreach($_POST['UserProfiles']['Lestfavorite'] as $key=>$val){
					if(!empty($val)){					
						$subjev	=	UserSubjects::model()->FindByAttributes(array('title'=>$val));	
						if(empty($subjev)){
							$subjev				=	 new UserSubjects;
							$subjev->title		=	$val;
							$subjev->description=	$val;
							$subjev->add_date	=	date('Y-m-d');
							$subjev->published	=	1;
							$subjev->status		=	1;
							$subjev->save();
								
						}
						$inst						=	UserProfilesHasUserSubjects::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'user_subjects_id'=>$subjev->id));
						if(empty($inst)){
							$inst						=	new UserProfilesHasUserSubjects;
							$inst->user_profiles_id		=	Yii::app()->user->profileId;
							$inst->user_subjects_id		=	$subjev->id;
							$inst->add_date				=	date('Y-m-d');
							$inst->status				=	1;
						}
						$inst->least_favourite			=	1;
						$inst->save();
					}
				}
				foreach($_POST['UserProfiles']['favorite'] as $key=>$val){
					if(!empty($val)){					
						$subjev	=	UserSubjects::model()->FindByAttributes(array('title'=>$val));	
						if(empty($subjev)){
							$subjev				=	 new UserSubjects;
							$subjev->title		=	$val;
							$subjev->description=	$val;
							$subjev->add_date	=	date('Y-m-d');
							$subjev->published	=	1;
							$subjev->status		=	1;
							$subjev->save();
								
						}
						$inst						=	UserProfilesHasUserSubjects::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'user_subjects_id'=>$subjev->id));
						if(empty($inst)){
							$inst						=	new UserProfilesHasUserSubjects;
							$inst->user_profiles_id		=	Yii::app()->user->profileId;
							$inst->user_subjects_id		=	$subjev->id;
							$inst->add_date				=	date('Y-m-d');
							$inst->status				=	1;
						}
						$inst->is_favorite				=	1;
						$inst->save();
					}
				}
				
				
				$log					=	new Summary;
				$log->user_profile_id	=	Yii::app()->user->profileId;
				$log->schools_id		=	$model->generateGudaakIds->schools_id;
				$log->event_id			=	Yii::app()->user->profileId;
				$log->topic				=	'Profile';
				$log->event				=	'Updated Profile';
				$log->remarks			=	'User sccessfully updated his profile information';
				$log->add_date			=	date('Y-m-d H:i:s');
				$log->status			=	1;
				$log->save();
				
				Yii::app()->user->setFlash('updated',"Successfully updated.");
				$this->redirect(array('user/editProfile'));
			}
			else{
				CVarDumper::dump($model,10,1);die;
			}
		}
		//$this->render('editProfile', array('model'=>$model));
	}
	public function actionTest($id)
	{									
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site/'));
		}
		$preResultTest		=	UserReports::model()->findByAttributes(array('orient_items_id'=>$id,'user_profiles_id'=>Yii::app()->user->profileId));
		if(isset($preResultTest->orient_items_id)==($id)){
			$this->redirect(Yii::app()->createUrl('/user/tests'));
		}
		$criteria				=	new CDbCriteria();
		$criteria->condition 	=	'published  = :published  and status=:status';
		$criteria->params 		=	array(':published'=>1,':status'=>1);
		$testContent			=	OrientItems::model()->findByPk($id,$criteria);
		$questions				=	array();
		$questions				=	Questions::model()->FindAllByAttributes(array('orient_items_id'=>$id,'published'=>1,'status'=>1));
		$quest					=	array();
		$preTestReport			=	array();
						
		foreach($questions as $question){
			$quest[$question->id]['id']						=	$question->id;
			$quest[$question->id]['title']					=	$question->title;
			$quest[$question->id]['testId']					=	$question->orient_items_id;
			$quest[$question->id]['career_categories_id']	=	$question->career_categories_id;
			$options	=	QuestionsHasQuestionOptions::model()->FindAllByAttributes(array('questions_id'=>$question->id));
			if(!empty($options))
				foreach($options as $option){
					$quest[$question->id]['option'][$option->question_options_id]	=	$option->questionOptions->name;
				}
			else
				$quest[$question->id]['option'][]	=	'';
		}
		$model	=	new TestReports;
		if(isset($_POST['TestReports'])||isset($_POST['testReports'])){
			$testReport		=	TestReports::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'test_category'=>$id));
			$total		=	count($testReport);
			$questionCoun	=	Questions::model()->countByAttributes(array('orient_items_id'=>$id));
			if($total!=$questionCoun){
				
				$list		=	array();
				$QuestionList	=	Questions::model()->findAllByAttributes(array('orient_items_id'=>$id));
				foreach($QuestionList as $qusey){
					if(!isset($_POST['TestReports']['question_options_id'][$qusey->id]))
						$list[]	=	 $qusey->id;
				}
				
				$response['status']=0;
				$response['total']=	count($list);
				$response['message']=$list;
				echo json_encode($response); 
				die;
			}
			$model->attributes 				= 	(isset($_POST['TestReports']))?$_POST['TestReports']:$_POST['testReports'];
			$model->questions_id 			= 	(isset($_POST['TestReports']))?$_POST['TestReports']['question_options_id']:$_POST['testReports']['question_options_id'];
			$model->career_categories_id	= 	(isset($_POST['TestReports']))?$_POST['TestReports']['career_categories_id']:$_POST['testReports']['career_categories_id'];
			$score	=	array();
			foreach($model->questions_id as $key=>$value){
				$testReport		=	TestReports::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'questions_id'=>$key));
				if(empty($testReport))
					$testReport							=	new TestReports;
				$Question								=	$key;
				$Options								=	$value;
				$testReport->comments	 				= 	'';
				$testReport->status		 				=	1;
				$testReport->activation	 				=	1;
				$testReport->questions_id				=	$Question;
				$testReport->question_options_id 		=	$Options;
				$testReport->test_category				=	$id;
				$testReport->user_profiles_id	 		=	Yii::app()->user->profileId;
				$testReport->save();
				if(!isset($score[$testReport->questions->career_categories_id])){
					$score[$testReport->questions->career_categories_id]	=	0;
				}
				else{
					$cate			=	$testReport->questions->career_categories_id;
					
					$interestVal	=	$testReport->questionOptions->interest_value;
					$score[$cate]	+=	$interestVal;
					
				}
			}
			unset($score['1']);
			foreach ($score as $key=>$val){
				$userScore							=	new UserScores;
				$userScore->score					=	$val;
				$userScore->career_categories_id 	=	$key;
				$userScore->user_profiles_id	 	=	Yii::app()->user->profileId;
				$userScore->add_date			 	=	date('Y-m-d H:i:s');
				$userScore->test_category		 	=	$id;
				$userScore->save();
			}
			$userTest						=	new UserReports;						
			$userTest->orient_items_id 		=	$id;
			$userTest->user_profiles_id	 	=	Yii::app()->user->profileId;
			$userTest->add_date			 	=	date('Y-m-d H:i:s');
			$userTest->status			 	=	1;
			$userTest->activation			=	1;
			$userTest->save();
			
			$log					=	new Summary;
			$log->user_profile_id	=	Yii::app()->user->profileId;
			$log->schools_id		=	Yii::app()->user->schoolsId;
			$log->event_id			=	$userTest->id;
			$log->topic				=	'Test';
			$log->event				=	'Test Submitted';
			$log->remarks			=	'User submitted his/her test sccessfully.';
			$log->add_date			=	date('Y-m-d H:i:s');
			$log->status			=	1;
			$log->save();
			$response['status']=1;
			$response['message']='Plsease wait.';
			echo json_encode($response); 
			die;
			
		}
		$testAvswe		=	TestReports::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'test_category'=>$id));
		$testAns	=	array();
		if(isset($testAvswe))
		foreach($testAvswe as $anw){
			$testAns[$anw->questions_id]=$anw->question_options_id;
		}
		$this->render('test', array('questions'=>$quest,'model'=>$model,'testContent'=>$testContent,'testAns'=>$testAns));
	}
	public function actionTests()
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$start_time =	'';
		$end_time 	=	'';
		$model		=	new RetakeTestRequest;
		$criteria				=	new CDbCriteria();
		$criteria->condition 	=	'published  = :published  and status=:status';
		$criteria->params 		=	array(':published'=>1,':status'=>1);
		$testContent			=	OrientItems::model()->findAll($criteria);
		$userTest				=	UserReports::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		$tests	=	array();
		$detials	=	array();
		foreach($userTest as $test){
			$tests[]	=	$test->orient_items_id;
			$detials[$test->orient_items_id]['id']=$test->orient_items_id;
			$detials[$test->orient_items_id]['date']=$test->add_date;
			$detials[$test->orient_items_id]['count']=60;
			$detials[$test->orient_items_id]['duration']=60;
			$userTestDuration		=	 TestReports::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'test_category'=>$test->orient_items_id));
			foreach($userTestDuration as $time){
			  if ($time === reset($userTestDuration))
					$start_time= $time->add_date;

				if ($time === end($userTestDuration))
					$end_time	= $time->add_date;
					
				//$duration['time']		=	$time->add_date;
			}
			$TimeStart = strtotime($start_time);
			$TimeEnd = strtotime($end_time);
			$Difference = ($TimeEnd - $TimeStart);
			$detials[$test->orient_items_id]['duration']= gmdate('H:i:s',$Difference);
		
		}
		
		$feeds	=	 UserFeedback::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->profileId));
		$feedBack	=	array();
		
		foreach($feeds as $feed){
			$idx					=	$feed->question_id;
			$feedBack[$idx]['feed']	=	$feed->feedback;
			$feedBack[$idx]['test']	=	$feed->test_id;
		}
		
		$this->render('userTest',array('testContent'=>$testContent,'userTest'=>$tests,'detials'=>$detials,'feedBack'=>$feedBack,'model'=>$model));
	}
	public function actionFeedbackAnswer()
	{	 
		$Qid			=	$_REQUEST['QID'];	
		$Uans			=	$_REQUEST['ans'];	
		$test			=	$_REQUEST['testId'];
		
		$testReport1	=	 UserFeedback::model()->findByAttributes(array('user_id'=>Yii::app()->user->profileId,'test_id'=>$test,'question_id'=>$Qid));
		if(!isset($testReport1))
			$testReport1	=	new UserFeedback;
			$testReport1->feedback	 	= 	$Uans;
			$testReport1->question_id	=	$Qid;
			$testReport1->test_id		=	$test;
			$testReport1->user_id	 	=	Yii::app()->user->profileId;
			$testReport1->add_date 		=	date('Y-m-d H:i:s');
			$testReport1->status		=	1;
			if($testReport1->save()){
					echo 'You have answer to '.$Qid;die;
			}
			else
			CVarDumper::dump($testReport1,10,1);
			
			die;
		 
	}
	
	public function actionRetakeTest($id)
	{	
		$findRequest		=	 RetakeTestRequest::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'orient_items_id'=>$id));
		if($findRequest==1){
			Yii::app()->user->setFlash('updated',"you have already sent request to administrator.");
			$this->redirect(array('user/tests'));
			die;
		}
		else{
			$model		=	 new RetakeTestRequest;
			if(isset($_POST['RetakeTestRequest']))
			{
				$model->attributes			=	$_POST['RetakeTestRequest'];
				$model->orient_items_id		=	$_POST['RetakeTestRequest']['orient_items_id'];
				$model->user_profiles_id	=	Yii::app()->user->profileId;
				$model->add_date			=	date('Y-m-d H:i:s');
				$model->status				=	1;
				if($model->save()){
					$log					=	new Summary;
					$log->user_profile_id	=	Yii::app()->user->profileId;
					$log->schools_id		=	Yii::app()->user->schoolsId;
					$log->event_id			=	$model->id;
					$log->topic				=	'Test';
					$log->event				=	'Test retake request';
					$log->remarks			=	'User submitted his/her retake request sccessfully.';
					$log->add_date			=	date('Y-m-d H:i:s');
					$log->status			=	1;
					$log->save();
					Yii::app()->user->setFlash('updated',"Your request has been submitted. You will soon receive the response to your query.");
					$this->redirect(array('user/tests'));
					die;
				}
				
			}
			 
			
		}
	}
	public function actionQuestionsAnswer()
	{	 
		$Qid			=	$_REQUEST['testId'];	
		$Uans			=	$_REQUEST['ans'];	
		$test			=	$_REQUEST['QID'];
		//print_r($_REQUEST);die;
		$score			=	array();
		$testReport1	=	 TestReports::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'questions_id'=>$Qid));
		if(!isset($testReport1))
			$testReport1	=	new TestReports;
			$testReport1->comments	 				= 	'';
			$testReport1->status		 			=	1;
			$testReport1->activation	 			=	1;
			$testReport1->questions_id				=	$Qid;
			$testReport1->add_date 					=	date('Y-m-d H:i:s');
			$testReport1->question_options_id 		=	$Uans;
			$testReport1->test_category				=	$test;
			$testReport1->user_profiles_id	 		=	Yii::app()->user->profileId;
			if($testReport1->save()){
					echo 'You have answer to '.$testReport1->questions->title;die;
			}
		 
	}	
	public function actionDetailedReport()
	{	
		$userTest				=	UserReports::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		if($userTest <= 1){
			Yii::app()->user->setFlash('redirect',"You need to take both personality and interest tests to know your career recommendations and results in detail.");
			$this->redirect(Yii::app()->createUrl('/user/tests'));
		}
		
		$userReports			=	UserReports::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId),array('order'=> 'orient_items_id ASC'));
		$data					=	array();
		$userTestDate			=	UserReports::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		foreach($userReports as $report){
			$userTest	=	array();
			$data[$report->orient_items_id]['id']=$report->orient_items_id;
			$data[$report->orient_items_id]['name']=$report->orientItems->title;
			$data[$report->orient_items_id]['description']=$report->orientItems->description;
			$userTests	=	UserScores::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'test_category'=>$report->orient_items_id));
			
			foreach($userTests as $cur){
				$score	=	$cur->score;
				foreach($cur->careerCategories->careerAssessments as $asswssment){
					if($score >= $asswssment->score_start && $score <= $asswssment->score_end){
						$userTest[$asswssment->value][$cur->career_categories_id]['value']		=	$asswssment->value;
						$userTest[$asswssment->value][$cur->career_categories_id]['score']		=	$score;	
						$userTest[$asswssment->value][$cur->career_categories_id]['id']			=	$cur->careerCategories->id;
						$userTest[$asswssment->value][$cur->career_categories_id]['title']		=	$cur->careerCategories->title;
						$userTest[$asswssment->value][$cur->career_categories_id]['title2']		=	$asswssment->title;
						$userTest[$asswssment->value][$cur->career_categories_id]['description']=	$asswssment->description;
						$userTest[$asswssment->value][$cur->career_categories_id]['descr']		=	$asswssment->descr;
						$userTest[$asswssment->value][$cur->career_categories_id]['image']		=	$asswssment->image;
					}
				}
				
			}
		if($report->orient_items_id==3){
			$highCount	=	0;
			$midCount	=	0;
			$final		=	array();
			$final1		=	array();
			if(isset($userTest['high'])){
				$highCount	=	count($userTest['high']);
				$final		=	$userTest['high'];
				$final1		=	$userTest['high'];
			}
			if(isset($userTest['moderate'])){
				$midCount	=	count($userTest['moderate']);
				$final1		=	array_merge($final1,array_slice($userTest['moderate'], 0, 5));
			}
			
			if($highCount ==	0 && isset($userTest['moderate']))
				$final		=	array_merge($final,array_slice($userTest['moderate'], 0, 2));
			if($highCount>0 && $highCount < 2 && isset($userTest['moderate']))
				$final		=	array_merge($final,array_slice($userTest['moderate'], 0, 1));
			if(isset($userTest['low']))
				$final1		=	array_merge($final1,array_slice($userTest['low'], 0, 5));
			$total	=	$highCount+$midCount;
			
			ksort($final1);
			ksort($final);
			$data[$report->orient_items_id]['results1']=$final1;
			$data[$report->orient_items_id]['results']=$final;
			
		}else{
				
			$final		=	array();
			if(isset($userTest['high']))
				$final		=	$userTest['high'];
			if(isset($userTest['moderate']))
				$final		=	$final+$userTest['moderate'];
				
			if(isset($userTest['low']))
				$final		=	$final+$userTest['low'];
			ksort($final);
			/*	$final		=	array();
				if(isset($userTest['high'])){
					$final		=	$userTest['high'];
				}
				if(isset($userTest['moderate']))
					$final		=	array_merge($final,array_slice($userTest['moderate'],0,5));
				if(isset($userTest['low']))
					$final		=	array_merge($final,array_slice($userTest['low'],0,5));*/
				
				$data[$report->orient_items_id]['results']=$final;
			}	
			
		}
		
		$profile		=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		
		
		if(isset($_REQUEST['download']) && $_REQUEST['download']==1){
			//ob_clean(); 
			
			//$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			ob_end_clean();
			if(Yii::app()->user->userType ==  'below10th'){
				$html='careerPdfReport';//pdfReport';
			}else{
				$html='careerPdfReport';
			}
			$html2pdf->WriteHTML($this->renderPartial($html,array('reports'=>$data,'profile'=>$profile,'userTestDate'=>$userTestDate),true));
			$html2pdf->Output();
			die;
		}
		
		if(isset($_REQUEST['download1']) && $_REQUEST['download1']==1){
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			ob_end_clean();
			if(isset($_REQUEST['download1']) && $_REQUEST['download1']==1)
				$html='careerPdfReportTemp';
			$html2pdf->WriteHTML($this->renderPartial($html,array('reports'=>$data,'profile'=>$profile,'userTestDate'=>$userTestDate),true));
			$html2pdf->Output();
			die;
		}
		
		if(Yii::app()->user->userType ==  'below10th')
			$this->render('detailedReportS',array('reports'=>$data,'profile'=>$profile,'userTestDate'=>$userTestDate));
			//$this->render('detailedReport2',array('reports'=>$data,'profile'=>$profile,'userTestDate'=>$userTestDate));
		else
			$this->render('detailedReport',array('reports'=>$data,'profile'=>$profile,'userTestDate'=>$userTestDate));
		
		
		
	
	}
	public function actionSummaryDetails()
	{	
		$reportId	=	$_REQUEST['id'];
		$report		=	UserReports::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'orient_items_id'=>$reportId));
		$data		=	array();
		$userTest	=	array();
		$data[$report->orient_items_id]['id']=$report->orient_items_id;
		$data[$report->orient_items_id]['name']=$report->orientItems->title;
		$data[$report->orient_items_id]['description']=$report->orientItems->description;
		$userTests	=	UserScores::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'test_category'=>$report->orient_items_id));
		foreach($userTests as $cur){
			$score	=	$cur->score;
			foreach($cur->careerCategories->careerAssessments as $asswssment){
				if($score >= $asswssment->score_start && $score <= $asswssment->score_end){
					$userTest[$asswssment->value][$cur->career_categories_id]['value']			=	$asswssment->value;
						$userTest[$asswssment->value][$cur->career_categories_id]['score']		=	$score;	
						$userTest[$asswssment->value][$cur->career_categories_id]['id']			=	$cur->careerCategories->id;
						$userTest[$asswssment->value][$cur->career_categories_id]['title']		=	$cur->careerCategories->title;
						$userTest[$asswssment->value][$cur->career_categories_id]['title2']		=	$asswssment->title;
						$userTest[$asswssment->value][$cur->career_categories_id]['description']=	$asswssment->description;
				}
			}
			
		}
		if($reportId==3){
			$highCount	=	0;
			$midCount	=	0;
			$final		=	array();
			$final1		=	array();
			if(isset($userTest['high'])){
				$highCount	=	count($userTest['high']);
				$final		=	$userTest['high'];
				$final1		=	$userTest['high'];
			}
			if(isset($userTest['moderate'])){
				$midCount	=	count($userTest['moderate']);
				$final1		=	array_merge($final1,array_slice($userTest['moderate'], 0, 5));
			}
			
			if($highCount ==	0 && isset($userTest['moderate']))
				$final		=	array_merge($final,array_slice($userTest['moderate'], 0, 2));
			if($highCount>0 && $highCount < 2 && isset($userTest['moderate']))
				$final		=	array_merge($final,array_slice($userTest['moderate'], 0, 1));
			if(isset($userTest['low']))
				$final1		=	array_merge($final1,array_slice($userTest['low'], 0, 5));
			$total	=	$highCount+$midCount;
			
			ksort($final1);
			ksort($final);
			$data[$report->orient_items_id]['results1']=$final1;
			$data[$report->orient_items_id]['results']=$final;
		}
		else{
			$final		=	array();
			if(isset($userTest['high']))
				$final		=	$userTest['high'];
			if(isset($userTest['moderate']))
				$final		=	$final+$userTest['moderate'];
				
			if(isset($userTest['low']))
				$final		=	$final+$userTest['low'];
			ksort($final);
			$data[$report->orient_items_id]['results']=$final;
		}
		$profile		=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		if(Yii::app()->user->userType ==  'below10th')
			$this->renderPartial('_detailedReport2',array('reports'=>$data,'profile'=>$profile), false, true);
		else
			$this->renderPartial('_detailedReport',array('reports'=>$data,'profile'=>$profile), false, true);
	
	}
	public function actionCollage($id)
	{	
		$Institutes	=	Collage::model()->findByPk($id);
		$this->render('_collage1',array('Institutes'=>$Institutes));
	}
	public function actionLiveChat()
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$this->render('LiveChat');
	}
	public function actionCareer()
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$criteria 		= new CDbCriteria;
		$criteria->condition = '(published =:published and status=:status)';
		$criteria->params = array(':published'=>1,'status'=>1);
		$dataProvider				=	Career::model()->findAll($criteria);
		
		$this->render('career',array('data'=>$dataProvider));
	}	
	public function actionCareerList($id)
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$dataBYId		=	Career::model()->FindByPk($id);
		$criteria			=	new CDbCriteria();
		//$criteria->join 	=	'LEFT JOIN user_rating ON user_rating.career_options_id = t.id';
		$criteria->condition= '(published =:published and status =:status  and career_id=:career_id)';
		$criteria->params 	= array('published'=>1,'status'=>1,'career_id'=>$id);
	 	$career				=	Careeroptions::model()->findAll($criteria);
		$this->render('careerList',array('dataBYId'=>$dataBYId,'career' => $career));
	}
	public function actionCareerDetails($id)
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$careerDetails				=	CareerOptions::model()->FindByPk($id);
		$userRateing				=	UserCareerPreference::model()->findByAttributes(array('career_options_id'=>$careerDetails->id,'user_profiles_id'=>Yii::app()->user->profileId));
		$careerDetailsList			=	CareerDetails::model()->findAllByAttributes(array('career_options_id'=>$id,'published'=>1,'status'=>1));
		$this->render('careerDetails',array('careerDetails'=>$careerDetails,'careerDetailsList'=>$careerDetailsList,'userRateing'=>$userRateing));
	}
	public function actionCareerInfo($id)
	{
		$career		=	Career::model()->FindByPk($id);
		$this->render('careerInfo',array('career'=>$career));
	}
	public function actionReadFull($id)
	{
		$career		=	Career::model()->FindByPk($id);
		$this->render('readFull',array('career'=>$career));
	}
	public function actionStreamList()
	{
		$data		=array();
		$stream	=	Stream::model()->findAllByAttributes(array('status'=>1,'activation'=>1));
		foreach($stream as $list){
			$data[$list->id]['id']				=	$list->id;
			$data[$list->id]['name']			=	$list->name;
			$data[$list->id]['description']		=	$list->description;
			$data[$list->id]['image']			=	$list->image;
			$data[$list->id]['featured']		=	$list->featured;
			$criteria			=	new CDbCriteria();
			$criteria->condition= '(stream_id =:stream_id and user_profiles_id =:user_profiles_id )';
			$criteria->params 	= array('stream_id'=>$list->id,'user_profiles_id'=>Yii::app()->user->profileId);
			$criteria->order 	 = 'self ASC';
			$userStream	=	UserProfilesHasStream::model()->findAll($criteria);
			foreach($userStream as $list2){
			 	$data[$list->id]['rating']			=	$list2->self;
			  
			}
		}
		//echo '<pre>';print_r($data);die;
		$this->render('streamList',array('data'=>$data));
	}
	public function actionStream($id)
	{
				
		$streamData		=	array();
		$stream			=	Stream::model()->findByPk($id);
		$userStream		=	UserProfilesHasStream::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'stream_id'=>$id));
		$Subjects		=	array();
		$subjectList	=	array();
		$careerSubjets	=	array();
		$optionList		=	array();
		$result			=	array();
		$StreamHasSubjects	=	StreamHasSubjects::model()->findAllByAttributes(array('stream_id'=>$id));
		foreach($StreamHasSubjects as $subject){
			$subjectList[]	=	$subject->subjects_id;

			if($subject->subjects->published==1){
				$Subjects[$subject->subjects->id]['id']			=	$subject->subjects->id;
				$Subjects[$subject->subjects->id]['title']		=	$subject->subjects->title;
				$Subjects[$subject->subjects->id]['image']		=	$subject->subjects->image;
				$Subjects[$subject->subjects->id]['type']		=	$subject->type_subjects;
				$Subjects[$subject->subjects->id]['description']=	$subject->subjects->description;
				if($Subjects[$subject->subjects->id]['type']=='compulsory')
					$careerSubjets[]	=	$subject->subjects_id;
			}
		}
		$list	=	array();
		$allSubjectCareers	=	CareerOptionsHasStream::model()->findAllByAttributes(array('stream_id'=>$id));
		foreach($allSubjectCareers as $datSubs){
			$list[$datSubs->careerOptions->id]	=	$datSubs->careerOptions->title;
		}
		$userSubjactRate	=	UserSubjectsRating::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		$rat				=	array();
		
		if(count($userSubjactRate)>0)
		foreach($userSubjactRate as $sub)
			$rat[$sub->subjects_id]=$sub->rating;
		
		$this->render('stream',array('stream'=>$stream,'subjects'=>$Subjects,'careerOption'=>$list,'subjectRating'=>$rat,'streamData'=>$userStream));
		
	}
	public function actionFinalizedCareer()
	{	
	
		if(!isset($_REQUEST['id'])){
			$criteria			=	new CDbCriteria();
			$criteria->condition= '(status =:status  and updated_by=:updated_by and user_profiles_id=:user_profiles_id)';
			$criteria->params 	= array('status'=>1,'updated_by'=>1,'user_profiles_id'=>Yii::app()->user->profileId);
			$criteria->order 	= 'self DESC';
			 
			$data	=	array();
			$preference				=	UserCareerPreference::model()->findAll($criteria);
			if(count($preference)==0){
				Yii::app()->user->setFlash('redirect',"None of the Careers have been Finalized as yet");
				$this->redirect(Yii::app()->createUrl('/user/careerPreference'));
			}
		}
		if(isset($_REQUEST['id'])){
			$career	=	 UserCareerPreference::model()->findAllByAttributes(array('status'=>1,'updated_by'=>1,'user_profiles_id'=>Yii::app()->user->profileId));
			$count			=	count($career);
			if($count==2){
				$data['status']=0;
				$data['message']='Maximum of two career options could be finalized.';
				echo json_encode($data);
				die;
				 
			}
			$id		=	$_REQUEST['id'];
			$finalCareer	=	 UserCareerPreference::model()->findByAttributes(array('career_options_id'=>$id,'user_profiles_id'=>Yii::app()->user->profileId));
			$finalCareer->modified_date		=	date('Y-m-d H:i:s');
			$finalCareer->updated_by 		=	1;
			if($finalCareer->save()){
				$log					=	new Summary;
				$log->user_profile_id	=	Yii::app()->user->profileId;
				$log->schools_id		=	Yii::app()->user->schoolsId;
				$log->event_id			=	$id;
				$log->topic				=	'Career';
				$log->event				=	'Finalized Career';
				$log->remarks			=	'User finalized '.$finalCareer->careerOptions->title.' as career option sccessfully.';
				$log->add_date			=	date('Y-m-d H:i:s');
				$log->status			=	1;
				$log->save();
				
				$data['status']=1;
				$data['message']='Thank you to final to career.';
				echo json_encode($data);
				die;
		 		 
			}
		}
		$model	=	new UserCareerComments;
		if(isset($_POST['UserCareerComments']))
		{	
			$model->attributes			=	$_POST['UserCareerComments'];
			$model->add_date			=	date('Y-m-d H:i:s');
			$model->user_profiles_id	=	Yii::app()->user->profileId;
			$model->stream_id			=	$_POST['UserCareerComments']['stream_id'];
			
			if($model->save()){
				Yii::app()->user->setFlash('sccess','sccessfully send your comment.');
			}
		}
		foreach($preference as $Crate){
			$data[$Crate->career_options_id]['id']				=	$Crate-> careerOptions->id;
			$data[$Crate->career_options_id]['title']			=	$Crate-> careerOptions->title;
			$data[$Crate->career_options_id]['description']		=	$Crate->careerOptions->description;
			$data[$Crate->career_options_id]['image']			=	$Crate->careerOptions->image;
			$data[$Crate->career_options_id]['rating']			=	$Crate->self;
		 
			 
		}
		 
		$UserRating		=	UserFeedbackRating::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->profileId));
		$feed			=	array();
		foreach($UserRating as $tes){
			$feed[$tes->question_id]=$tes->feedback;
		}
		//echo '<pre>';
		//print_r($feed);
		//die;
		$this->render('finalizedCareer',array('data'=>$data,'model'=>$model,'feed'=>$feed));
		//$this->render('finalizedCareer',array('data'=>$data,'model'=>$model));
	}
	public function actionRemoveFinalCareer()
	{
		$id		=	$_REQUEST['id'];
		$finalCareer	=	 UserCareerPreference::model()->findByAttributes(array('career_options_id'=>$id,'user_profiles_id'=>Yii::app()->user->profileId));
		$finalCareer->modified_date		=	date('Y-m-d H:i:s');
		$finalCareer->updated_by 		=	0;
		if($finalCareer->save()){
			$log					=	new Summary;
			$log->user_profile_id	=	Yii::app()->user->profileId;
			$log->schools_id		=	Yii::app()->user->schoolsId;
			$log->event_id			=	$id;
			$log->topic				=	'Career';
			$log->event				=	'Removed from finalized Career';
			$log->remarks			=	'User Removed career option '.$finalCareer->careerOptions->title.' from his/her finalized career.';
			$log->add_date			=	date('Y-m-d H:i:s');
			$log->status			=	1;
			$log->save();
			$data['status']=1;
			$data['message']='Sccessfuly removed to career.';
			echo json_encode($data);
			die;
			 
		}
	}
	public function actionRemoveFinalStream()
	{
		$id		=	$_REQUEST['id'];
		$finalCareer	=	 UserProfilesHasStream::model()->findByAttributes(array('stream_id'=>$id,'user_profiles_id'=>Yii::app()->user->profileId));
		$finalCareer->modified_date		=	date('Y-m-d H:i:s');
		$finalCareer->updated_by 		=	0;
		if($finalCareer->save()){
			$log					=	new Summary;
			$log->user_profile_id	=	Yii::app()->user->profileId;
			$log->schools_id		=	Yii::app()->user->schoolsId;
			$log->event_id			=	$id;
			$log->topic				=	'Stream';
			$log->event				=	'Removed from finalized stream';
			$log->remarks			=	'User removed stream '.$finalCareer->stream->name.' from his/her finalized streams.';
			$log->add_date			=	date('Y-m-d H:i:s');
			$log->status			=	1;
			$log->save();
			
			$data['status']=1;
			$data['message']='Sccessfuly removed to career.';
			echo json_encode($data);
			die;
			 
		}
	}
	public function actionUpload()
	{   
		$img		=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		$targetFolder1	=	Yii::app()->baseUrl.'/uploads/user/small/'.$img->image.'';
		@unlink($targetFolder1);
		$path	=	Yii::app()->baseUrl.'/uploads/user/small/';
		Yii::import("ext.EAjaxUpload.qqFileUploader");
        $folder='uploads/user/small/';// folder for uploaded files
        $allowedExtensions = array("jpg");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
        $minSizeLimit = 0 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit, $minSizeLimit);
        $result = $uploader->handleUpload($folder);
		$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        echo $fileName=$result['filename'];//GETTING FILE NAME\
		
		
		$model	=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		$model->image	=$fileName;
		if($model->save()){
			Yii::app()->user->setFlash('image','Your have changed your profile image');
		}
		
		echo $return;// it's array
	}
	public function actionFinalizedStream()
	{	
		if(!isset($_REQUEST['id'])){
			$userTest				=	UserReports::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
			if($userTest==0){
				Yii::app()->user->setFlash('redirect',"Take the test and then rate stream.");
				$this->redirect(Yii::app()->createUrl('/user/tests'));
			}
			$criteria			=	new CDbCriteria();
			$criteria->condition= '(status =:status  and updated_by=:updatedby and user_profiles_id=:user_profiles_id)';
			$criteria->params 	= array(':status'=>1,':updatedby'=>1,':user_profiles_id'=>Yii::app()->user->profileId);
			$criteria->order = 'self DESC';
			$data	=	array();
			$preference				=	UserProfilesHasStream::model()->findAll($criteria,array('order'=>'self ASC'));
			
			if(count($preference)==0){
				Yii::app()->user->setFlash('redirect',"None of the Stream have been Finalized as yet");
				$this->redirect(Yii::app()->createUrl('/user/streamPreference'));
			}
			
		}
		
		
		if(isset($_REQUEST['id'])){
				$streamSa	=	Stream::model()->findByPk($_REQUEST['id']);
				foreach($streamSa->streamHasSubjects as $das){
					if($das->type_subjects =='compulsory'){
						$cout	=	UserSubjectsRating::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'subjects_id'=>$das->subjects_id));
						
						if($cout==0 && $das->subjects_id !=18){
							$data['status']=0;
							$data['message']='Please rate all the compulsory subjects in this stream first.';
							echo json_encode($data);
							die;
						}

					}
				}
				
				
				$stream	=	 UserProfilesHasStream::model()->findByAttributes(array('status'=>1,'updated_by'=>1,'user_profiles_id'=>Yii::app()->user->profileId));
				$count	=	count($stream);
				$data	=	array();
				if($count==1){
					$data['status']=0;
					if($stream->stream_id == $_REQUEST['id'])
						$data['message']='Already Finalized.';
					else
						$data['message']='Maximum of one stream could be finalized.';
				}
				else{
					$id		=	$_REQUEST['id'];
					$model	=	 UserProfilesHasStream::model()->findByAttributes(array('stream_id'=>$id,'user_profiles_id'=>Yii::app()->user->profileId));
					$model->modified_date		=	date('Y-m-d H:i:s');
					$model->updated_by			=	1;
					if($model->save()){
						$log					=	new Summary;
						$log->user_profile_id	=	Yii::app()->user->profileId;
						$log->schools_id		=	Yii::app()->user->schoolsId;
						$log->event_id			=	$id;
						$log->topic				=	'Stream';
						$log->event				=	'Add finalized stream';
						$log->remarks			=	'User added stream '.$model->stream->name.' to his/her finalized streams.';
						$log->add_date			=	date('Y-m-d H:i:s');
						$log->status			=	1;
						$log->save();
						
						
						$data['status']=1;
						$data['message']='Thank you to final to stream.';
					}
				}
				echo json_encode($data);
				die;
			}
		$model	=	new UserStreamComments;
		if(isset($_POST['UserStreamComments']))
		{	
			$model->attributes			=	$_POST['UserStreamComments'];
			$model->add_date			=	date('Y-m-d H:i:s');
			$model->user_profiles_id	=	Yii::app()->user->profileId;
			$model->stream_id			=	$_POST['UserStreamComments']['stream_id'];
			
			if($model->save()){
				Yii::app()->user->setFlash('sccess','sccessfully send your comment.');
			}
		}
		$data	=	array();
		$criteria			=	new CDbCriteria();
		$criteria->condition= '(status =:status and updated_by=:updated_by and user_profiles_id=:user_profiles_id)';
		$criteria->params 	= array('status'=>1,'updated_by'=>1,'user_profiles_id'=>Yii::app()->user->profileId);
		$criteria->order 	 = 'self DESC';
		$preference				=	UserProfilesHasStream::model()->findAll($criteria);
		foreach($preference as $fCounselor){
			$data[$fCounselor->stream_id]['id']			=	$fCounselor->stream->id;
			$data[$fCounselor->stream_id]['name']			=	$fCounselor->stream->name;
			$data[$fCounselor->stream_id]['description']	=	$fCounselor->stream->description;
			$data[$fCounselor->stream_id]['image']			=	$fCounselor->stream->image;
			$data[$fCounselor->stream_id]['featured']		=	$fCounselor->stream->featured;
			$data[$fCounselor->stream_id]['rating']			=	$fCounselor->self;
	 	}
		$UserRating		=	UserFeedbackRating::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->profileId));
		$feed	=	array();
		foreach($UserRating as $tes){
			$feed[$tes->question_id]=$tes->feedback;
		}
		
		$this->render('finalizedStream',array('data'=>$data,'model'=>$model,'feed'=>$feed));
		//$this->render('finalizedStream',array('data'=>$data,'model'=>$model));
	}
	public function actionAddCareer ($id)
	{	
		$count	=	UserCareerPreference::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		if($count==2){
			echo 'You have permission to add more career if you want to add more please contact to administrator.';die;
		}
		$record_exists = UserCareerPreference::model()->exists('career_options_id  = :career_options and user_profiles_id=:id', array(':career_options'=>$id,':id'=>Yii::app()->user->profileId ));
		if($record_exists==1)
		{
			echo 'This is already added please choose another.';die;	
		}
		else{
			$rating		=	UserRating::model()->countByAttributes(array('career_options_id'=>$id,'user_profiles_id'=>Yii::app()->user->profileId));
			if($rating==0){
				echo 'Please do rate first thank you.';die;
			}
			$options	=	CareerOptions::model()->findByPk($id);
			$preffred	 = new UserCareerPreference;
			if(isset($_REQUEST)){
				$preffred->career_options_id	=	$id;
				$preffred->user_profiles_id		=	Yii::app()->user->profileId;
				$preffred->add_date				=	date('Y-m-d H:i:s');
				$preffred->self					=	1;
				$preffred->default				=	0;
				$preffred->status				=	0;
				if($preffred->save()){
					echo 'sccessfully added '.$options->title.' career';die;
				}
	
			}
				echo 'somethig bad';die;
				
		}
		
		
		
	}
	public function actionCareerPreference()
	{
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		
		$userTest				=	UserReports::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		if($userTest==0){
			Yii::app()->user->setFlash('redirect',"Take the test and rate career options");
			$this->redirect(Yii::app()->createUrl('/user/tests'));
		}
		
		
		$criteria			=	new CDbCriteria();
		$criteria->condition= '(user_profiles_id=:user_profiles_id)';
		$criteria->params 	= array('user_profiles_id'=>Yii::app()->user->profileId);
		$criteria->order = 'self DESC';
		$data	=	array();
		$preference				=	UserCareerPreference::model()->findAll($criteria);
		
		if(count($preference)==0){
			Yii::app()->user->setFlash('redirect',"You have not rated any of the careers as yet");
			$this->redirect(Yii::app()->createUrl('/user/career'));
		}
		
		foreach($preference as $Crate){
			$data[$Crate->career_options_id]['id']				=	$Crate-> careerOptions->id;
			$data[$Crate->career_options_id]['title']			=	$Crate-> careerOptions->title;
			$data[$Crate->career_options_id]['description']		=	$Crate->careerOptions->description;
			$data[$Crate->career_options_id]['image']			=	$Crate->careerOptions->image;
			$data[$Crate->career_options_id]['uRating']			=	$Crate->self;
			$data[$Crate->career_options_id]['updated_by']		=	$Crate->updated_by;
		 
	 	}
		 
		$model	=	new UserCareerComments;
		if(isset($_POST['UserCareerComments']))
		{	
			$model->attributes			=	$_POST['UserCareerComments'];
			$model->add_date			=	date('Y-m-d H:i:s');
			$model->user_profiles_id	=	Yii::app()->user->profileId;
			$model->career_id			=	$_POST['UserCareerComments']['career_id'];
			if($model->save()){
				Yii::app()->user->setFlash('sccess','sccessfully send your comment.');
			}
		}
		$data2	=array();
		$finalCounselor	=	UserCareerPreference::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'reccomended'=>1));
		foreach($finalCounselor as $fCounselor){
			$data2[$fCounselor->career_options_id]['id']			=	$fCounselor-> careerOptions->id;
			$data2[$fCounselor->career_options_id]['title']			=	$fCounselor-> careerOptions->title;
			$data2[$fCounselor->career_options_id]['description']	=	$fCounselor->careerOptions->description;
			$data2[$fCounselor->career_options_id]['image']			=	$fCounselor->careerOptions->image;
			$data2[$fCounselor->career_options_id]['rate']			=	$fCounselor->self;
			$data2[$fCounselor->career_options_id]['updated_by']		=	$fCounselor->updated_by;
	 	}
		 
		//CVarDumper::dump($finalCounselor,10,1);die;
		$this->render('careerPreference',array('data'=>$data,'data2'=>$data2,'model'=>$model,'finalCounselor'=>$finalCounselor));
	}
	public function actionStreamPreference()
	{
		$userTest				=	UserReports::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		if($userTest==0){
			Yii::app()->user->setFlash('redirect',"Take the test and rate stream");
			$this->redirect(Yii::app()->createUrl('/user/tests'));
		}
		$criteria			=	new CDbCriteria();
		$criteria->condition= '(status =:status  and user_profiles_id=:user_profiles_id)';
		$criteria->params 	= array('status'=>1,'user_profiles_id'=>Yii::app()->user->profileId);
		$criteria->order = 'self DESC';
		$data	=	array();
		$preference				=	UserProfilesHasStream::model()->findAll($criteria,array('order'=>'self ASC'));
		
		if(count($preference)==0){
			Yii::app()->user->setFlash('redirect',"You have not rated any of the stream as yet");
			$this->redirect(Yii::app()->createUrl('/user/streamList'));
		}
		foreach($preference as $preference){
			$data[$preference->stream_id]['id']				=	$preference->stream->id;
			$data[$preference->stream_id]['name']			=	$preference->stream->name;
			$data[$preference->stream_id]['description']	=	$preference->stream->description;
			$data[$preference->stream_id]['image']			=	$preference->stream->image;
			$data[$preference->stream_id]['Urate']			=	$preference->self;
			$data[$preference->stream_id]['updated_by']		=	$preference->updated_by;
			$data[$preference->stream_id]['subjects']		=	$preference->stream->streamHasSubjects;
			
			
	 	}
		 
		$model	=	new UserStreamComments;
		if(isset($_POST['UserStreamComments']))
		{	
			$model->attributes			=	$_POST['UserStreamComments'];
			$model->add_date			=	date('Y-m-d H:i:s');
			$model->user_profiles_id	=	Yii::app()->user->profileId;
			$model->stream_id			=	$_POST['UserStreamComments']['stream_id'];
			
			if($model->save()){
				Yii::app()->user->setFlash('sccess','sccessfully send your comment.');
			}
		}
		$data2	=	array();
		$finalCounselor	=	UserProfilesHasStream::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'reccomended'=>1));
		foreach($finalCounselor as $fCounselor){
			$data2[$fCounselor->stream_id]['id']			=	$fCounselor->stream->id;
			$data2[$fCounselor->stream_id]['name']			=	$fCounselor->stream->name;
			$data2[$fCounselor->stream_id]['description']	=	$fCounselor->stream->description;
			$data2[$fCounselor->stream_id]['image']			=	$fCounselor->stream->image;
			$data2[$fCounselor->stream_id]['uCrate']		=	$fCounselor->self;
		 
	 	}
		//CVarDumper::dump($finalCounselor,10,1);die;
		
		$userSubjactRate	=	UserSubjectsRating::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		$rat				=	array();
		
		if(count($userSubjactRate)>0)
		foreach($userSubjactRate as $sub)
			$rat[$sub->subjects_id]=$sub->rating;
		
		$this->render('streamPreference',array('data'=>$data,'data2'=>$data2,'model'=>$model,'subjectRating'=>$rat,'finalCounselor'=>$finalCounselor));
	}	
	public function actionUserFinalCareer($id)
	{	 
		$record_exists			=	UserReports::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId),array('order'=> 'orient_items_id ASC'));
		if($record_exists->status==1)
		{
			echo 'This is already added please choose another.';die;	
		}
		else{
			$preffred	=  UserCareerPreference::model()->findByPk($id);
			if(isset($_REQUEST)){
				$preffred->career_options_id	=	$id;
				$preffred->user_profiles_id		=	Yii::app()->user->profileId;
				$preffred->add_date				=	date('Y-m-d H:i:s');
				$preffred->default				=	0;
				$preffred->status				=	1;
				if($preffred->save()){
					echo 'sccessfully added '.$preffred->careerOptions->title.' career';die;
				}
	
			}
				echo 'somethig bad';die;
				
		}
		
		
	}
	public function actionExplore()
	{	 
		$userTest				=	UserReports::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		if($userTest==0){
			Yii::app()->user->setFlash('redirect',"Take the test and rate career options");
			$this->redirect(Yii::app()->createUrl('/user/tests'));
		}
		
		$userReports			=	UserReports::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId),array('order'=> 'orient_items_id ASC'));
		$data	=	array();
		
		foreach($userReports as $report){
			$userTest	=	array();
			$data[$report->orient_items_id]['id']=$report->orient_items_id;
			$data[$report->orient_items_id]['name']=$report->orientItems->title;
			$data[$report->orient_items_id]['description']=$report->orientItems->description;
			$userTests	=	UserScores::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'test_category'=>$report->orient_items_id));
			foreach($userTests as $cur){
				$score	=	$cur->score;
				foreach($cur->careerCategories->careerAssessments as $asswssment){
					if($score >= $asswssment->score_start && $score <= $asswssment->score_end){
						$userTest[$asswssment->value][$cur->id]['id']			=	$cur->careerCategories->id;
						$userTest[$asswssment->value][$cur->id]['title']		=	$cur->careerCategories->title;
						$userTest[$asswssment->value][$cur->id]['description']	=	$cur->careerCategories->description;
						$userTest[$asswssment->value][$cur->id]['image']		=	$cur->careerCategories->image;
					}
				}
			}
			if($report->orient_items_id==3){
				$highCount	=	0;
				$midCount	=	0;
				$final		=	array();
				if(isset($userTest['high'])){
					$highCount	=	count($userTest['high']);
					$final		=	$userTest['high'];
				}
				if(isset($userTest['moderate'])){
					$midCount	=	count($userTest['moderate']);
				}
				
				if($highCount ==	0 && isset($userTest['moderate']))
					$final		=	array_merge($final,array_slice($userTest['moderate'], 0, 2));
				if($highCount>0 && $highCount < 2 && isset($userTest['moderate']))
					$final		=	array_merge($final,array_slice($userTest['moderate'], 0, 1));
				$total	=	$highCount+$midCount;
				$data[$report->orient_items_id]['results']=$final;
			}
		}
		$catList	=	array();
		if(isset($data[$report->orient_items_id]['results']))
		foreach($data[$report->orient_items_id]['results'] as $result){
			$subCats		=	Career::model()->findAllByAttributes(array('career_categories_id'=>$result['id']));
			foreach($subCats as $subCat){
				$catList[$subCat->id]['id']	=	$subCat->id;
				$catList[$subCat->id]['title']	=	$subCat->title;
				$catList[$subCat->id]['description']	=	$subCat->description;
				$catList[$subCat->id]['image']	=	$subCat->image;
			}
		}
		$this->render('explore',array('data'=>$catList));
	}
	public function actionStreamExplore()
	{	
		$userTest				=	UserReports::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		if($userTest==0){
			Yii::app()->user->setFlash('redirect',"Take the test and rate stream");
			$this->redirect(Yii::app()->createUrl('/user/tests'));
		}
		
	
		$userReports			=	UserReports::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId),array('order'=> 'orient_items_id ASC'));
		$data	=	array();
		$catList	=	array();
		if(!empty($userReports)){
			foreach($userReports as $report){
			$userTest	=	array();
			$data[$report->orient_items_id]['id']=$report->orient_items_id;
			$data[$report->orient_items_id]['name']=$report->orientItems->title;
			$data[$report->orient_items_id]['description']=$report->orientItems->description;
			$userTests	=	UserScores::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'test_category'=>$report->orient_items_id));
			foreach($userTests as $cur){
				$score	=	$cur->score;
				foreach($cur->careerCategories->careerAssessments as $asswssment){
					if($score >= $asswssment->score_start && $score <= $asswssment->score_end){
						$userTest[$asswssment->value][$cur->id]['id']			=	$cur->careerCategories->id;
						$userTest[$asswssment->value][$cur->id]['title']		=	$cur->careerCategories->title;
						$userTest[$asswssment->value][$cur->id]['description']	=	$cur->careerCategories->description;
						$userTest[$asswssment->value][$cur->id]['image']		=	$cur->careerCategories->image;
					}
				}
			}
			if($report->orient_items_id==3){
				$highCount	=	0;
				$midCount	=	0;
				$final		=	array();
				if(isset($userTest['high'])){
					$highCount	=	count($userTest['high']);
					$final		=	$userTest['high'];
				}
				if(isset($userTest['moderate'])){
					$midCount	=	count($userTest['moderate']);
				}
				
				if($highCount ==	0 && isset($userTest['moderate']))
					$final		=	array_merge($final,array_slice($userTest['moderate'], 0, 2));
				if($highCount>0 && $highCount < 2 && isset($userTest['moderate']))
					$final		=	array_merge($final,array_slice($userTest['moderate'], 0, 1));
				$total	=	$highCount+$midCount;
				$data[$report->orient_items_id]['results']=$final;
			}
		}
			$catList	=	array();
			
			$listArr	=	array();
			foreach($data[$report->orient_items_id]['results'] as $result){
			
			$listCar	=	Career::model()->findAllByAttributes(array('career_categories_id'=>$result['id']));
			
			
			$streams	=	array();
			foreach($listCar as $subCat){
				$catList[$subCat->id]['id']	=	$subCat->id;
				$catList[$subCat->id]['title']	=	$subCat->title;
				$catList[$subCat->id]['description']	=	$subCat->description;
				$catList[$subCat->id]['image']	=	$subCat->image;
			
				
				
				/*$subCa		=	StreamHasCareer::model()->findAllByAttributes(array('career_id'=>$subCat->id));
				foreach($subCa as $subjects){
						$streams[]=$subjects->stream_id;	
					
				}*/
			}
		/*	$streamList		=	Stream::model()->findAllByAttributes(array('id'=>$streams));
			foreach($streamList as $streamRec){
				if(!in_array($streamRec->id,$listArr))
				{
					$catList[$streamRec->id]['id']			=	$streamRec->id;
					$catList[$streamRec->id]['title']		=	$streamRec->name;
					$catList[$streamRec->id]['description']	=	$streamRec->description;
					$catList[$streamRec->id]['image']		=	$streamRec->image;
				}
			}*/
		}
		}
		$this->render('streamExplore',array('data'=>$catList));
	}
	public function actionSubjectsDetails($id)
	{
		$subject	=	 Subjects::model()->findByPk($id);
	    $this->renderPartial('_subjectDetails',array('subject'=> $subject), false, true);
	}
	public function actionReadFullStream($id)
	{
		$readFullStream		=	Stream::model()->FindByPk($id);
		$this->render('readFullStream',array('readFull'=>$readFullStream));
	}
	public function actionUserPreffredStream ($id)
	{	
		$count	=	UserProfilesHasStream::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		if($count==2){
			echo 'You have permission to add more stream if you want to add more please contact to administrator.';die;
		}
		$record_exists = UserProfilesHasStream::model()->exists('stream_id  = :stream and user_profiles_id=:uID', array(':stream'=>$id,'uID'=>Yii::app()->user->profileId));
		if($record_exists==1)
		{
			echo 'This is stream allready added please choose another.';die;	
		}
	
		else{
			$rating		=	 UserStreamRating::model()->countByAttributes(array('stream_id'=>$id,'user_profiles_id'=>Yii::app()->user->profileId));
			if($rating==0){
				echo 'Please do rate first thank you.';die;
			}
			$stream	=	Stream::model()->findByPk($id);
			$preffred	 = new UserProfilesHasStream;
			if(isset($_REQUEST)){
				$preffred->stream_id			=	$id;
				$preffred->user_profiles_id		=	Yii::app()->user->profileId;
				$preffred->add_date				=	date('Y-m-d H:i:s');
				$preffred->self					=	1;
				$preffred->default 				=	0;
				$preffred->status	  			=	0;
				if($preffred->save()){
					echo 'sccessfully added '.$stream->name.' stream';die;
				}
	
			}
				echo 'somethig bad';die;
				
		}
		
		
		$preffred	=	 UserProfilesHasStream::model()->findByAttributes(array('stream_id'=>$id));
		
	}	
	public function actionStreamCareerOptions($id)
	{	
		$criteria 		= new CDbCriteria;
		//$criteria->join = 'LEFT JOIN career_options_has_subjects ON career_options_has_subjects.career_options_id = t.career_options_id';
		//$criteria->join = 'LEFT JOIN subjects ON career_options_has_subjects.id=subjects.id';
		$criteria->condition = '(t.stream_id =:sID and t.status=:status and t.published=:published)';
		$criteria->params = array(':published'=>1,'status'=>1,'sID'=>$id);
		$stream	=	CareerOptionsHasStream::model()->findAll($criteria);
		$steamData	=	Stream::model()->findByPk($id);
		$this->render('streamCareerOptions',array('stream'=>$stream,'steamData'=>$steamData));
	}
	public function actionUserRaitng()
	{	
		$careeroptions_id				=	$_REQUEST['id'];
		$rating							=	$_REQUEST['rating'];
		$UserRating						=	 UserCareerPreference::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'career_options_id'=>$careeroptions_id));
		if(empty($UserRating))
			$UserRating						=	new UserCareerPreference;
			$UserRating->self				=	$rating;
			$UserRating->status				=	1;
			$UserRating->updated_by			=	0;
			$UserRating->add_date			=	date('Y-m-d H:s:i');
			$UserRating->user_profiles_id	=	Yii::app()->user->profileId;
			$UserRating->career_options_id 	=	$careeroptions_id;
			if($UserRating->save()){
				$response	=	 array('message'=>'sccessfully rating.');
				echo CJSON::encode($response);die;
				 	
			}
	}
	public function actionUserStreamRaitng()
	{	
		if($_REQUEST['type']=='stream'){
		
			$stream_id					=	$_REQUEST['id'];
			$rating						=	$_REQUEST['rating'];
			$UserRating					=	  UserProfilesHasStream::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'stream_id'=>$stream_id));
			if(empty($UserRating))
				$UserRating						=	new UserProfilesHasStream;
				$UserRating->self				=	$rating;
				$UserRating->add_date			=	date('Y-m-d H:s:i');
				$UserRating->user_profiles_id	=	Yii::app()->user->profileId;
				$UserRating->stream_id		 	=	$stream_id;
				if($UserRating->save()){
					$response	=	 array('message'=>'sccessfully rating.');
					echo CJSON::encode($response);die;
				}
		}else if($_REQUEST['type']=='feed'){
			$id				=	$_REQUEST['id'];
			$rating			=	$_REQUEST['rating'];
			$UserRating		=	UserFeedbackRating::model()->findByAttributes(array('user_id'=>Yii::app()->user->profileId,'question_id'=>$id));
			if(empty($UserRating))
				$UserRating						=	new UserFeedbackRating;
				$UserRating->feedback			=	$rating;
				$UserRating->add_date			=	date('Y-m-d H:s:i');
				$UserRating->user_id			=	Yii::app()->user->profileId;
				$UserRating->question_id		=	$id;
				$UserRating->status				=	1;
				if($UserRating->save()){
					$response	=	 array('message'=>'sccessfully rating.');
					echo CJSON::encode($response);die;
				}else{
					CVarDumper::dump($UserRating,10,1);
				}
		}else{
			$stream_id		=	$_REQUEST['id'];
			$rating			=	$_REQUEST['rating'];
			$UserRating		=	UserSubjectsRating::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'subjects_id'=>$stream_id));
			if(empty($UserRating))
				$UserRating						=	new UserSubjectsRating;
				$UserRating->rating				=	$rating;
				$UserRating->add_date			=	date('Y-m-d H:s:i');
				$UserRating->user_profiles_id	=	Yii::app()->user->profileId;
				$UserRating->subjects_id		=	$stream_id;
				if($UserRating->save()){
					$response	=	 array('message'=>'sccessfully rating.');
					echo CJSON::encode($response);die;
				}
		}
	}
	public function actionArticlesList()
	{	
		$criteria			=	new CDbCriteria();
		$criteria->condition= '(published =:published and status =:status )';
		$criteria->params 	= array('published'=>1,'status'=>1);
		$count				=	Articles::model()->count($criteria);
		$pages				=	new CPagination($count);
		$pages->pageSize	=	5;
		$pages->applyLimit($criteria);
		$articles				=	Articles::model()->findAll($criteria);
		$criteria2			=	new CDbCriteria();
		$criteria2->condition= '(published =:published and status =:status )';
		$criteria2->params 	= array('published'=>1,'status'=>1);
		$count				=	Events::model()->count($criteria2);
		$pages2				=	new CPagination($count);
		$pages2->pageSize	=	5;
		$pages2->applyLimit($criteria2);
		$events				=	Events::model()->findAll($criteria2);
		$this->render('articlesList',array('articles'=>$articles,'pages'=>$pages,'pages2'=>$pages2,'events'=>$events));
	}
	public function actionArticles($id)
	{	
		$result				=	 Articles::model()->findByAttributes(array('id'=>$id));
		$this->render('articles',array('articles'=>$result));
	}
	public function actionSummary()
	{	
		$summaryDetails=Summary::model()->findAllByAttributes(array('user_profile_id'=>Yii::app()->user->profileId,'status'=>1),array('order'=> 'add_date DESC'));
		$this->render('summary',array('summaryDetails'=>$summaryDetails));
	}
	public function actionSummaryData($id)
	{
		$summaryDetails=Summary::model()->findByPk($id);
		echo '
		<div class="col-md-12"><a href="javascript:void(0);" class="summery-left-btn pull-right mb10" onclick="$(\'#resultSummery\').html(\'\');">Close</a></div>
		<table width="90%" class="pull-right" cellpadding="10" border="1">
                	<tr class="light-gray"><td width="25%"><span>Event</span></td><td width="75%"><span>'.$summaryDetails->event.'</span></td></tr>
                	<tr><td><span>Title</span></td><td><span>'.$summaryDetails->topic.'</span></td></tr>
                	<tr class="light-gray"><td><span>Add Date</span></td><td><span>'.date('d M, Y',strtotime($summaryDetails->add_date)).'</span></td></tr>
                	<tr><td><span>Details</span></td><td><span>'.$summaryDetails->remarks.'</span></td></tr>
                	
                </table>';
	}
	public function actionTalkData($id)
	{
		$summaryDetails	=	Tickets::model()->findByPk($id);
		echo '<div class="col-md-12"><a href="javascript:void(0);" class="summery-left-btn pull-right mb10" onclick="$(\'#resultSummery\').html(\'\');">Close</a></div>
		<table width="90%" class="pull-right" cellpadding="10" border="1">
                	<tr class="light-gray"><td width="25%"><span>Title</span></td><td width="75%"><span>'.$summaryDetails->title.'</span></td></tr>
                	<tr><td><span>Topic</span></td><td><span>'.$summaryDetails->problem.'</span></td></tr>
                	<tr class="light-gray"><td><span>Add Date</span></td><td><span>'.date('d M, Y',strtotime($summaryDetails->add_date)).'</span></td></tr>
                	<tr><td><span>Response</span></td><td><span>'.$summaryDetails->solution.'</span></td></tr>
                	
                </table>';
	}
	public function actionNewsUpdates()
	{	
		$criteria			=	new CDbCriteria();
		$criteria->condition=	'(published =:published and status =:status )';
		$criteria->params 	=	array('published'=>1,'status'=>1);
		$criteria->order	=	'add_date DESC';
		$count				=	News::model()->count($criteria);
		$pages				=	new CPagination($count);
		$pages->pageSize	=	5;
		$pages->applyLimit($criteria);
		$news				=	News::model()->findAll($criteria);
		$criteria2			=	new CDbCriteria();
		$criteria2->condition= '(published =:published and status =:status )';
		$criteria2->params 	= array('published'=>1,'status'=>1);
		$count				=	Events::model()->count($criteria2);
		$pages2				=	new CPagination($count);
		$pages2->pageSize	=	5;
		$pages2->applyLimit($criteria2);
		$events				=	Events::model()->findAll($criteria2);
		$this->render('newsUpdates',array('news'=>$news,'pages'=>$pages,'pages2'=>$pages2,'events'=>$events));
	}
	public function actionCareerOptionsAjax($id)
	{	
		
		$resultList	=	CareerOptionsHasSubjects::model()->findAllByAttributes(array('subjects_id'=>$id));
	    $this->renderPartial('_careerOptionsAjax',array('resultList'=> $resultList), false, true);
	}
	public function actionExploreColleges()
	{
		$userTest				=	UserReports::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId));
		if($userTest==0){
			Yii::app()->user->setFlash('redirect',"Take the Test to Get Started");
			$this->redirect(Yii::app()->createUrl('/user/tests'));
		}
		$model	=	new Collage;
		$criteria			=	new CDbCriteria();
		$criteria->condition= '(activation =:activation and status =:status )';
		$criteria->params 	= array('activation'=>1,'status'=>1);
		$count				=	Collage::model()->count($criteria);
		$pages				=	new CPagination($count);
		$pages->pageSize	=	5;
		$pages->applyLimit($criteria);
		$Institutes				=	Collage::model()->findAll($criteria);
		
		$shortListed = UserProfilesHasInstitutes::model()->findAll('user_profiles_id=:id', array(':id'=>Yii::app()->user->profileId));
		$shortList	=	array();
		foreach($shortListed as $col)
			$shortList[]	=	$col->institutes_id;
			
		$this->render('collage',array('model'=>$model,'Institutes'=>$Institutes,'pages'=>$pages,'shortList'=>$shortList));
	}
	public function actionShortListedColleges()
	{	
		$collegesList =	UserProfilesHasInstitutes::model()->findAllByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'status'=>1,'published'=>1));
		$this->render('shortListedColleges',array('collegesList'=>$collegesList));
	}
	
	
	public function actionUserShortlistTestRemove($id)
	{	
		$record_exists = UserProfilesHasTest::model()->exists('id = :institutes and user_profiles_id=:id', array(':institutes'=>$id,':id'=>Yii::app()->user->profileId));
		if($record_exists==1)
		{
			UserProfilesHasTest::model()->findByPk($id)->delete();
			//$dat->delete();
			echo 'This test is removed from your list now.';die;	
		}else
		echo 'not found';
	}
	public function actionUserShortlistTest($id)
	{	
		$record_exists = UserProfilesHasTest::model()->exists('entrance_exams_id = :institutes and user_profiles_id=:id', array(':institutes'=>$id,':id'=>Yii::app()->user->profileId));
		if($record_exists==1)
		{
			echo 'This test is already added. Please choose another.';die;	
		}
		else{
			$preffred						=	new UserProfilesHasTest;
			$preffred->entrance_exams_id	=	$id;
			$preffred->user_profiles_id		=	Yii::app()->user->profileId;
			$preffred->add_date				=	date('Y-m-d');
			if($preffred->save()){
				echo 'Test is successfully added.';die;
			}
		}
		
		
	}
	
	public function actionTestDetails($id)
	{
		$test		=	EntranceExams::model()->findByPk($id);
		$this->renderPartial('_entranceExams',array('test'=>$test), false,true);
	}
	
	public function actionDynamicCourse()
	{	
		$getId = '';
			if(!empty($_POST['Institutes']['courses_id'])) 
				$getId 	= $_POST['Institutes']['courses_id'];
				$data	=	CourseStream::model()->findAll('courses_id =:parent_id',array(':parent_id'=>(int) $getId));
				$data	=	CHtml::listData($data,'id','title');
				echo '<option value="0">Please Select</option>';
			foreach($data as $value=>$name){
				echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
			}
			
		die;

		
	}
	public function actionDynamicSearchResult()
	{	
		/*$getId = '';
		$city 					=	(isset($_POST['Collage']['city_id']))?$_POST['Collage']['city_id']:'';
		$courses 				=	(isset($_POST['Collage']['courses_id']))?$_POST['Collage']['courses_id']:'';
		$specialisation 		=	(isset($_POST['Collage']['specialisation']))?$_POST['Collage']['specialisation']:'';
		
		
		if($courses!='' && $specialisation!='')
			$list	=	CollagesCoursesSpecialization::model()->findAllByAttributes(array('courses_id'=>$courses,'specialization_id'=>$specialisation));
		elseif($courses!=''){
			$list	=	CollagesCoursesSpecialization::model()->findAllByAttributes(array('courses_id'=>$courses));
		}elseif($specialisation!='')
			$list	=	CollagesCoursesSpecialization::model()->findAllByAttributes(array('specialization_id'=>$specialisation));
		else
			$list	=	CollagesCoursesSpecialization::model()->findAll();
		*/
		
		
		
		
		$value	=	(isset($_POST['search']))?$_POST['search']:'';
		if(!empty($value)){
			
			$sqlProvider = new CSqlDataProvider('select * from collages_courses_specialization as t,collage as COL,courses as C,specialization as S where t.collage_id=COL.id and t.specialization_id=S.id and t.courses_id=C.id AND (COL.name LIKE "%'.$value.'%" OR C.title LIKE "%'.$value.'%" OR S.title LIKE "%'.$value.'%")');
$sqlProvider = $sqlProvider->getData();
//$sqlData = $sqlProvider[0];
$this->widget('zii.widgets.CDetailView', array('data' => $sqlData,));
die;


	/*		
			$criteria = new CDbCriteria();
			$criteria->with = array('collage' => array('alias'=>'COL'));
			$criteria->condition = "t.collage_id=COL.id";
			//$criteria->addCondition('COL.name LIKE :key');
			$criteria2 = new CDbCriteria;
			$criteria2->with = array('courses' => array('alias'=>'C'));
			$criteria2->condition = "(t.courses_id=C.id)";
			$criteria2->addCondition('C.title LIKE :key');
			//$criteria->mergeWith($criteria2, 'OR');
			$criteria3 = new CDbCriteria;
			$criteria3->with = array('specialization' => array('alias'=>'S'));
			$criteria3->condition = "(t.specialization_id=S.id)";
			$criteria3->addCondition('S.title LIKE :key');
			//$criteria->mergeWith($criteria3, 'OR');
			$criteria->params = array(':key' => '"%'.$value.'%"');
			$list	=	CollagesCoursesSpecialization::model()->findAll($criteria);*/
		}
		CVarDumper::dump($sqlProvider,10,1);
		die;
		foreach($list as $collage){
			if(($city!='' && $collage->collage->city_id == $city) || $city == ''){
				echo '<div class="coll_right_main_outer" >
                     <div class="coll_top_row">
                         <div class="coll_top_part">
                            <div class="coll_logo"><img alt="" src="'.Yii::app()->theme->baseUrl.'/images/coll_logo.png"></div>   
                             <div class="head_text_coll">'.CHtml::link($collage->collage->name,array('user/collage','id'=>$collage->collage->id)).'<br>
                              <span>'.$collage->collage->address1.'</span>
                             </div>
                        </div>
                      
                        <div class="coll_top_part2">
                            
                        <div class="orange_div"><input type="checkbox" class="css-checkbox" id="box_11">
						<a href="#" id="'.Yii::app()->createUrl('user/UserShortlistCollage',array('id'=>$collage->collage->id)).'" class="add_college'.$collage->collage->id.' css-label">Shortlist College</a>
				       </div>
                        </div>
                       
                        <div class="content_div">'.$collage->courses->title.'<span> ('.$collage->specialization->title.')</span></div>
                     </div>
					 
                      <script>
						$(".add_college'.$collage->collage->id.'").click(function(){
							$url	=	this.id;
							$.ajax({		 
								type:"GET",
								url: $url,
								data: "college",
								success:function(data){
										
										 
								}
							});

						});
				  </script>     
                   </div>';
			}	
		}
		die;
	}
	public function actionUserShortlistCollage($id)
	{	
		$record_exists = UserProfilesHasInstitutes::model()->exists('institutes_id = :institutes and user_profiles_id=:id', array(':institutes'=>$id,':id'=>Yii::app()->user->profileId));
		if($record_exists==1)
		{
			echo '<h1>This College has already been added. Please choose another.</h1>';die;	
		}
		else{
			$stream	=	Collage::model()->findByPk($id);
			$preffred	 = new UserProfilesHasInstitutes;
			if(isset($_REQUEST)){
				$preffred->institutes_id		=	$id;
				$preffred->user_profiles_id		=	Yii::app()->user->profileId;
				$preffred->add_date				=	date('Y-m-d H:i:s');
				$preffred->status				=	1;
				$preffred->published			=	1;
				if($preffred->save()){
					echo '<h1>Successfully added '.$stream->name.' </h1>';die;
				}
	
			}
				echo '<h1>somethig bad</h1>';die;
				
		}
		
		
	}
	public function actionUserPrefferdCareer($id)
	{	
		$career					=	CareerDetails::model()->findAllByAttributes(array('status'=>1,'published'=>1,'career_options_id'=>$id));
		$this->renderPartial('_userPrefferdCareer',array('list'=>$career), false,true);
	}		
	public function actionNews($id)
	{	
		
		$News			=	News::model()->findByAttributes(array('id'=>$id,'published'=>1,'status'=>1));
	    $this->render('news',array('news'=>$News));
	}
	public function actionApplication()
	{
		$criteria=new CDbCriteria;
		if(isset($_POST['level']) && !empty($_POST['level']))
			$criteria->addCondition("level='{$_POST['level']}'");
		if(isset($_POST['category']) && !empty($_POST['category']))
			$criteria->addCondition("career_category like '%{$_POST['category']}%'");
		
		$model		=	EntranceExams::model()->FindAll($criteria);
		$selected	=	UserProfilesHasTest::model()->findAll('user_profiles_id=:id', array(':id'=>Yii::app()->user->profileId));
		$this->render('application',array('model'=>$model,'selmodel'=>$selected));
	}
	public function actionReadEvent($id)
	{
		$event		=	Events::model()->findByPk($id);
		$this->render('readEvent',array('event'=>$event));
	}
	
	
	public function actionAutoComplete()
	{
		$res =array();
		
		if (isset($_GET['term'])) {
			$sql = 'SELECT col.name as label, ccs.id as value FROM collages_courses_specialization as ccs,collage as col where ccs.collage_id=col.id';
			$sql = $sql . ' and col.name LIKE :label';
			$command =Yii::app()->db->createCommand($sql);
			$command->bindValue(":label", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			echo json_encode ($command->queryAll());
		}
	}
	
	public function actionSearch()
	{	

		$qterm	=(isset($_REQUEST['term']))?'%'.$_REQUEST['term'].'%':'%%';
		$criteria->condition = '(name  Like :qterm OR address Like :qterm)';
		$criteria->params = array(':qterm'=>$qterm);
		$dataProvider=new CActiveDataProvider('Schools', array(
							'criteria'=>$criteria,
							'pagination'=>array(
								'pageSize'=>10,
							),
						));
		
		$this->render('search',array('fech_result'=>$dataProvider));
	}
	public function actionTestMail()
	{
	 
		$data['name']		=	'Dear user';
		$data['email']		=	'jagraj2007@hotmail.com';
		$data['password']	=	'kjsdfjds';
		$data['code']	=	$this->createAbsoluteUrl('site/checkUser',array('email'=>base64_encode('jagraj2009@hotmail.com')));
		 $this->sendMail($data,'register'); die;
		
	}
	public function actionChangePassword()
	{	
		$id=Yii::app()->user->userId;
		$model=new Changepassword();
		 
		if(isset($_POST['Changepassword'])){
			$model->attributes = $_POST['Changepassword'];
			if($model->confirmpass != $model->newpassword ){
				Yii::app()->user->setFlash('updated',"New password is not matching with confirm password ");
				$this->redirect(Yii::app()->createUrl('user/changePassword'));
			}
			
			if($model->validate()){
				// Change the posted password to md5 hash to cmpare it with database
				$hashed_password = md5($_POST['Changepassword']['oldpassword']); 
				// Searches for the record in the database for the posted password 
				$record_exists = UserLogin::model()->exists('password = :password', array(':password'=>$hashed_password)); 
				if(!empty($record_exists)){
					//New Password posted through form  
					$posted_new_password = md5($_POST['Changepassword']['newpassword']);
					
					UserLogin::model()->updateAll(array('password'=>$posted_new_password),'id="'.$id.'"');
					Yii::app()->user->setFlash('updated',"Password changed successfully!");
					$this->redirect(Yii::app()->createUrl('user/changePassword'));
				}
				else{ 
					Yii::app()->user->setFlash('updated',"Password provided by you does not exist.Please provide the correct password");
					 $this->redirect(Yii::app()->createUrl('user/changePassword'));
				} 			
			} //validate ends
		} //isset ends
		$this->render('changepassword',array('model'=>$model));
	}
	public function sendMail($data,$type)
	{
		switch($type){
			case 'contact':
				$subject = 'Contact Us';
				$body = $this->renderPartial('/mails/contact_tpl',
										array('name' => $data['name']), true);
			break;
			case 'forget':
				$subject = 'Forgot Password';
				$body = $this->renderPartial('/mails/forgot_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
												'password'=>$data['password']), true);
			break;
			case 'register':
				$subject = 'Register';
				$body = $this->renderPartial('/mails/register_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
												'code'=>$data['code'],
												'password'=>$data['password']), true);
			break;
			default:
			break;			
		}
		$from		=	Yii::app()->params['adminEmail'];
		$to			=	$data['email'];
		$mail		=	Yii::app()->Smtpmail;
        $mail->SetFrom($from,'Gudaak');
        $mail->Subject	=	$subject;
        $mail->MsgHTML($body);
        $mail->AddAddress($to, "");		
        if(!$mail->Send()) {
		 echo 'No';die; return 0;
        }else {
			return 1;
        }
	}
	
}