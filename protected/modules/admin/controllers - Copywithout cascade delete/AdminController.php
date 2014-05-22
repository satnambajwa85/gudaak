<<<<<<< HEAD
<?php

class adminController extends Controller
{
	public $layout='/layouts/admin';
	public function actionIndex()
	{	if(Yii::app()->user->id && Yii::app()->user->userType=='admin'){
			  $activeMember		=	UserLogin::model()->countByAttributes(array('status'=>1,'activation'=>1));
		$this->render('index',array('activeMember'=>$activeMember));
		die;
		}
		$this->redirect(array('/site/'));
	}
	public function actionGraph()
	{	if(Yii::app()->user->id && Yii::app()->user->userType=='admin'){
			  
		$this->render('graph');
		die;
		}
		$this->redirect(array('/site/'));
	}
	public function actionAccountUpdate()
	{	if(Yii::app()->user->id && Yii::app()->user->userType=='admin'){
			  
		
		$model	=	 Register::model()->findByPk(Yii::app()->user->profileId);
		
		if(isset($_POST['Register']))
		{
			$model->attributes		=	$_POST['Register'];
			$valid					=	$model->validate();
			if($valid){
				
					if($model->save()){
						Yii::app()->user->setFlash('updated','Your profile have been updated successfully.');
					}
			
				
			}
				
			
		}
				$this->render('accountUpdate',array('model'=>$model)); 
		
		}
		
	}
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
 
 
=======
<?php

class adminController extends Controller
{
	public $layout='/layouts/admin';
	public function actionIndex()
	{	if(Yii::app()->user->id && Yii::app()->user->userType=='admin'){
			  $activeMember		=	UserLogin::model()->countByAttributes(array('status'=>1,'activation'=>1));
		$this->render('index',array('activeMember'=>$activeMember));
		die;
		}
		$this->redirect(array('/site/'));
	}
	public function actionGraph()
	{	if(Yii::app()->user->id && Yii::app()->user->userType=='admin'){
			  
		$this->render('graph');
		die;
		}
		$this->redirect(array('/site/'));
	}
	public function actionAccountUpdate()
	{	if(Yii::app()->user->id && Yii::app()->user->userType=='admin'){
			  
		
		$model	=	 Register::model()->findByPk(Yii::app()->user->profileId);
		
		if(isset($_POST['Register']))
		{
			$model->attributes		=	$_POST['Register'];
			$valid					=	$model->validate();
			if($valid){
				
					if($model->save()){
						Yii::app()->user->setFlash('updated','Your profile have been updated successfully.');
					}
			
				
			}
				
			
		}
				$this->render('accountUpdate',array('model'=>$model)); 
		
		}
		
	}
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
 
 
>>>>>>> 83cb3943f11d952557ac2d471d879ed15a76ac0c
}