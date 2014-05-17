<?php
class CounsellorController extends Controller
{
	//Default Layout will be dashboard for this controler
	public $layout='//layouts/counsellor';
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
	public function actionIndex()
	{
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		 

		$this->render('index');
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
		$this->render('talk',array('model'=>$model));
	}
	public function actionSchools()
	{
		$lists	=	CounselorHasSchools::model()->findAllByAttributes(array('counselor_id'=>Yii::app()->user->profileId));
		$lat	=	array();
		foreach($lists as $list){
			$lat[]	=	$list->schools_id;
		}
		$model	=	new Schools('search');
		if(count($lat) > 0)
			$model->id	=	$lat; 
		if(isset($_GET['Schools']))
			$model->attributes	=	$_GET['Schools'];
		$this->render('school',array('model'=>$model));
	}
	public function actionStudentDetails($id)
	{
		if(!Yii::app()->user->id)
			$this->redirect(Yii::app()->createUrl('/site'));
		$gud	=	GenerateGudaakIds::model()->findAllByAttributes(array('schools_id'=>$id));
		foreach($gud as $rec)
			$gudIdList[]	=	$rec->id;

		$model=new UserProfiles('search');
		$model->unsetAttributes();
		$model->generate_gudaak_ids_id	=	$gudIdList;
		if(isset($_GET['UserProfiles']))
			$model->attributes=$_GET['UserProfiles'];

		$this->render('studentDetails',array('model'=>$model,));
	}
	public function actionStudentDetail($id)
	{
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$userSummery		=			UserReports::model()->findAllByAttributes(array('user_profiles_id'=>$id,'status'=>1,'activation'=>1));
		$index	=	0;
		$index2	=	0;
		$uRate	=	array();
		$uRate2	=	array();
		$userInfo			=	UserProfiles::model()->findByPk($id);
		$userType=$userInfo->userLogin->user_role_id;
		if($userInfo->userLogin->user_role_id==2){
			$userFinalStream	=	UserProfilesHasStream::model()->findAllByAttributes(array('user_profiles_id'=>$id,'updated_by'=>1));		
			$CounsRecoStream	=	UserProfilesHasStream::model()->findAllByAttributes(array('user_profiles_id'=>$id,'reccomended'=>1));
			$ratingHistory		=	UserProfilesHasStream::model()->findAllByAttributes(array('user_profiles_id'=>$id));
		}
		else{
			$userFinalStream	=	UserCareerPreference::model()->findAllByAttributes(array('user_profiles_id'=>$id,'updated_by'=>1));		
			$CounsRecoStream	=	UserCareerPreference::model()->findAllByAttributes(array('user_profiles_id'=>$id,'reccomended'=>1));
			$ratingHistory		=	UserCareerPreference::model()->findAllByAttributes(array('user_profiles_id'=>$id));

	
		}

		
		$this->render('studentDetail',array('userInfo'=>$userInfo,'userFinalStream'=>$userFinalStream,'counsRecoStream'=>$CounsRecoStream,
						'summaryDetails'=>$userSummery,'ratingHistory'=>$ratingHistory,'userType'=>$userType));
	}
		
	public function actionSummaryDetails()
	{	
		$orient_items_id	=	$_REQUEST['orient_items_id'];
		$userId				=	$_REQUEST['userId'];
		$report			=	UserReports::model()->findByAttributes(array('user_profiles_id'=>$userId,'orient_items_id'=>$orient_items_id));
		$data	=	array();
		$userTest	=	array();
		$data[$report->orient_items_id]['id']=$report->orient_items_id;
		$data[$report->orient_items_id]['name']=$report->orientItems->title;
		$data[$report->orient_items_id]['description']=$report->orientItems->description;
		$userTests	=	UserScores::model()->findAllByAttributes(array('user_profiles_id'=>$userId,'test_category'=>$report->orient_items_id));
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
				}
			}
			
		}
		if($orient_items_id==3){
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
		$profile		=	 UserProfiles::model()->findByPk($userId);
		$role	=	$profile->userLogin->user_role_id;
		if($profile->userLogin->user_role_id==2)
			$this->renderPartial('_detailedReport2',array('reports'=>$data,'profile'=>$profile), false, true);
		else
			$this->renderPartial('_detailedReport',array('reports'=>$data,'profile'=>$profile), false, true);
	
	
	
	
	}
	public function actionCounsellorComments()
	{	
		$stream_id	=	$_REQUEST['stream_id'];
		$userId		=	$_REQUEST['userId'];
		$data		=	array();
		$comments	=	UserStreamComments::model()->findByAttributes(array('user_profiles_id'=>$userId,'stream_id'=>$stream_id,'status'=>1));
		$this->renderPartial('_counsellorComments',array('comments'=>$comments,true,false));
			
	}
	public function actionSession()
	{
		if(isset($_POST['action']) && $_POST['action']=='content'){
			$userId		=	$_POST['user'];
			$session	=	$_POST['session'];
			$userAns	=	UserHasSessionAns::model()->findAllByAttributes(array('user_id'=>$userId));
			$answ		=	array();
			foreach($userAns as $list){
				$answ[$list->session_question_id]	=	$list->answers;
			}
			$sess	=	SessionQuestions::model()->findAllByAttributes(array('session_id'=>$session));
			$this->renderPartial('_session',array('question'=>$sess,'ans'=>$answ));
			die;
		}
		$model	=	Session::model()->findAll();
		$this->render('session',array('model'=>$model));
	}
	public function actionProfile()
	{		
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site/'));
		}
		 
		$model		=	   Schools::model()->findByPk(Yii::app()->user->profileId);
		// CVarDumper::dump($model,10,1);die;
		if(isset($_POST['Schools']))
		{	 
			$model->attributes		=	$_POST['Schools'];
			$model->password		=	123456;
			$model->states_id		=	1;
			$model->countries_id	=	1;
	
			
			$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/schools/';
					$targetFolder = Yii::app()->request->baseUrl.'/uploads/schools/';
				if (!empty($_FILES['Schools']['name']['images'])) {
					$tempFile = $_FILES['Schools']['tmp_name']['images'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['Schools']['name']['images'];
					$pat = $targetFile;
					move_uploaded_file($tempFile,$targetFile);
					$absoPath = $pat;
					$newName = time();
					$img = Yii::app()->imagemod->load($pat);
					# ORIGINAL
					$img->file_max_size = 5000000; // 5 MB
					$img->file_new_name_body = $newName;
					$img->process('uploads/schools/original/');
					$img->processed;
					#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 129;
					$img->image_x           = 190;
					$img->file_new_name_body = $newName;
					$img->process('uploads/schools/large/');	#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 200;
					$img->image_x           = 200;
					$img->file_new_name_body = $newName;
					$img->process('uploads/schools/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->images	=	$fileName;
				if($_POST['Schools']['images']!=''){
					@unlink($targetFolder1.'original/'.$_POST['Schools']['images']);
					@unlink($targetFolder1.'small/'.$_POST['Schools']['images']);
					@unlink($targetFolder1.'large/'.$_POST['Schools']['images']);
				}
			}
			else
				$model->images	=	$_POST['Schools']['images'];
			if($model->save())
				$this->redirect(array('school/profile'));
		}
		 
		$this->render('Profile', array('model'=>$model));
	}
	
	 
	 
	//Forgot password
		//Change password 
	public function actionChangePassword()
	{
		$id=Yii::app()->user->userId;
		//get users group
		$usergroup='';                       
		
		$model=new Changepassword();
		 
		if(isset($_POST['Changepassword'])){
			$model->attributes = $_POST['Changepassword'];
			if($model->confirmpass != $model->newpassword ){
				Yii::app()->user->setFlash('updated',"New password is not matching with confirm password ");
				$this->redirect(Yii::app()->createUrl('admin/admin/changePassword'));
				
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
					 
				}
				else{ 
					Yii::app()->user->setFlash('updated',"Password provided by you does not exist.Please provide the correct password");
					 
				} 			
			} //validate ends
		} //isset ends
		$this->render('changepassword',array('model'=>$model));
	}

}