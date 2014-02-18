<?php
class SchoolController extends Controller
{
	//Default Layout will be dashboard for this controler
	public $layout='//layouts/schools';
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
	public function beforeAction() 
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
	public function actionStudentDetails()
	{
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$model=new UserProfiles('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserProfiles']))
			$model->attributes=$_GET['UserProfiles'];

		$this->render('studentDetails',array('model'=>$model,));
	}
	public function actionStudentDetail($id)
	{
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$index	=	0;
		$index2	=	0;
		$uRate	=	array();
		$uRate2	=	array();
		$userInfo			=	UserProfiles::model()->findByPk($id);
		$userFinalStream	=	UserProfilesHasStream::model()->findAllByAttributes(array('user_profiles_id'=>$id,'self'=>1));
		foreach($userFinalStream as $list){
			$rating	=$list->stream_id;
			$userStreamRating	=	UserStreamRating::model()->findAllByAttributes(array('user_profiles_id'=>$id,'stream_id'=>$rating));
			foreach($userStreamRating as $userStreamRate){
				$uRate[$index]['rating']	=	$userStreamRate->rating;
				$uRate[$index]['stream_id']	=	$userStreamRate->stream_id;
				 
				$index++;
				 
			}
			 
		}		
		$CounsRecoStream	=	UserProfilesHasStream::model()->findAllByAttributes(array('user_profiles_id'=>$id,'self'=>1,'reccomended'=>1));
		foreach($CounsRecoStream as $CounsReco){
			$rating	=$CounsReco->stream_id;
			$userStreamRating2	=	UserStreamRating::model()->findAllByAttributes(array('user_profiles_id'=>$id,'stream_id'=>$rating));
			foreach($userStreamRating2 as $userStreamRate2){
				$uRate2[$index2]['rating2']	=	$userStreamRate2->rating;
				$uRate2[$index2]['sId']	=	$userStreamRate2->stream_id;
				 
				$index2++;
				 
			}
			 
		}
		$userSummery		=			UserReports::model()->findAllByAttributes(array('user_profiles_id'=>$id,'status'=>1,'activation'=>1));
		$ratingHistory		=	 		UserStreamRating::model()->findAllByAttributes(array('user_profiles_id'=>$id));
		$this->render('studentDetail',array('userInfo'=>$userInfo,'userFinalStream'=>$userFinalStream,
						'counsRecoStream'=>$CounsRecoStream,'uRate2'=>$uRate2,'userStreamRating'=>$uRate,
						'summaryDetails'=>$userSummery,'ratingHistory'=>$ratingHistory));
	}
	public function actionProfile()
	{		
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site/'));
		}
		 
		$model		=	  Schools::model()->findByPk(Yii::app()->user->profileId);
		if(isset($_POST['Schools']))
		{	 
			$model->attributes		=	$_POST['Schools'];
			$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/schools/';
					$targetFolder = Yii::app()->request->baseUrl.'/uploads/user/';
				if (!empty($_FILES['Schools']['name']['image'])) {
					$tempFile = $_FILES['Schools']['tmp_name']['image'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['Schools']['name']['image'];
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
					$img->image_y         	= 50;
					$img->image_x           = 50;
					$img->file_new_name_body = $newName;
					$img->process('uploads/schools/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
				if($_POST['Schools']['oldImage']!=''){
					@unlink($targetFolder1.'original/'.$_POST['Schools']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['Schools']['oldImage']);
				}
			}
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