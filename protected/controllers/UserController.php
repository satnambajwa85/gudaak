<?php
class UserController extends Controller
{
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
		   'upload'=>array(
			'class'=>'xupload.actions.XUploadAction',
			'path' =>Yii::app()->baseUrl. "/uploads/user/small/",
			'publicPath' => Yii::app() ->baseUrl. "/uploads/user/small/",
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
	public function actionEditProfile()
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site/'));
		}
		$model		=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		if(isset($_POST['UserProfiles']))
		{
			
			$model->attributes		=	$_POST['UserProfiles'];
			$model->display_name 	=	$_POST['UserProfiles']['first_name'].' '.$_POST['UserProfiles']['last_name'];
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
					$img->image_y         	= 335;
					$img->image_x           = 1800;
					$img->file_new_name_body = $newName;
					$img->process('uploads/user/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 50;
					$img->image_x           = 50;
					$img->file_new_name_body = $newName;
					$img->process('uploads/user/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
				if($_POST['UserProfiles']['oldImage']!=''){
					@unlink($targetFolder1.'original/'.$_POST['UserProfiles']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['UserProfiles']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['UserProfiles']['oldImage']);
				}
			}
			if($model->save())
				$this->redirect(array('user/editProfile'));
		}
		$this->render('editProfile', array('model'=>$model));
	}
	public function actionTest()
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site/'));
		}
		$questions	=	Questions::model()->FindAllByAttributes(array('orient_items_id'=>2,'published'=>1,'status'=>1));
		$quest		=	array();
		foreach($questions as $question){
			$quest[$question->id]['id']	=	$question->id;
			$quest[$question->id]['title']	=	$question->title;
			$options	=	QuestionOptions::model()->FindAllByAttributes(array('questions_id'=>$question->id,'activation'=>1,'status'=>1));
			if(!empty($options))
			foreach($options as $option){
				$quest[$question->id]['option'][$option->id]	=	$option->name;
			}
			else
				$quest[$question->id]['option'][]	=	'';
		}
		//echo '<pre>';print_r($quest);die;
		$model	=	new TestReports;
		if(!empty($_POST['TestReports'])){
			$model->attributes = $_POST['TestReports'];
			CVarDumper::dump($model->attributes,10,1);die;
		}
		$this->render('test', array('questions'=>$quest,'model'=>$model));
	}	
	public function actionTests($view)
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site'));
		}
		$test	=	array();
                        
		switch ($view){
			case 'Interest':
				
				break;
			case 'personality':
				
				break;
			 
		}
		//(array('view','id'=>$model->id));
		$this->render('userTest',array('test'=>$test));
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
		
		$this->render('career');
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