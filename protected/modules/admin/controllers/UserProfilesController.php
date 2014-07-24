<?php

class UserProfilesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '/layouts/admin', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','studentDetail'),
				'expression' =>"Yii::app()->user->userType ==  'admin'",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		
		$this->render('view',array('model'=>$this->loadModel($id),));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UserProfiles;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserProfiles']))
		{
			$model->attributes=$_POST['UserProfiles'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/user/';
			if (!empty($_FILES['UserProfiles']['name']['image'])) {
				$tempFile = $_FILES['UserProfiles']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['UserProfiles']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/user/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/user/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}else{
				$model->image	=	'noimage.jpg';
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserProfiles']))
		{
			$model->attributes=$_POST['UserProfiles'];
			$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/user/';
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/user/';
			if (!empty($_FILES['UserProfiles']['name']['image'])) {
				$tempFile = $_FILES['UserProfiles']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['UserProfiles']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/user/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/user/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/user/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
				if(isset($_POST['UserProfiles']['oldImage']) && $_POST['UserProfiles']['oldImage']!='noimage.jpg'){
					@unlink($targetFolder1.'original/'.$_POST['UserProfiles']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['UserProfiles']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['UserProfiles']['oldImage']);
				}
			}
			else
				$model->image	=	$_POST['UserProfiles']['oldImage'];
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionStudentDetail($id)
	{
		$userSummery		=			UserReports::model()->findAllByAttributes(array('user_profiles_id'=>$id,'status'=>1,'activation'=>1));
		$index	=	0;
		$index2	=	0;
		$uRate	=	array();
		$uRate2	=	array();
		$userInfo			=	UserProfiles::model()->findByPk($id);
		$userType=$userInfo->userLogin->user_role_id;
		if($userInfo->userLogin->user_role_id==2){
			$preffred	=	new	UserProfilesHasStream;
			if(isset($_POST['UserProfilesHasStream'])){
				$preffred->attributes			=	$_POST['UserProfilesHasStream'];
				$preffred->user_profiles_id		=	$id;
				$preffred->counsellor_id		=	Yii::app()->user->profileId;
				$preffred->add_date				=	date('Y-m-d H:i:s');
				$preffred->self					=	0;
				$preffred->default				=	0;
				$preffred->status				=	0;
				$preffred->reccomended			=	1;
				$preffred->save();
			}
		
		
		
		
			$userFinalStream	=	UserProfilesHasStream::model()->findAllByAttributes(array('user_profiles_id'=>$id,'updated_by'=>1));		
			$CounsRecoStream	=	UserProfilesHasStream::model()->findAllByAttributes(array('user_profiles_id'=>$id,'reccomended'=>1));
			$ratingHistory		=	UserProfilesHasStream::model()->findAllByAttributes(array('user_profiles_id'=>$id),array('order'=>'self DESC'));
		}
		else{
			$preffred	=	new	UserCareerPreference;
			if(isset($_POST['UserCareerPreference'])){
				$preffred->attributes			=	$_POST['UserCareerPreference'];
				$preffred->user_profiles_id		=	$id;
				$preffred->counsellor_id		=	Yii::app()->user->profileId;
				$preffred->add_date				=	date('Y-m-d H:i:s');
				$preffred->modified_date		=	date('Y-m-d H:i:s');
				$preffred->self					=	0;
				$preffred->default				=	0;
				$preffred->status				=	0;
				$preffred->reccomended			=	1;
				$preffred->save();
			}
		

			$userFinalStream	=	UserCareerPreference::model()->findAllByAttributes(array('user_profiles_id'=>$id,'updated_by'=>1));		
			$CounsRecoStream	=	UserCareerPreference::model()->findAllByAttributes(array('user_profiles_id'=>$id,'reccomended'=>1));
			$ratingHistory		=	UserCareerPreference::model()->findAllByAttributes(array('user_profiles_id'=>$id),array('order'=>'self DESC'));

	
		}
		
		
		$this->render('studentDetail',array('userInfo'=>$userInfo,'userFinalStream'=>$userFinalStream,'counsRecoStream'=>$CounsRecoStream,
						'summaryDetails'=>$userSummery,'ratingHistory'=>$ratingHistory,'userType'=>$userType,'model'=>$preffred));
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
	public function actionSessionList($id)
	{
		if(isset($_POST['action']) && $_POST['action']=='content'){
			$userId		=	$_POST['user'];
			$session	=	$_POST['session'];
			$userAns	=	UserSessionQuestions::model()->findAllByAttributes(array('user_id'=>$userId));
			$answ		=	array();
			foreach($userAns as $list){
				$answ[$list->session_questions_id]	=	$list->answer;
			}
			$sess	=	SessionQuestions::model()->findAllByAttributes(array('session_id'=>$session,'status'=>1));
			$this->renderPartial('_session',array('question'=>$sess,'ans'=>$answ));
			die;
		}
		$model	=	Session::model()->findAll(array("condition"=>'status = 1'));
		$this->render('session',array('model'=>$model,'id'=>$id));
	}
	public function actionSession()
	{
		if(isset($_POST['action']) && $_POST['action']=='content'){
			$userId		=	$_POST['user'];
			$session	=	$_POST['session'];
			$userAns	=	UserSessionQuestions::model()->findAllByAttributes(array('user_id'=>$userId));
			$answ		=	array();
			foreach($userAns as $list){
				$answ[$list->session_questions_id]	=	$list->answer;
			}
			$sess	=	SessionQuestions::model()->findAllByAttributes(array('session_id'=>$session,'status'=>1));
			$this->renderPartial('_session',array('question'=>$sess,'ans'=>$answ));
			die;
		}
		
	}
	public function actionSessionSave()
	{
		foreach($_POST['question'] as $key=>$val){
			$userAns	=	UserSessionQuestions::model()->findByAttributes(array('session_questions_id'=>$key,'user_id'=>$_POST['user']));
			if(empty($userAns))
				$userAns	=	new UserSessionQuestions;
			
			$userAns->user_id				=	$_POST['user'];
			$userAns->session_questions_id	=	$key;
			$userAns->answer				=	$val;
			$userAns->add_date				=	date('Y-m-d H:i:s');
			$userAns->status				=	1;
			if($userAns->save() && $userAns->sessionQuestions->controller_type=='textarea' && !empty($val)){
				$log					=	Summary::model()->findByAttributes(array('user_profile_id'=>$_POST['user'],'event_id'=>$userAns->sessionQuestions->session_id,'schools_id'=>Yii::app()->user->profileId));
				if(empty($log))
					$log				=	new Summary;
				$log->user_profile_id	=	$_POST['user'];
				$log->schools_id		=	Yii::app()->user->profileId;
				$log->event_id			=	$userAns->sessionQuestions->session_id;
				$log->topic				=	'Counsellor session';
				$log->event				=	'Summery for counsellor session';
				$log->remarks			=	$val;
				$log->add_date			=	date('Y-m-d H:i:s');
				$log->status			=	1;
				$log->save();
			}
			
		}
		echo 'Saved you session for this user';
		die;
	}
	public function actionDetailedReport($id)
	{	
		$userTest				=	UserReports::model()->countByAttributes(array('user_profiles_id'=>$id));
		if($userTest <= 1){
			echo "This user dont have both personality and interest tests.";
			die;
		}
		
		$userReports			=	UserReports::model()->findAllByAttributes(array('user_profiles_id'=>$id),array('order'=> 'orient_items_id ASC'));
		$data					=	array();
		$userTestDate			=	UserReports::model()->findByAttributes(array('user_profiles_id'=>$id));
		foreach($userReports as $report){
			$userTest	=	array();
			$data[$report->orient_items_id]['id']=$report->orient_items_id;
			$data[$report->orient_items_id]['name']=$report->orientItems->title;
			$data[$report->orient_items_id]['description']=$report->orientItems->description;
			$userTests	=	UserScores::model()->findAllByAttributes(array('user_profiles_id'=>$id,'test_category'=>$report->orient_items_id));
			
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

		$profile		=	 UserProfiles::model()->findByPk($id);
		$this->renderPartial('detailedReport',array('reports'=>$data,'profile'=>$profile,'userTestDate'=>$userTestDate));
	}
	
	
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('UserProfiles');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserProfiles('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserProfiles']))
			$model->attributes=$_GET['UserProfiles'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserProfiles the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserProfiles::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserProfiles $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-profiles-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
