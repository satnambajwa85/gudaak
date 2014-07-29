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
		$this->render('index');
	}
	public function actionAssess()
	{
		$this->render('assess');
	}	
	public function actionExplore()
	{
		
		$this->render('explore');
	}
	public function actionApproach()
	{
		
		$this->render('approach');
	}
	public function actionIndex4()
	{
		
		$this->render('index4');
	}
	public function actionWhat()
	{	
		
		$this->render('_whatGudaak');
	
	}
	public function actionWhy()
	{	
		$this->render('_whyGudaak');
	
	}
	public function actionArticles(){
		$this->layout 		= 'frontDashboard';
		$criteria			=	new CDbCriteria();
		$criteria->condition= '(published =:published and status =:status )';
		$criteria->params 	= array('published'=>1,'status'=>1);
		$count				=	Articles::model()->count($criteria);
		$articles			=	Articles::model()->findAll($criteria);
		$this->render('articlesList',array('articles'=>$articles));
	}
	
	public function actionArticle($id)
	{	
		$this->layout = 'frontDashboard';
		$result		=	Articles::model()->findByAttributes(array('id'=>$id));
		$model		=	new ArticlesComments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ArticlesComments']))
		{
			$model->attributes	=	$_POST['ArticlesComments'];
			$model->add_date	=	date('Y-m-d H:i:s');
			$model->articles_id	=	$id;
			if($model->save())
				$this->redirect(array('site/article','id'=>$id));
		}
		$comments	=	ArticlesComments::model()->findAllByAttributes(array('articles_id'=>$id));

		$this->render('article',array('articles'=>$result,'model'=>$model,'comments'=>$comments,'id'=>$id));
	}
	/**
	 * This is the Register  User 'userRegister' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	public function actionFacebook()
	{
		if(isset(Yii::app()->user->profileId)){
			$this->redirect(Yii::app()->createUrl('/user'));
		}
		define('APP_ID', '846828762012851');
		define('APP_SECRET','1f989e3870a57ed90fad047993bb7f01');

		$facebook = new Facebook(array('appId' => APP_ID,'secret' => APP_SECRET,));
		$user = $facebook->getUser();
		
		if($user) {
			try {
				$user_profile = $facebook->api('/me');
			} 
			catch (FacebookApiException $e) 
			{
				error_log($e);
				$user = null;
			}
			if (!empty($user_profile))
			{
				$userC	=	UserLogin::model()->findByAttributes(array('username'=>$user_profile['email'],'fb_id'=>$user_profile['id']));
				if(!empty($userC)){
					$login				=	new LoginForm;
					$login->email		=	$userC->username;
					$login->password	=	$userC->fb_id;
					if($login->login()){
						$this->redirect(Yii::app()->createUrl('/user/tests',array('fb'=>1)));
					}
					else{
						Yii::app()->user->setFlash('login','Email or password not valid.');
						$this->redirect(Yii::app()->createUrl('/site/login'));
					}
				}
				else{
					$userR	=	UserLogin::model()->findByAttributes(array('username'=>$user_profile['email']));
					if(!empty($userR)){
						$userR->fb_id	=	$user_profile['id'];
						$userR->name	=	$user_profile['name'];
						if($userR->save()){
							$login				=	new LoginForm;
							$login->email		=	$userR->username;
							$login->password	=	$userR->fb_id;
							if($login->login()){
								$this->redirect(Yii::app()->createUrl('/user/tests',array('fb'=>1)));
							}
							else{
								Yii::app()->user->setFlash('login','Email or password not valid.');
								$this->redirect(Yii::app()->createUrl('/site/login'));
							}
						}
					}
					else{
						$model	=	new Register;
						$model->display_name	=	$user_profile['name'];
						$model->first_name		=	$user_profile['first_name'];
						$model->last_name		=	$user_profile['last_name'];
						$model->email			=	$user_profile['email'];
						$passVal				=	rand(100000, 10000000);
						$pass					=	md5($passVal);
						$model->image			=	'https://graph.facebook.com/'.$user_profile['id'].'/picture?type=large';
						$model->gender			=	$user_profile['gender'];
						$userRole				=	3;
						$model->add_date		=	date('Y-m-d H:i:s');
						$model->semd_mail		=	1;
						$model->password		=	$pass;
						$model->confirmpass		=	$pass;
						$user					=	new  UserLogin();
						$user->username			=	$user_profile['email'];
						$user->password			=	$pass;
						$user->add_date			=	date('Y-m-d H:i:s');
						$user->block			=	0;
						$Uclass					=	1;
						$user->activation		=	1;
						$user->user_role_id		=	$userRole;
						$user->name				=	$user_profile['name'];
						$model->user_login_id	=	1;
						$valid					=	$model->validate();
						$valid					=	$user->validate() && $valid;
						
						if($valid){
							if($user->save()){
								$model->user_login_id			=	$user->id;
								$model->generate_gudaak_ids_id	=	1;
								if($model->save()){
									$login=new LoginForm;
									$login->email		=	$user->username;
									$login->password	=	$user->fb_id;
									if($login->login()){
										$this->redirect(Yii::app()->createUrl('/user/tests',array('fb'=>1,'first'=>1)));
									}
									else{
										Yii::app()->user->setFlash('login','Email or password not valid.');
										$this->redirect(Yii::app()->createUrl('/site/login'));
									}
							
							
								}else{
									Yii::app()->user->setFlash('login','Some problem while registering by facebook please try simple registration.');
									$this->redirect(Yii::app()->createUrl('/site/login'));
								}
					
							}
							else {
								Yii::app()->user->setFlash('error','Some problem while registering by facebook please try simple registration.');
								$this->redirect(array('site/userRegister'));
								die;
							}
						}
						else{
							Yii::app()->user->setFlash('error','Some problem while validate registeration by facebook please try simple registration.');
							$this->redirect(array('site/userRegister'));
							die;
						}
					}
				}
			} 
			else
			{
			# For testing purposes, if there was an error, let's kill the script
			die("There was an error Occured.");
			}
			
		}
		else{
			$login_url = $facebook->getLoginUrl(array( 'scope' => 'email,publish_stream,read_stream,manage_notifications,read_mailbox'));
   			header("Location: " . $login_url);
		}
	}
	
	
	public function actionAutoCompleteLookup()
	{  
		$getId = '';
		if(!empty($_POST['Register']['gudaak_id'])) {
			$getId	 		= $_POST['Register']['gudaak_id'];
			$record_exists	= GenerateGudaakIds::model()->exists('gudaak_id  = :gudaak ', array(':gudaak'=>$getId ));
			$gudaakId		=	GenerateGudaakIds::model()->findByAttributes(array('gudaak_id'=>$getId));	
			if($record_exists==1 AND $getId !='' ){
				$findGudakID			=	UserProfiles::model()->exists('generate_gudaak_ids_id= :GDK ', array(':GDK'=>$gudaakId->id)); 
				if($findGudakID==1){
					$response	=	array();
					$response['status']=0;
					$response['data']='Gudaak ID already in use';
					echo json_encode($response); 
					die;
				}
				else{
					$dataR	=	UserClass::model()->findAll('orderBy =:orderBy',array(':orderBy'=>(int) $gudaakId->user_role_id));
					$data	=	CHtml::listData($dataR,'id','title');
					
					$classes	=	array();
					$response	=	array();
					$response['type']	=	$gudaakId->user_role_id;
					$response['status']	=	1;
					$response['data']	=	'';
					foreach($data as $value=>$name){
						$response['data'].=CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
					}
					foreach($dataR as $aa){
						$classes[]=$aa->id;
					}
					$response['medium']='';	
					$medimumR	=	UserAcademicMedium::model()->findAllByAttributes(array('user_class_id'=>$classes));
					$medimum	=	CHtml::listData($medimumR,'id','title');
					foreach($medimum as $value=>$name){
						$response['medium'].=CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
					}
					echo json_encode($response); 
					die;
				}
			}
			else{
				$response	=	array();
				$response['status']=0;
				$response['data']='Please fill correct Gudaak Id';
				echo json_encode($response); 
				die;
			}
		}
	}
	public function actionUserRegister()
	{	
		$this->layout='//layouts/main2';
		if(Yii::app()->user->id){
			$this->redirect(array('site/'));
		}
		$model	=	new Register;
		if(isset($_POST['Register']))
		{	
			$model->attributes		=	$_POST['Register'];
			$model->display_name	=	$model->first_name.' '.$model->last_name;
			$model->image			=	'noimage.jpg';
			$gender					=	$_POST['Register']['gender'];
			if($gender==1){
			$model->gender			=	'Male';
			}
			if($gender==0){
			$model->gender			=	'Female';
			}
			$userRole				=	3;
			$model->add_date		=	date('Y-m-d H:i:s');
			$model->semd_mail		=	1;
			
			$userC					=   UserLogin::model()->exists('username = :email',array(':email'=>$_POST['Register']['email']));
			if($userC==1){
				Yii::app()->user->setFlash('create','Email address is already in use.');
				$this->redirect(array('site/userRegister'));
			}
			$user					=	new  UserLogin();
			$user->username			=	$_POST['Register']['email'];
			$user->name				=	$model->first_name.' '.$model->last_name;
			$user->password			=	md5($_POST['Register']['password']);
			$user->add_date			=	date('Y-m-d H:i:s');
			$user->block			=	0;
			$Uclass					=	1;
			$user->activation		=	0;
			$user->user_role_id		=	$userRole;
			$model->user_login_id	=	1;
			$valid					=	$model->validate();
			$valid					=	$user->validate() && $valid;
			if($valid){
				if($user->save()){
					
					$model->user_login_id			=	$user->id;
					$model->generate_gudaak_ids_id	=	1;
					if($model->save()){
						//Start  mail Function 
						$data['name']		=	$model->display_name;
						$data['email']		=	$user->username;
						$data['password']	=	$_POST['Register']['password'];
						$data['code']		=	$this->createAbsoluteUrl('site/checkUser',array('email'=>base64_encode($user->username),'code'=>base64_encode($_POST['Register']['password'])));
						$this->sendMail($data,'register');
						//End  mail Function  
						Yii::app()->user->setFlash('create','Thank you for join us check your email and activate your account.');
						$this->redirect(array('site/userRegister'));
						die;
					}
					else{
						Yii::app()->user->setFlash('error','Please fill up carefully all field are mandatory.');
						$this->redirect(array('site/userRegister'));
						die;
					}
				}
			}
		
		}	
		$this->render('userRegister',array('model'=>$model));
	}
	public function actionCheckUser($email,$code='')
	{	
		$user			=	base64_decode($email);
		$password		=	base64_decode($code);
		$record_exists = UserLogin::model()->exists('username = :email', array(':email'=>$user));
		if($record_exists){
			$record					=	UserLogin::model()->findByAttributes(array('username'=>$user)); 
			$record->activation		=	1;
			if($record->save()){
				$login				=	new LoginForm;
				$login->email		=	$record->username;
				$login->password	=	$password;
				if($login->login()){
					Yii::app()->user->setFlash('login','Thank you for join us your account is activated.');
					$this->redirect(Yii::app()->createUrl('/user/tests',array('first'=>1)));
				}
				else{
					Yii::app()->user->setFlash('login','Thank you for join us your account is activated.');
					$this->redirect(array('site/login'));
				}
			
			}else{
				Yii::app()->user->setFlash('create','Not able to activate your account due to some technical issues. Please contact admin.');
				$this->redirect(array('site/userRegister'));
			}
		}else{
		
			Yii::app()->user->setFlash('create','Not record found.');
			$this->redirect(array('site/userRegister'));
		}
		
			
		
	}
	//Forgot password
	public function actionForgetPassword()
	{
		$this->layout='//layouts/main2';
		$model=new ForgotpasswordForm;
		if(isset($_POST['ForgotpasswordForm'])){
			$model->attributes=$_POST['ForgotpasswordForm'];
			if($model->validate()){
				$record_exists = UserLogin::model()->exists('username = :email', array(':email'=>$_POST['ForgotpasswordForm']['email']));
				if($record_exists==1){
					$record = UserLogin::model()->findByAttributes(array('username'=>$_POST['ForgotpasswordForm']['email']));
					$data['name']		=	$record->username;
					$data['email']		=	$record->username;
					$data['password']	=	base64_encode($record->username);
					$mail	=	$this->sendMail($data,'forget');
                	if($mail){
						Yii::app()->user->setFlash('new_password_message','You will receive an email with instructions about how to reset your password in a few minutes.');
						$this->refresh();
					}else
						Yii::app()->user->setFlash('error',"Sorry mail could not be sent this time! Please try again.");
				}
				else
					Yii::app()->user->setFlash('error',"The details you provided do not match our records. Please provide the correct details!");
			} //validate ends
		}
		$this->render('forgetPassword', array('model'=>$model));
		
	}
	
	public function actionResetPassword($link)
	{
        $email =    '';
        if(isset($link))
          $email = base64_decode($link);
        
       $record_exists = UserLogin::model()->exists('username = :email', array(':email'=>$email));
       if($record_exists==1){
           Yii::app()->session['passwordEmail'] = $email;
           $this->redirect(Yii::app()->createUrl('/site/newPassword'));
       }
        else{
           Yii::app()->user->setFlash('error',"Invalid Url.");
           $this->redirect(Yii::app()->createUrl('/site/login'));
        }
        
	}
	public function actionNewPassword()
	{
		$this->layout='//layouts/main2';
		if(!isset(Yii::app()->session['passwordEmail']))
			$this->redirect(Yii::app()->createUrl('/site/resetPassword'));
		$model     =    new NewpasswordForm;
		if(isset($_POST['NewpasswordForm'])){
			$model->attributes=$_POST['NewpasswordForm'];
			if($model->validate())
			{
				$record				=	UserLogin::model()->findByAttributes(array('username'=>Yii::app()->session['passwordEmail']));
				$record->password	=	md5($model->new_password);
				$record->name		=	'User';
				
				if($record->save()){
					$login				=	new LoginForm;
					$login->email		=  Yii::app()->session['passwordEmail']  ;
					$login->password	=  $model->new_password;
					if($login->validate() && $login->login()){
						Yii::app()->user->setFlash('success','Your new password has been sent to the email address you provided.');
						unset(Yii::app()->session['passwordEmail']);
						if(Yii::app()->user->userType=='school')
							$this->redirect(Yii::app()->createUrl('/school'));
						elseif(Yii::app()->user->userType=='admin')
							$this->redirect(Yii::app()->createUrl('/school'));
						elseif(Yii::app()->user->userType=='counsellor')
							$this->redirect(Yii::app()->createUrl('/counsellor'));
						else
							$this->redirect(Yii::app()->createUrl('/user/tests'));
					}
				}
			}
		}
		$this->render('newPassword',array('model'=>$model));
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
	{	$this->layout='//layouts/main2';
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
	
	public function actionAbout()
	{
		
		$this->render('about');
	}
	public function actionStudents()
	{
		
		$this->render('features');
	}
	public function actionSchools()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$data['name']			=	$model->name;
				$data['email']			=	$model->email;
				$data['phone']			=	$model->phone;
				$data['designation']	=	$model->designation;
				$data['institution']	=	$model->institution;
				$data['body']			=	$model->body;
				$mail					=	$this->sendMail($data,'contact');
				
				Yii::app()->user->setFlash('contact','Thank you for your interest in our service. Our representative will soon contact you.');
				$this->refresh();
			}
		}
		$this->render('schoolsFeatures',array('model'=>$model));
		
	}
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{	$this->layout='//layouts/main2';
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
			if($model->login()){
				if(isset(Yii::app()->user->userType)){
					if(Yii::app()->user->userType=='admin'){
						$this->redirect(Yii::app()->createUrl('/admin/admin'));
					}
					if(Yii::app()->user->userType=='school'){
						$this->redirect(Yii::app()->createUrl('/school/'));
					}
					if(Yii::app()->user->userType=='counsellor'){
						$this->redirect(Yii::app()->createUrl('/counsellor/'));
					}
					else{
						$this->redirect(Yii::app()->createUrl('/user/tests'));
					}
					
				}
				else{
					Yii::app()->user->setFlash('login','Email or password not valid.');
					}
			}
			else{
				Yii::app()->user->setFlash('login','Email or password not valid.');
				$this->redirect(Yii::app()->createUrl('/site/login'));
			}
			
		}
		
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionDynamicCity()
	{	 
		$getId = '';
		if(!empty($_POST['UserProfiles']['states_id'])) 
			$getId	 = $_POST['UserProfiles']['states_id'];
			$data	=	Cities::model()->findAll('states_id =:parent_id',array(':parent_id'=>(int) $getId));
			$data	=	CHtml::listData($data,'id','title');
			foreach($data as $value=>$name){
				echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
			}
		die;
	}
	public function actionDynamicCollageCity()
	{	 
		$getId = '';
		if(!empty($_POST['Collage']['states_id'])) 
			$getId	 = $_POST['Collage']['states_id'];
			$data	=	City::model()->findAll('state_id =:parent_id',array(':parent_id'=>(int) $getId));
			$data	=	CHtml::listData($data,'id','title');
				echo CHtml::tag('option', array('value'=>''),CHtml::encode('Select City'),true);
			foreach($data as $value=>$name){
				echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
			}
		die;
	}
	
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		//define('APP_ID', '846828762012851');
		//define('APP_SECRET','1f989e3870a57ed90fad047993bb7f01');
		//$facebook = new Facebook(array('appId' => APP_ID,'secret' => APP_SECRET,));
		//$facebook->clearPersistentData();
		//$logouturl = $facebook->getLogoutUrl();
		//header("Location: ".$logouturl."");
		$this->redirect(Yii::app()->homeUrl);
	}
	public function sendMail($data,$type)
	{
		$admin		=	0;
		switch($type){
			case 'contact':
				$admin		=	1;
				$subject	=	'Your Request for a Career Planning Trial @ Gudaak';
				$body		=	$this->renderPartial('/mails/contact_tpl',array('name' => $data['name'],'email' => $data['email'],'body' => $data['body']), true);
				$subject1	=	'Contact Us';
				$body1		=	$this->renderPartial('/mails/contact_tpl1',array('name' => $data['name'],'email' => $data['email'],'phone' => $data['phone'],'designation' => $data['designation'],'institution' => $data['institution'],'body' => $data['body']), true);
			break;
			case 'forget':
				$subject = 'Your Gudaak Password Change Request';
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
		
		if($admin==1){
			//CVarDumper::dump($mail,10,1);
			//$mail->Send();
			//$from1		=	$data['email'];
			$to1		=	Yii::app()->params['adminEmail'];
			$mail1		=	Yii::app()->Smtpmail;
			//$mail1->SetFrom($from1,'Gudaak');
			$mail1->Subject	=	$subject1;
			$mail1->MsgHTML($body1);
			$mail1->AddAddress($to1);
			$mail1->Send();
			return 1;
		}
		if(!$mail->Send()) {
           echo 'No';
		   return 0;
        }else {
			return 1;
        }
	}
}