<?php
class SiteController extends Controller
{
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

	/**
	 * This is the pre load function 
	 * 
	 */
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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	/**
	 * This is the Register  User 'userRegister' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionNewUser()
	{
		
		$model	=	new Register;
		if(isset($_POST['Register']))
		{
						
			$model->attributes		=	$_POST['Register'];
			$model->display_name	=	$model->first_name;
			$model->image			=	'noimage.jpg';
			$model->add_date		=	date('Y-m-d H:i:s');
			$model->semd_mail		=	1;
				$user	 = new  UserLogin();
				$user->username			=	$_POST['Register']['username'];
				$user->password			=	md5($_POST['Register']['password']);
				$user->add_date			=	date('Y-m-d H:i:s');
				$user->block			=	0;
				$user->activation		=	1;
				$user->user_role_id		=	2;
				$model->user_login_id	=	1;
				$valid					=	$model->validate();
				$valid					=	$user->validate() && $valid;
				if($valid){
					if($user->save()){
						$model->user_login_id	=	$user->id;
						if($model->save()){
							$body = $this->renderPartial('../mailtemplates/reg_mail_tpl',array('email'=>$_POST['Register']['email'],'password'=>$_POST['Register']['password']), true);
							$to = $_POST['Register']['email'];
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers .= "From: ".Yii::app()->params['adminEmail']."\r\nReply-To: ".Yii::app()->params['adminEmail'];  
							$subject = "Account Details";
							 
							mail($to,$subject,$body,$headers);
							$this->redirect(array('site/login'));
							Yii::app()->user->setFlash('register','Check email .');
							Yii::app()->user->setFlash('create','Thank you for join us.');
							$this->redirect(array('site/userRegister'));
							die;
						}
						else {
								
							Yii::app()->user->setFlash('error','Please fill up carefully all field are mandatory.');
							$this->redirect(array('site/userRegister'));
							die;
						}
					}
				}
		}

		$this->renderPartial('newUser', array('model'=>$model), false, true);
	}
	
	public function actionUserRegister()
	{	

		$model	=	new Register;
		
			if(isset($_POST['Register']))
			{
						
				$model->attributes		=	$_POST['Register'];
				$model->display_name	=	$model->first_name.' '.$model->last_name;
				$model->image			=	'noimage.jpg';
				$model->add_date		=	date('Y-m-d H:i:s');
				$model->semd_mail		=	1;
				
				$gudaak_id				=	$model->gudaak_id;
				
					$record_exists = GenerateGudaakIds::model()->exists('gudaak_id  = :gudaak ', array(':gudaak'=>$gudaak_id )); 
					$gudaakId	=	GenerateGudaakIds::model()->findByAttributes(array('gudaak_id'=>$gudaak_id));
					 
					if($record_exists==1 AND $gudaak_id !='' ){
					
						$user	 = new  UserLogin();
						$user->username			=	$_POST['Register']['email'];
						$user->password			=	md5($_POST['Register']['password']);
						$user->add_date			=	date('Y-m-d H:i:s');
						$user->block			=	0;
						$user->activation		=	1;
						$user->user_role_id		=	2;
						$model->user_login_id	=	1;
						$model->generate_gudaak_ids_id	=	1;
						
						$valid					=	$model->validate();
						$valid					=	$user->validate() && $valid;
						
					if($valid){
						if($user->save()){
							
							$model->user_login_id			=	$user->id;
							$model->generate_gudaak_ids_id	=	$gudaakId->id;
							
							if($model->save()){
								$body = $this->renderPartial('../mailtemplates/reg_mail_tpl',array('email'=>$_POST['Register']['email'],'password'=>$_POST['Register']['password']), true);
								$to = $_POST['Register']['email'];
								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers .= "From: ".Yii::app()->params['adminEmail']."\r\nReply-To: ".Yii::app()->params['adminEmail'];  
								$subject = "Account Details";
								 
								mail($to,$subject,$body,$headers);
								$this->redirect(array('site/login'));
								Yii::app()->user->setFlash('register','Check email .');
								Yii::app()->user->setFlash('create','Thank you for join us.');
								$this->redirect(array('site/userRegister'));
								die;
							}
							else {
									
								Yii::app()->user->setFlash('error','Please fill up carefully all field are mandatory.');
								$this->redirect(array('site/userRegister'));
								die;
							}
						}
					}
					
				}
				else{
					
						$this->redirect(array('site/userRegister'));
						
			
				}
			
			
		}
				
		$this->render('userRegister',array('model'=>$model));
	}
	public function actionCheckUser()
	{//echo 'hello1';die;
		
		$user		=	$_GET['Register']['username'];
			$record_exists = UserLogin::model()->exists('username = :username', array(':username'=>$user));   			
			if($user !=''){
				if($record_exists==1){
					$result		=	'User is not available.';
					echo CJSON::encode($result); exit;
				}
				else{
					$result		=	'User is  available.';
					echo CJSON::encode($result); exit;
				}
			}
			else{
					$result		=	'Please fill user first.';
					echo CJSON::encode($result); exit;
			}
			
		
	}
	//Forgot password
	public function actionForgetPassword()
	{
		$model=new ForgotpasswordForm;
		if(isset($_POST['ForgotpasswordForm'])){
			$model->attributes=$_POST['ForgotpasswordForm'];
			if($model->validate())
			{
				//Searches for the record in the database for the posted email 
				$record_exists = UserProfiles::model()->exists('email = :email', array(':email'=>$_POST['ForgotpasswordForm']['email']));   				
				if($record_exists==1){
					$record = UserProfiles::model()->findByAttributes(array('email'=>$_POST['ForgotpasswordForm']['email'])); 
					//Generates a random number  
					$random_number = rand(99999,9999999);
					/*  Actual Code to be used  */
					$body = $this->renderPartial('/mailtemplates/forgotpassword_mail_tpl',array('userfullname'=>$record->display_name,'email' => $record->email,'password'=>$random_number), true);
					
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= "From: ".Yii::app()->params['adminEmail']."\r\nReply-To: ".Yii::app()->params['adminEmail'];                 	$subject = "Account Details";
					if(mail($record->email,$subject,$body,$headers)){
						$id = $record->id;
						//Can be encodeed id used md5
						$new_password = $random_number;
						//Updates the password with the same random nunber which has been e-mailed to the account holder
						UserProfiles::model()->updateAll(array('password'=>$new_password),'id="'.$record->id.'"');
						Yii::app()->user->setFlash('new_password_message','Your new password has been sent to the email you provided.');
						$this->refresh();
					} 
					else
						Yii::app()->user->setFlash('error',"Sorry mail could not be sent this time!Please try again.");					
					}
				else{
						Yii::app()->user->setFlash('error',"The details provided by you does not match our records!");
				}
			} //validate ends
		}
		$this->render('forgetPassword', array('model'=>$model));
		
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
		
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{	
		$this->layout='//layouts/page';
	
		$model=new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			  
			if($model->login()){
				   
				Yii::app()->user->setFlash('success','You are sucessfully logged in.');
				if(Yii::app()->user->userType=='admin'){
					$this->redirect(Yii::app()->createUrl('/admin/admin'));
					
				}
				if(Yii::app()->user->userType=='user'){
					$this->redirect(Yii::app()->createUrl('/user/index'));
					
				}	
			}
			else{
				Yii::app()->user->setFlash('login','Email or password not valid.');
			}
			
		}
		else{	
				
		}
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	 
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
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
												'password'=>$data['password']), true);
			break;
			default:
			break;			
		}
		$from		=	Yii::app()->params['adminEmail'];
		$to			=	$data['email'];
		$mail		=	Yii::app()->Smtpmail;
        $mail->SetFrom($from,'Venturepact');
        $mail->Subject	=	$subject;
        $mail->MsgHTML($body);
        $mail->AddAddress($to, "");		
        if(!$mail->Send()) {
            return 0;
        }else {
			return 1;
        }
	}
}