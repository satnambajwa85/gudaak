<?php
class SiteController extends Controller
{
	/**
	* Declares class-based actions.
	**/
	public $layout='site';
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
 	public function accessRules()
    {
        return array(
            	array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('NewProjSubmit'),
				'users'=>array('@'),
			),
			array('allow','actions'=>array('Error,CreateService,newLogIn,createSkill,VerifyActivation'),'users'=>array('*')));
    }

	/**
	* This is the default 'index' action that is invoked
	* when an action is not explicitly requested by users.
	*/
	public function actionIndex()
	{
		$this->layout='/layouts/mainSite';
		$this->render('index');
	}
	public function actionAbout()
	{
		$this->layout='/layouts/newSite';
		$this->render('about');
	}
	public function actionFaq()
	{
		$data	=	array();
		if(!empty($_POST)){
			$data['name']		=	$_POST['name'];
			$data['email']		=	$_POST['email'];
			$data['subject']	=	$_POST['subject'];
			$data['message']	=	$_POST['message'];
			if($this->sendMail($data,'faq'))
				echo 'Thank you for contacting us. We will respond to you as soon as possible.';
				//Yii::app()->user->setFlash('success','Thank you for contacting us. We will respond to you as soon as possible.');
			die;	
		}
		$this->layout='/layouts/newSite';
		$this->render('faq');
	}
	public function actionSupplier()
	{
		//$tokenGen = new ServicesFirebaseTokenGenerator(APP_SECRET);
		 if(isset(Yii::app()->user->role))
			$this->redirect(array('/'.Yii::app()->user->role));
        
		$model	=	new LoginForm;
		$users	=	new Users;
		$forgot	=	new ForgotpasswordForm;
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
			if($model->validate() && $model->login()){
				
				if(Yii::app()->user->role=='supplier'){
					$this->redirect(array('supplier/index'));
				}else{
					$this->redirect(array('site/login'));
				}
			}else{
				Yii::app()->user->setFlash('loginError',$model->errors['password'][0]);
			}
		}
		if(isset($_POST['Users']))
		{
			$response = array("iserror" =>false,
								"errors" => array(),
							  	"Success" => array()
							 );
            $users = Users::model()->exists('username = :user_id', array(":user_id"=>$_REQUEST['Users']['username']));
            if($users)
            {
                $response["iserror"] = true;
                $msg= array(
                            'msg'=>"Already Registered with Us, Please try login!!",
                            //'token'=>$token
                        );
                $response["errors"]=$msg;
            }else{
                $users = new Users;
                $users->attributes	=	$_POST['Users'];
                $users->role_id		=	3;
                $users->status		=	0;
                $users->add_date	=	date('Y-m-d H:i:s');
                if($users->save())
                {
                    $profile	                =	new Suppliers;
                    $profile->name			    =	"";
                    $profile->first_name	    =	$users->display_name;
                    $profile->last_name	        =	$users->role;
                    //$profile->logo              =   "uploads/client/small/avatar.png";
                    $profile->users_id		    =	$users->id;
                    $profile->cities_id		    =	134717; //default for new york
                    $profile->status		    =	0;
                    $profile->add_date		    =	date('Y-m-d H:i:s');
                    $profile->save();

                    $data['name']		=	$users->display_name;
                    $data['email']		=	$users->username;
                    $data['password']	=	$users->password;
                    $data['id']         =   $users->id;
                    //$this->sendMail($data,'complete_profile');
                    $this->sendMail($data,'register_supplier');
                    $this->sendMail($data,'new_user_signup');
                    $model->username	=	$users->username;
                    $model->password	=	$users->password;

                    //if($model->validate() && $model->login()){

                        $response["iserror"] = false;
                        //$token = $tokenGen->createToken(array("id"=>yii::app()->user->profileId,"type"=>"abc","name"=>$profile->first_name." ".$profile->last_name));
                        
                        
                        
                        $msg= array(
                            //'msg'=>"Signed Up Successfully!!",
                            'msg'=>"Please check your mail and verify your account!!",
                            //'token'=>$token
                        );
                        $response["Success"]= $msg;
                        
                       
                        
                   /* }
                    else{
                        Yii::app()->user->setFlash('contact','Thank you for contacting us.We will respond to you ASA possible.');
                        $this->refresh();
                    }*/
                }
                else{
                    $response["iserror"] = true;
                    $msg= array(
                            'msg'=>"Already Registered with Us, Please try login!!",
                            //'token'=>$token
                        );
                    $response["errors"]=$msg;

                }
            }
			echo json_encode($response);
			die;
		}
		$this->render('login-supplier',array('users'=>$users,'model'=>$model,'forgot'=>$forgot)	);
	}
	public function actionAjaxSignup()
	{
		 if(isset(Yii::app()->user->role))
			$this->redirect(array('/'.Yii::app()->user->role));
        
		$model	=	new LoginForm;
		$users	=	new Users;
		$forgot	=	new ForgotpasswordForm;
		
		if(isset($_POST['Users']))
		{
			$response = array("iserror" =>false,
								"errors" => array(),
							  	"Success" => array()
							 );
			$users->attributes	=	$_POST['Users'];
			$users->role_id		=	2;
			$users->status		=	1;
			if($users->save())
			{
				$profile	                =	new ClientProfiles;
                $profile->first_name	    =	$users->display_name;
                $profile->last_name	    	=	$users->role;
                $profile->users_id		    =	$users->id;
                $profile->cities_id		    =	9;
                $profile->logo		        =	"/uploads/client/small/avatar.png";
				$profile->status		    =	0;
                $profile->add_date		    =	date('Y-m-d H:i:s');
                $profile->save();
                $data['name']		=	$users->display_name;
				$data['email']		=	$users->username;
				$data['password']	=	$users->password;
				$this->sendMail($data,'register');
				$model->username	=	$users->username;
				$model->password	=	$users->password;
				if($model->validate() && $model->login()){
					$response["iserror"] = false;
					array_push($response["Success"],"Signed Up succesfully!!");
				}
				else{
					Yii::app()->user->setFlash('contact','Thank you for contacting us.We will respond to you ASA possible.');
					$this->refresh();
				}
			}
			else{
				$response["iserror"] = true;
				array_push($response["errors"],"Already registerd with Us, Please try login");
 
			}
			echo json_encode($response);
			die;
		}
		$this->render('login-supplier',array('users'=>$users,'model'=>$model,'forgot'=>$forgot)	);
	}
	public function actionAjaxUniqe()
	{
		
		$users	=	Users::model()->exists('username = :user_id', array(":user_id"=>$_REQUEST['email']));
		$response = array("exist" =>false,'message'=>'Sorry this email does not exists in our records.');
		if($users){
			$record = Users::model()->findByAttributes(array('username'=>$_REQUEST['email']));
			$data['name']				=	$record->display_name;
			$data['email']				=	$record->username;
			$data['password']			=	base64_encode($record->username);
			$mail	=	$this->sendMail($data,'forget');
			if($mail){
				$response = array("exist" =>false,'message'=>'You will receive an email with instructions about how to reset your password in a few minutes.');
			}else{
				$response = array("exist" =>true,'message'=>'Sorry this email does not exists in our records.');
			}
		}else{
			$response = array("exist" =>true,'message'=>'Sorry this email does not exists in our records.');
		}
		echo json_encode($response);
		die;
	}
	public function actionForgotPassword()
	{
		$model=new ForgotpasswordForm;
		if(isset($_POST['ForgotpasswordForm'])){
			$model->attributes=$_POST['ForgotpasswordForm'];
			if($model->validate())
			{
				//Searches for the record in the database for the posted email 
				$record_exists = Users::model()->exists('username = :email', array(':email'=>$_POST['ForgotpasswordForm']['email']));
				if($record_exists==1){
					$record = Users::model()->findByAttributes(array('username'=>$_POST['ForgotpasswordForm']['email']));
					$data['name']				=	$record->display_name;
					$data['email']				=	$record->username;
					$data['password']			=	base64_encode($record->username);
					$mail	=	$this->sendMail($data,'forget');
                	if($mail){
						Yii::app()->user->setFlash('successPass','You will receive an email with instructions<br/> about how to reset your password in a<br/> few minutes.');
						$this->refresh();
					}else
						Yii::app()->user->setFlash('errorfPass',"Sorry mail could not be sent this time! Please try again.");
				}
				else
					Yii::app()->user->setFlash('errorfPass',"The details you provided do not match our records. Please provide the correct details!");
			}else
				Yii::app()->user->setFlash('errorFPass',"Invalide details!");
		}
		$this->redirect(Yii::app()->createUrl('/site/login'));
	}
	public function actionResetPassword($link)
	{
        $email =    '';
        if(isset($link))
          $email = base64_decode($link);
        
       $record_exists = Users::model()->exists('username = :email', array(':email'=>$email));
       if($record_exists==1){
           Yii::app()->session['passwordEmail'] = $email;
           $this->redirect(Yii::app()->createUrl('/site/newPassword'));
       }
        else{
           Yii::app()->user->setFlash('error',"Invalid Url.");
           $this->redirect(Yii::app()->createUrl('/site/login'));
        }
        
	}
	public function actionNotifictaion(){
		if(!isset(Yii::app()->user->id))
			$this->redirect(Yii::app()->createUrl('/site/login'));

		Log::model()->updateAll(array('is_read'=>1),'for_user = :for_user and notification = 1 and is_read=0',array(':for_user'=>Yii::app()->user->id));
		echo '1';
		die;
	}
	public function actionActivation($link,$log)
	{
		$email =    '';
		if(isset($link)){
			echo $email = base64_decode($link);
			echo $log = base64_decode($log);
		}
		$record_exists = Users::model()->find('username = :email AND password = :pass', array(':email'=>$email,'pass'=>$log));
		if(!empty($record_exists)){
			$record_exists->status	=	1;
			$record_exists->save();
			//$record_exists->ConfirmPassword	=	$record_exists->password;
			//if(!$record_exists->save()){CVarDumper::dump($record_exists,10,1);die;}
			$model     			=     new LoginForm;
			$model->username	=	$email;
			$model->password	=	$log;
			if($model->validate() && $model->login()){

				if($record_exists->role_id==3)
					$users	=	Suppliers::model()->findByPk(Yii::app()->user->profileId);
				else
					$users	=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
				
				$data['name']	=	$users->first_name;
				$data['email']	=	$email;
				// add to template name if need to send to supplier  - welcome_supplier
				$this->sendMail($data,$record_exists->role_id==2?'welcome':'welcome_complete_profile_supplier');
				//$this->sendMail($data,'welcome');
				Yii::app()->user->setFlash('success','Your account email address has been verified.');
				$this->redirect(Yii::app()->createUrl('/'.$record_exists->roles->name));
			}
		}
		else{
			Yii::app()->user->setFlash('success','Your email address has no account with us.Please Register to get one.');
		}
		$this->redirect(Yii::app()->createUrl('/site/login'));
	}
	public function actionVerifyActivation($link,$log)
	{
		$email =    '';
		if(isset($link)){
			echo $email = base64_decode($link);
			echo $log = base64_decode($log);
		}
		$record_exists = Users::model()->find('username = :email AND password = :pass', array(':email'=>$email,'pass'=>$log));
		if(!empty($record_exists)){
			$record_exists->status	=	1;
			$record_exists->save();
			//$record_exists->ConfirmPassword	=	$record_exists->password;
			//if(!$record_exists->save()){CVarDumper::dump($record_exists,10,1);die;}
			$model     			=     new LoginForm;
			$model->username	=	$email;
			$model->password	=	$log;
			if($model->validate() && $model->login()){

				if($record_exists->role_id==3)
					$users	=	Suppliers::model()->findByPk(Yii::app()->user->profileId);
				else
					$users	=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
				
				//$data['name']	=	$users->first_name;
				//$data['email']	=	$email;
				// add to template name if need to send to supplier  - welcome_supplier
			//	$this->sendMail($data,$record_exists->role_id==2?'welcome':'welcome_complete_profile_supplier');
				//$this->sendMail($data,'welcome');
				Yii::app()->user->setFlash('success','Your account email address has been verified.');
				$this->redirect(Yii::app()->createUrl('/'.$record_exists->roles->name));
			}
		}
		else{
			Yii::app()->user->setFlash('success','Your email address has no account with us.Please Register to get one.');
		}
		$this->redirect(Yii::app()->createUrl('/site/login'));
	}
	
	public function actionAdminLink($link,$log)
	{
		if(isset($link)){
			$email	=	base64_decode($link);
			$log	=	base64_decode($log);
		}
		$record_exists = Users::model()->find('username = :email AND password = :pass AND link_status = :status', array(':email'=>$email,':pass'=>$log,':status'=>1));
		if(!empty($record_exists)){
			$record_exists->link_status	=	0;
			$record_exists->save();
			$model     			=	new LoginForm;
			$model->username	=	$email;
			$model->password	=	$log;
			if($model->validate()&&$model->login()){
				$this->redirect(Yii::app()->createUrl('/'.$record_exists->roles->name));
			}
		}
		else{
			Yii::app()->user->setFlash('success','Your email address has no account with us.Please Register to get one.');
		}
		$this->redirect(Yii::app()->createUrl('/site/login'));
	}
	
	public function actionRecommendation()
	{
        $this->layout  = '//layouts/newLayout';
        $id = $_REQUEST['id'];
		if(isset($id))
			$model         =    Recommendations::model()->findByPk($id);
		else
			throw new CHttpException(404,'The specified recommendation cannot be found.');

		if(isset($_POST['Recommendations'])){
			$model->attributes=$_POST['Recommendations'];
			if($model->save())
            {
				Yii::app()->user->setFlash('RecommendationsSuccess','Your recommendation will be taken into account.');
				$this->redirect(Yii::app()->createUrl('/site'));
			}
		}
		$developer     =    Developer::model()->findByPk($model->developer_id);
        $this->render('recommendation',array('model'=>$model,'name'=>$developer->first_name));
    }
	public function actionNewPassword()
	{
		if(!isset(Yii::app()->session['passwordEmail']))
			$this->redirect(Yii::app()->createUrl('/site/resetPassword'));
		$model     =    new NewpasswordForm;
		if(isset($_POST['NewpasswordForm'])){
			$model->attributes=$_POST['NewpasswordForm'];
			if($model->validate())
			{
				$record = Users::model()->findByAttributes(array('username'=>Yii::app()->session['passwordEmail']));
				$record->password            =    $model->new_password;
				if($record->save()){
					$login     =    new LoginForm;
					$login->username     =  Yii::app()->session['passwordEmail']  ;
					$login->password     =  $model->new_password ;
					if($login->validate() && $login->login()){
						if(Yii::app()->user->role=='admin'){
							Yii::app()->user->setFlash('success1','Your password has been reset.');
							unset(Yii::app()->session['passwordEmail']);
							$this->redirect(array('admin/users'));
						}else{
							Yii::app()->user->setFlash('success1','Your password has been reset.');
							unset(Yii::app()->session['passwordEmail']);
							$this->redirect(Yii::app()->createUrl('/'.Yii::app()->user->role));
						}
					}
				}
				else
					die('error');
			}
		}
		$this->render('newPassword',array('model'=>$model));
	}
	
	public function actionPrivacyTerms()
	{
		$this->render('privacyTerms');
	}
	public function actionQueryRun()
	{
		$query	=	'ALTER TABLE  `suppliers` ADD  `cover` VARCHAR( 250 ) NULL AFTER  `last_name` ;';
		//$command = Yii::app()->db->createCommand($query)->query();
        //CVarDumper::dump($command,10,1);
		die('vf');
		
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout  = '/layouts/mainError';
	 	$error=Yii::app()->errorHandler->error;
		$errMsg	='Property "CWebUser.role" is not defined.';
		if($error)
		{
			$errorModel							= 		new ErrorLogs;
			$errorModel->user_type 				=		isset(Yii::app()->user->role)?Yii::app()->user->role:'Guest';
			$errorModel->user_id				=		isset(Yii::app()->user->id)?Yii::app()->user->id:'000';
			$errorModel->user_name				=		Yii::app()->user->name ;
			$errorModel->error_code				=		isset($error['code'])?$error['code']:'0000';
			$errorModel->message				=		isset($error['message'])?$error['message']:'Not Available';
			$errorModel->request_url			=		$_SERVER['REQUEST_URI'];
			$errorModel->query_string			= 		isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'Not Available';
			$errorModel->file_name				=		isset($error['file'])?$error['file']:'Not Available';
			$errorModel->line_number			=		isset($error['line'])?$error['line']:'Not Available';;
			$errorModel->error_type				=		isset($error['type'])?$error['type']:'Not Available';
			$errorModel->time					=		date('Y-m-d H:i:s');
			$errorModel->reference_url			=		isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'Direct from Broswer';
			$errorModel->ipaddress				=		isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'NA';
			$errorModel->browser				=		($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'Unknown';
			if($errMsg	!=	$errorModel->message)
				{
				 if($errorModel->save())
	  				Yii::app()->user->logout();
				}
			else
				{
					Yii::app()->user->logout();
				}
		/*if(Yii::app()->request->isAjaxRequest)
			echo $error['message'];
		else
			$this->render('error', $error);*/
		}
        $this->render('error', $error);
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
			$data['name']	=	$model->name;
			$data['subject']=	$model->subject;
			$data['email']	=	$model->email;
			$data['body']	=	$model->body;
			$this->sendMail($data,'contact');
			$this->sendMail($data,'contactUs');
			//Yii::app()->user->setFlash('success','Thank you for contacting us. We will respond to you as soon as possible.');
			echo 'Thank you for contacting us. We will respond to you as soon as possible.';
			die;
		}
		$this->layout='/layouts/newSite';
		$this->render('contact',array('model'=>$model));
	}
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        if(isset(Yii::app()->user->role))
			$this->redirect(array('/'.Yii::app()->user->role));
        
		$model	=	new LoginForm;
		$users	=	new Users;
		$forgot	=	new ForgotpasswordForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			//CVarDumper::dump(yii::app(),10,1);die;
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->loginStatus() && $model->login()){
				if(Yii::app()->user->role=='admin'){
					$this->redirect(array('/admin/users/admin'));
				}
				elseif(Yii::app()->user->role=='client'){
					$this->redirect(array('/client/index'));
				}
				elseif(Yii::app()->user->role=='supplier'){
					$this->redirect(array('/supplier/index'));
				}else{
					$this->redirect(array('/site/login'));
				}
			}else{
				Yii::app()->user->setFlash('loginError',$model->errors['password'][0]);
			}
		}
		// display the login form
		if(isset($_POST["fromsupplier"])){
			//$this->redirect(array('site/supplier'));
			$this->render('login-supplier',array('users'=>$users,'model'=>$model,'forgot'=>$forgot));
		}
		else
			$this->render('login',array('users'=>$users,'model'=>$model,'forgot'=>$forgot));
	}
	public function actionCall()
	{
       $this->render('call');
	}
	
	/* Old Search method backup

	public function actionSearch()
	{
		$docs = array(
                "d1" => "this document is the first document that is quite long",
                "d2" => "this is yet another document that is very slightly longer",
                "d3" => "this isn't a very interesting string",
                "d4" => "this isn't a very interesting document either"
        );
        $query = 'interesting document';
        preg_match_all('/\w+/', $query, $matches);
        $queryTerms = $matches[0];

        $collection = array('terms' => array(), 'length' => 0, 'documents' => array());
        foreach($docs as $docID => $doc) {
                preg_match_all('/\w+/', $doc, $matches);
                // store the document length
                $collection['documents'][$docID] = count($matches[0]);

                foreach($matches[0] as $match) {
                        if(!isset($collection['terms'][$match])) {
                                $collection['terms'][$match] = array();
                        }
                        if(!isset($collection['terms'][$match][$docID])) {
                                $collection['terms'][$match][$docID] = 0;
                        }
                        $collection['terms'][$match][$docID]++;
                        $collection['length']++;
                }
        }
        $collection['averageLength'] = $collection['length']/count($collection['documents']);

		//CVarDumper::dump($collection,10,1);
		$results = $this->bm25Weight($queryTerms, $collection);
        arsort($results);
        //CVarDumper::dump($results,10,1);die;
		$services = Services::model()->findAllByAttributes(array("status"=>1));
		$serviceList = "";
		foreach($services as $s)
			$serviceList["id"]=$s->id;
			//] = $s->name;

		//echo json_encode($serviceList);die;
		//CVarDumper::dump($services,10,1);die;
		$this->render("search",array("services"=>$services));


	}*/


	public function actionSearch()
	{
		//Self reported percentage focus in service type
		define("SELF_REPORTED_PERCENTAGE_FOCUS_SERVICE",8);
		define("SELF_REPORTED_PERCENTAGE_FOCUS_SERVICE_VALUE",0.9);

		//Percentage focus in service type in client stories
		define("PERCENTAGE_FOCUS_SERVICE_CLIENT_STORIES",9);
		define("PERCENTAGE_FOCUS_SERVICE_CLIENT_STORIES_VALUE",0.8);

		//Self reported percentage focus in language
		define("SELF_REPORTED_PERCENTAGE_FOCUS_LANGUAGE",8);
		define("SELF_REPORTED_PERCENTAGE_FOCUS_LANGUAGE_VALUE",0.33);

		//Percentage focus in language in the client stories
		define("PERCENTAGE_FOCUS_LANGUAGE_CLIENT_STORIES",10);
		define("PERCENTAGE_FOCUS_LANGUAGE_CLIENT_STORIES_VALUE",0.4);

		//Number of projects in the portfolio in the langauge
		// Find 75th% of the max project done ever in that language
		define("NUMBER_PROJECTS_PORTFOLIO_LANGUAGE",8);
		define("NUMBER_PROJECTS_PORTFOLIO_LANGUAGE_VALUE",0.8);

		//Self reported percentage focus in the industry
		define("SELF_REPORTED_PERCENTAGE_FOCUS_INDUSTRY",9);
		define("SELF_REPORTED_PERCENTAGE_FOCUS_INDUSTRY_VALUE",0.9);

		//Percentage focus in the industry in the client stories
		define("PERCENTAGE_FOCUS_INDUSTRY_CLIENT_STORIES",10);
		define("PERCENTAGE_FOCUS_INDUSTRY_CLIENT_STORIES_VALUE",0.1);

		//Number of projects in the portfolio in the industry
		define("NUMBER_PROJECTS_PORTFOLIO_INDUSTRY",9);

		//Total number of projects
		define("TOTAL_NUMBER_PROJECTS",8);

		//Number of projects done on VenturePact
		define("TOTAL_NUMBER_PROJECTS_VENTUREPACT",8);

		//Profile Completeness
		define("PROFILE_COMPLETNESS",7);
		define("PROFILE_COMPLETNESS_VALUE",1);

		//Number of reviews
		define("NUMBER_OF_REVIEWS",10);

		//Rating total
		define("RATINGS_TOTAL",6);

		//Rating in said language
		define("RATINGS_SAID_LANGUAGE",6);
		define("RATINGS_SAID_LANGUAGE_VALUE",0.6);

		//Rating in the said industry
		define("RATINGS_SAID_INDUSTRY",6);
		define("RATINGS_SAID_INDUSTRY_VALUE",0.6);

		//Response Rate
		define("RESPONSE_RATE",8);
		define("RESPONSE_RATE_VALUE",0.8);

		//Budget matching
		define("BUDGET_MATCHING",10);

		//Location Matching
		define("LOCATION_MATCHING",10);
		$command = Yii::app()->db->createCommand('call search_algo(1,20,12,1);');
		$rows=$command->queryAll();
		CVarDumper::dump($rows,10,1);



	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionSignup()
	{
		$model				=	new LoginForm;
		$users				=	new Users;
		$users->attributes	=	$_POST['Users'];
		$users->role_id		=	2;
		$users->status		=	1;
		if($users->save())
		{
			$profile	                =	new ClientProfiles;
			$profile->first_name	    =	$users->display_name;
			$profile->email				=	$users->username;
			$profile->last_name	    	=	$users->role;
			$profile->users_id			=	$users->id;
			$profile->cities_id			=	(!empty($_POST['ClientProjects']['cities_id']))?$_POST['ClientProjects']['cities_id']:134717;
			//$profile->team_size		    =	$_POST['ClientProjects']['team_size'];
			//$profile->company_link		=	$_POST['Users']['company_link'];
			$profile->company_name		=	$_POST['Users']['company_name'];
			$profile->status		    =	1;
			$profile->add_date		    =	date('Y-m-d H:i:s');
			if($profile->save()){
				$data['name']		=	$users->display_name;
				$data['email']		=	$users->username;
				$data['password']	=	$users->password;
				$this->sendMail($data,'register');
			
				$model->username	=	$users->username;
				$model->password	=	$users->password;
				if($model->login())
					$response = array("exist" =>true,'message'=>'Welcome to VenturePact. Post your first job by clicking on "Add a new Job". <br>If you would like to discuss your requirements over a call, feel free to schedule a call here.');
				else{
					$response = array("exist" =>false,'message'=>'Error occurred during login to your account. Please try again after some time.');
				}
			}
			else
				$response = array("exist" =>false,'message'=>'Signup not completed. Error occurred during registration. Please fill all the details carefully.');
		}
		else
			$response = array("exist" =>false,'message'=>'Signup not completed. This email address is already in use.');

		echo json_encode($response);
		die;
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionGetNames()
	{
	  if (!empty($_GET['term'])) {
		$sql = "SELECT id ,name as label,name FROM keywords where name Like :qterm";
		//$sql .= ' ORDER BY name ASC';
		$command = Yii::app()->db->createCommand($sql);
		$qterm = '%'.$_GET['term'].'%';
		$command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
		$result = $command->queryAll();
		echo CJSON::encode($result); exit;
	  } else {
		return false;
	  }
	}

	public function actionDynamicCity()
	{
		if(isset($_REQUEST['country']))
			$countryId	=	$_REQUEST['country'];
		elseif(isset($_REQUEST['Company']['country']))
			$countryId	=	$_REQUEST['Company']['country_id'];
		elseif(isset($_REQUEST['Developer']['country_id']))
			$countryId=$_REQUEST['Developer']['country_id'];
		elseif(isset($_REQUEST['Schools']['country_id']))
			$countryId	=	$_REQUEST['Schools']['country_id'];
		elseif(isset($_REQUEST['Investor']['country_id']))
			$countryId	=$_REQUEST['Investor']['country_id'];
		elseif(isset($_POST['state_id'])) //added for creating supplier via admin panel 
			$countryId	=$_POST['state_id'];
	
				
		$cityList	= Cities::model()->findAllByAttributes(array('states_id'=>$countryId,'status'=>1),array('order'=>'name ASC'));
        //echo CHtml::tag('option',array(''=>"Select City"),CHtml::encode("Select City"),true);
		foreach($cityList as $city)
		{
			echo CHtml::tag('option',array('value'=>$city->id),CHtml::encode($city->name),true);
		}
		
		die;
	}
    
   public function actionDynamicPriceTire()
   {
    
    if(isset($_POST['cities_id'])) //added for creating supplier via admin panel 
			$cityId	=$_POST['cities_id'];
	
				
		$cityList	= Cities::model()->findAllByAttributes(array('id'=>$cityId));
   		//CVarDumper::dump($cityList[0]->states,10,1);die;
    	foreach($cityList[0]->states->priceZone->priceTiers as $tiers)
		{
			echo CHtml::tag('option',array('value'=>$tiers->id),CHtml::encode($tiers->title.' $'.$tiers->min_price.' - $'.$tiers->max_price),true);
		}
		
		die;

   }
    	
    public function actionDynamicBudget()
	{
       
		if(isset($_REQUEST['country']))
			$countryId	=	$_REQUEST['country'];
		
		$states = States::model()->findByPk(array("id"=>$countryId));
		$res = array("priceTier"=>"","options"=>"");
		foreach($states->cities as $city)
		{
			if($city->status==1){
				$res["options"].= CHtml::tag('option',array('value'=>$city->id),CHtml::encode($city->name),true);
			}
		}
        
         
        $priceTier =   PriceTier::model()->findAllByAttributes(array("price_zone"=>$states->price_zone_id ))   ;
        
        $pricedata = array();
        foreach($priceTier as $tier)
        {
            array_push($pricedata,$tier->attributes);
        }
		$res["priceTier"]= $pricedata;
		echo json_encode($res);
		
		die;
	}
	
	public function sendMail($data,$type)
	{
		$templete	=	'';
		$admin	=	0;
		$subject	=	'default';
		switch($type){
            case "complete_profile" :
                $templete	=	"complete_profile";	
				$subject = 'VenturePact: Complete Your Profile ';
				$body = $this->renderPartial('/mails/complete_profile_tpl',
										array(	'data' => $data),
											 true
											);
            break;
			case 'welcome':
				$subject = 'VenturePact: We are offering you premium concierge service.';
				$body = $this->renderPartial('/mails/welcome_tpl',
										array('name' => $data['name']), true);
			break;
			case 'welcome_complete_profile_supplier':
				$subject = 'Welcome To VenturePact: We are offering you premium concierge service.';
				$body = $this->renderPartial('/mails/welcome_complete_profile_supplier_tpl',
										array('data' => $data), true);
			break;
			case 'contact':
				$templete	=	"contact";
				$subject = 'VenturePact: Thanks for contacting us.';
				$body = $this->renderPartial('/mails/contact_tpl',
										array('name' => $data['name']), true);
			break;
			
			case 'contactUs':
				$templete	=	"contactUs";
				$admin	=	1;
				$subject = $data['subject'];
				$body = $this->renderPartial('/mails/contact-us_tpl',array('name' => $data['name'],'message'=> $data['body']), true);
			
			break;
			case 'forget':
				$templete	=	"forget";
				$subject = 'VenturePact: Forgot Password';
				$body = $this->renderPartial('/mails/forgot_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
												'password'=>$data['password']), true);
			break;
			case 'register':
				$templete	=	"register";
				$subject = 'Action Required - Verify Email Address';
				$body = $this->renderPartial('/mails/register_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
                                                'link'=>base64_encode($data['email']),
												'password'=>base64_encode($data['password'])), true);
				$admin	=	2;
			break;
			case 'rfp_submitted_new_tpl':
				$templete	=	"register";
				if($data['linkedin']=='')
				$subject 	= 'Action Required - Verify Email Address';
				else
				$subject	= ' Welcome to VenturePact: We are offering you premium concierge service.';	
				$body = $this->renderPartial('/mails/rfp_submitted_new_tpl',
										array(	'name' => $data['name'],
										'data' => $data,
												'email'=>$data['email'],
                                                'link'=>base64_encode($data['email']),
												'linkedin'=>$data['linkedin'],
												'password'=>base64_encode($data['password'])), true);
				$admin	=	2;
			break;
			case 'register_supplier':
				$templete	=	"register";
				$subject = 'Action Required - Verify Email Address';
				$body = $this->renderPartial('/mails/register_supplier_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
                                                'link'=>base64_encode($data['email']),
												'password'=>base64_encode($data['password'])), true);
				$admin	=	2;
			break;
			case 'faq':
				$templete	=	"faq";
				$admin	=	1;
				$subject = $data['subject'];
				$body = $this->renderPartial('/mails/faq_tpl',array('name' => $data['name'],'email'=>$data['email'],'message'=>$data['message']), true);
			break;
			case 'request':
				$templete	=	"request";
				$subject = 'Project request application';
				$body = $this->renderPartial('/mails/request_tpl',
										array(	'data' => $data), true);
										
				$data['email']	=	Yii::app()->params['adminEmail'];
			break;
			case 'submit_rfp':
				$templete	=	'submit_rfp';
				$subject = 'VenturePact: RFP Successfully Submitted';
				$body = $this->renderPartial('/mails/rfp_submitted_new_tpl',
										array(	'name' => $data['name'],
												'data' => $data,
												'email'=>$data['email']), true);
			break;
			
			
            case 'twoNfourDays_reminder':
				$templete	=	"twoNfourDays_reminder";
                $subject = "VenturePact: Defining the requirements for ".$data['project'].".";
				$body = $this->renderPartial('/mails/remainder_email1_tpl',
										array(	'data' => $data), true);

            break;
            case 'sevenDays_reminder':
				$templete	=	"sevenDays_reminder";
                $subject = "VenturePact: Defining the requirements for ".$data['project'].".";
				$body = $this->renderPartial('/mails/remainder_email_sevenDays_tpl',
										array(	'data' => $data), true);

            break;
            case 'fiveNtwentyDaysOldProfiles_feedback':
				$templete	=	"fiveNtwentyDaysOldProfiles_feedback";
                $subject = " VenturePact: We value your feedback";
				$body = $this->renderPartial('/mails/feedback_email_5and20DaysOld_tpl',
										array(	'data' => $data), true);

            break;
            case 'remainder_email_22hourOld_notpitched':
				$templete	=	"remainder_email_22hourOld_notpitched";
                $subject = "VenturePact: Reminder for ".$data['project'].".";
				$body = $this->renderPartial('/mails/remainder_email_22hourOld_notpitched_tpl',
										array(	'data' => $data), true);

            break;
            case 'reminder_completeProfile':
				$templete	=	"reminder_completeProfile";
                $subject = "VenturePact: Reminder for completing profile";
				$body = $this->renderPartial('/mails/reminder_completeProfile_tpl',
										array(	'data' => $data), true);

            break;
            case 'remainder_email_22hour_2days_not_seen_proposal':
				$templete	=	"remainder_email_22hour_2days_not_seen_proposal";
                $subject = "VenturePact: You received a proposal";
				$body = $this->renderPartial('/mails/remainder_email_22hour_2days_not_seen_proposal_tpl',
										array(	'data' => $data), true);

            break;
            case 'feedback_email_after1week_supplierApproved':
				$templete	=	"feedback_email_after1week_supplierApproved";
                $subject = "VenturePact: Catching up to see how the engagement is going";
				$body = $this->renderPartial('/mails/feedback_email_after1week_supplierApproved_tpl',
										array(	'data' => $data), true);

            break;
             case "seek_clarification" :
			 	$templete	=	"seek_clarification";
                $subject = 'VenturePact: An interested service provider is seeking clarification';
				$body = $this->renderPartial('/mails/seek_clarification_tpl',
										array('data' => $data),
											 true
											);
            break;
            case 'followup' :
				$templete	=	"followup";
				$link = $data['client_email'].",".$data['client_id'].",".$data['supplier_id'].",".$data["id"] ;
				$subject = 'Reminder -'.$data["company_name"].' is requesting a Recommendation';
				$body = $this->renderPartial('/mails/supplier_reference_followup_tpl',
										array(	'data' => $data,
                                                'link'=>base64_encode($link)),
											 true
											);
			break;
			case 'reminder_chatMessages' :
				$templete	=	"reminder_chatMessages";
				$subject = 'Reminder - You got a new message';
				$body = $this->renderPartial('/mails/reminder_chatMessages_tpl',
										array('data' => $data),true);
			break;
            case 'new_user_signup' :
            
                
				$templete	=	"new_user";
				$subject = 'New Registration';
			                            
                $body = $this->renderPartial('/mails/new_user',
										array(	'name' => $data['name'],
												'email'=> $data['email'],
                                                'id' => $data['id']), true);                        
                $admin = 5;            
			break;
			
			default:
			break;			
		}
       
		$from		=	Yii::app()->params['adminEmail'];
        $fromname   =	"VenturePact Team";
		$to			=	$data['email'];
		
		if($admin==1){
			$from		=	$data['email'];
			$to			=	Yii::app()->params['adminEmail'];
		}
        
        if($admin==5){
			$from		=	$data['email'];
			$to			=	"devrelations@venturepact.com";
            //$to			=	"sandeep.verma@venturepact.com"; 
		}
		
   
        
		require_once("sendgrid-php/sendgrid-php.php");
		$options = array("turn_off_ssl_verification" => true);
		$sendgrid = new SendGrid('riteshtandon231981', 'venturepact1', $options);
		$mail = new SendGrid\Email();
		
		
		if($admin==2)//Admin will get sigup notifictaion 
			$mail->addTo($to)->addTo($from)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
		else
			$mail->addTo($to)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
		
        //CVarDumper::Dump($mail,10,1);
        //die;
		if(!$sendgrid->send($mail))
			return 0;
		else
		{
		  
				if(parent::mailLog($subject,$to,$templete,$body))
					return 1;
		}
	}
   
	public function ActionLinkedin()
	{
		$role				=	$_REQUEST['role'];
		$API_CONFIG = array(
			'appKey'       => '75anr5w4aijrvv',
			'appSecret'    => 'Aox4aWXcgWh1J3pk',
			'callbackUrl'  => $this->createAbsoluteUrl('/site/linkedinAfter',array('role'=>$role))
			);
		$_REQUEST['lType']	=	(isset($_REQUEST['lType'])) ? $_REQUEST['lType'] : '';
		switch($_REQUEST['lType']) {
			case 'initiate':
				$OBJ_linkedin = new LinkedIn($API_CONFIG);
				$_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
				if(!$_GET[LINKEDIN::_GET_RESPONSE]) {
					$response = $OBJ_linkedin->retrieveTokenRequest();
					if($response['success'] === TRUE) {
						Yii::app()->session['oauth_request']	= $response['linkedin'];
						header('Location: ' . LINKEDIN::_URL_AUTH . $response['linkedin']['oauth_token']);
					} else {
						echo "Request token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
					}
				}
				else{
					$response = $OBJ_linkedin->retrieveTokenAccess(Yii::app()->session['oauth_request']['oauth_token'],Yii::app()->session['oauth_request']['oauth_token_secret'], $_GET['oauth_verifier']);
					if($response['success'] === TRUE) {
						Yii::app()->session['oauth_access'] = $response['linkedin'];
						Yii::app()->session['oauth_authorized'] = TRUE;
						$this->redirect(Yii::app()->createUrl('linkedinAfter',array('role'=>$role)));
					} else {
						echo "Access token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
					}
				}
			break;
			case 'revoke':
				if(!oauth_session_exists()) {
					throw new LinkedInException('This script requires session support, which doesn\'t appear to be working correctly.');
				}
				$OBJ_linkedin = new LinkedIn($API_CONFIG);
				$OBJ_linkedin->setTokenAccess(Yii::app()->session['oauth_access']);
				$response = $OBJ_linkedin->revoke();
				if($response['success'] === TRUE) {
					session_unset();
					$_SESSION = array();
					if(session_destroy()) {
						header('Location: ' . $_SERVER['PHP_SELF']);
					} else {
						echo "Error clearing user's session";
					}
				} else {
					echo "Error revoking user's token:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
				}
			break;
			default:
				if(version_compare(PHP_VERSION, '5.0.0', '<')) {
					throw new LinkedInException('You must be running version 5.x or greater of PHP to use this library.'); 
				} 
				if(extension_loaded('curl')) {
					$curl_version = curl_version();
					$curl_version = $curl_version['version'];
				}else {
					throw new LinkedInException('You must load the cURL extension to use this library.'); 
				}
			break;
		}
	}	
	
	public function ActionLinkedinAfter()
	{
		$API_CONFIG = array(
			'appKey'       => '75anr5w4aijrvv',
			'appSecret'    => 'Aox4aWXcgWh1J3pk',
			'callbackUrl'  => $this->createAbsoluteUrl('/site/linkedinAfter',array('role'=>$_REQUEST['role']))
			//'callbackUrl'  => $this->createAbsoluteUrl('/site/linkedinAfter')
			);			
		$OBJ_linkedin = new LinkedIn($API_CONFIG);
		$response = $OBJ_linkedin->retrieveTokenAccess(Yii::app()->session['oauth_request']['oauth_token'],Yii::app()->session['oauth_request']['oauth_token_secret'], $_GET['oauth_verifier']);
		if($response['success'] === TRUE) {
			Yii::app()->session['oauth_access'] = $response['linkedin'];
			Yii::app()->session['oauth_authorized'] = TRUE;
		}
		Yii::app()->session['oauth_authorized'] = (isset( Yii::app()->session['oauth_authorized']))? Yii::app()->session['oauth_authorized']: FALSE;
		if( Yii::app()->session['oauth_authorized'] === TRUE) {
			$OBJ_linkedin = new LinkedIn($API_CONFIG);
			$OBJ_linkedin->setTokenAccess(Yii::app()->session['oauth_access']);
			$OBJ_linkedin->setResponseFormat(LINKEDIN::_RESPONSE_XML);
			$response = $OBJ_linkedin->profile('~:(id,first-name,last-name,public-profile-url,email-address,picture-url,location,interests,phone-numbers,main-address,positions,skills,educations,network)');
			if($response['success'] === TRUE) {
				$response['linkedin'] = new SimpleXMLElement($response['linkedin']);
				$responseArray = (array) $response['linkedin'];
				$loc	=	(array)$responseArray['location'];
				$postion	=	(array)$responseArray['positions'];
				if(isset($postion['position'][0])){
					$curPo		=	(isset($postion['position'][0]))?(array)$postion['position'][0]:array();
					$company1	=	(isset($curPo['company']))?(array)$curPo['company']:array();
					$company	=	(isset($company1['name']))?$company1['name']:'';
				}
				$location	=	explode(',',$loc['name']);
				if(isset($location[1]) && isset($location[0])){
					$stat	=	States::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[1]),' '),' ')));
					if(empty($stat)){
						$stat				=	new States;
						$stat->name			=	rtrim(ltrim(ucfirst($location[1]),' '),' ');
						$stat->description	=	'Data added from Linkedin';
						$stat->price_zone_id=	1;
						$stat->countries_id	=	1;
						$stat->code			=	1;
						$stat->code2			=	1;
						$stat->status		=	1;
						$stat->save();
					}
					$city	=	Cities::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[0]),' '),' '),'states_id'=>$stat->id));
					if(empty($city)){
						$city				=	new Cities;
						$city->name			=	rtrim(ltrim(ucfirst($location[0]),' '),' ');
						$city->description	=	'Data added from Linkedin';
						$city->states_id	=	$stat->id;
						$city->code			=	1;
						$city->status		=	1;
						$city->save();
					}
				}
				else{
					$city				=	Cities::model()->findByPk(9);
				}
				$linkedinId		=	$responseArray['id'];
				$email			=	$responseArray['email-address'];
				$phone			=	$responseArray['phone-numbers'];
				$display_name	=	(isset($responseArray['first-name']))?$responseArray['first-name']:'';
				$profileUrl		=	(isset($responseArray['public-profile-url']))?$responseArray['public-profile-url']:'';
				$profilePic		=	(isset($responseArray['picture-url']))?$responseArray['picture-url']:'';
				$last_name		=	(isset($responseArray['last-name']))?$responseArray['last-name']:'';
				$education1		=	(array)$responseArray['educations'];
				if(!empty($education1['education']))
					$educations		=	$education1['education'];
				else	
					$educations		=	array();
				if(!empty($responseArray['positions']))
					$position1		=	(array)$responseArray['positions'];
				else
					$position1		=	array();
				
				if(!empty($position1) && !empty($position1['position']))
					$positions		=	$position1['position'];
				else	
					$positions		=	array();
				$record_exists	=	Users::model()->find('linkedin = :linkedinId and username = :username', array(':linkedinId'=>$linkedinId,':username'=>$email));
				if(!empty($record_exists)){
					$model     			=     new LoginForm;
					$model->username	=	$record_exists->username;
					$model->password	=	$record_exists->password;
					if($model->validate() && $model->login()){
						if(isset(Yii::app()->user->role)){
							$this->redirect(array('/'.Yii::app()->user->role));
						}else{
							$this->redirect(array('site/login'));
						}
					}
				}
				else{
					$users	=	Users::model()->findByAttributes(array('username'=>$email));
					if(empty($users)){
						$users					=	new Users;
						$users->username		=	$email;
						$password				=	time();
						$users->password		=	$password;
						$users->status			=	1;
						$users->role_id			=	$_REQUEST['role'];
						$users->display_name	=	$display_name;
						$users->add_date		=	date('Y-m-d H:i:s');
					}
					$users->linkedin			=	$linkedinId;
					if($users->save())
					{
						if($_REQUEST['role']==2){
							$profile	=	ClientProfiles::model()->find('users_id = :userId', array(':userId'=>$users->id));
							if(empty($profile)){
								$profile	                =	new ClientProfiles;
								$profile->first_name	    =	$display_name;
								$profile->last_name			=	$last_name;
								$profile->email				=	$email;
								$profile->phone_number		=	(isset($phone))?$phone:"";
								$profile->image				=	$profilePic;
								$profile->users_id		    =	$users->id;
								$profile->cities_id		    =	$city->id;
								$profile->company_name		=	(isset($company))?$company:'';
								$profile->status			=	1;
								$profile->add_date		    =	date('Y-m-d H:i:s');
								$profile->save();
							}
							$model				=	new LoginForm;
							$model->username	=	$users->username;
							$model->password	=	$users->password;
							if($model->login()){
								$data['name']		=	$users->display_name;
								$data['email']		=	$users->username;
								$data['password']	=	$users->password;
								$this->sendMail($data,'register');
								if(isset(Yii::app()->user->role)){
									$this->redirect(array('/'.Yii::app()->user->role,'first'=>'1'));
								}else{
									$this->redirect(array('site/login'));
								}
							}
							else{
								Yii::app()->user->setFlash('error','Unable to connect linked in profile.');
								$this->redirect(Yii::app()->createUrl('/site/login'));
							}
						}
						else{
							$profile	=	Suppliers::model()->find('users_id = :userId', array(':userId'=>$users->id));
							if(empty($profile)){
								$profile	                =	new Suppliers;
								$profile->first_name	    =	$display_name;
								$profile->last_name			=	$last_name;
								$profile->name			    =	$users->display_name;
								$profile->email				=	$email;
								$profile->phone_number		=	(isset($phone))?$phone:"";
								$profile->logo				=	$profilePic;
								$profile->users_id		    =	$users->id;
								$profile->cities_id		    =	$city->id;
								$profile->status		    =	0;
								$profile->add_date		    =	date('Y-m-d H:i:s');
								$profile->save();
								//CVarDumper::dump($profile,10,1);die;
							}
							$model				=	new LoginForm;
							$model->username	=	$users->username;
							$model->password	=	$users->password;
							if($model->login()){

                                $data['name']		=	$users->display_name;
                                $data['email']		=	$users->username;
                                $data['password']	=	$users->password;
                                $this->sendMail($data,'complete_profile');
                                //$this->sendMail($data,'register_supplier');
								if(Yii::app()->user->role=='admin'){
									$this->redirect(array('admin/admin'));
								}
								elseif(Yii::app()->user->role=='client'){
									$this->redirect(array('client/index','first'=>'1'));
								}
								elseif(Yii::app()->user->role=='supplier'){
									$this->redirect(array('supplier/index','first'=>'1'));
								}else{
									$this->redirect(array('site'));
								}
							}
							else{
								Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
								$this->redirect(Yii::app()->createUrl('/site/supplier'));
							}

						}
					}
					else{
						Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
						$this->redirect(Yii::app()->createUrl('/site/login'));
					}
                }
			}
			else{
				Yii::app()->user->setFlash('loginError',"Error retrieving profile information:<br />RESPONSE:<br /><pre>".print_r($response)."</pre>");
				$this->redirect(Yii::app()->createUrl('/site/login'));
			}
		}
	//die('Done');
    }


    /*
    * Cron job actions
    * Schedular basis
    */

    public function actionReminder()
    {
        //die("doing cron job wait for me");
        /*
        * Finding all projects which has been started two/four days ago
        */
        echo "Sending mails to project owners which are 2 or 4 days old<br>";
        $twoNfourDays = ClientProjects::model()->findAll("state=:state AND add_date <> '' AND (datediff(now(), add_date) = 2 OR datediff(now(), add_date) = 4)  ",array(":state"=>1));
        foreach($twoNfourDays as $project)
        {
            $data["name"] = $project->clientProfiles->first_name." ".$project->clientProfiles->last_name;
            $data["project"] = $project->name;
            $data["email"] = $project->clientProfiles->users->username;
            CVarDumper::dump($data,10,1);
            $this->sendMail($data,'twoNfourDays_reminder');

        }


        /*
        * Finding all 7 Days of starting projects and send mail
        *
        */
        echo "<br>Sending mails to project owners which are 7 days old<br>";
         $sevenDays = ClientProjects::model()->findAll("state=:state AND add_date <> '' AND datediff(now(), add_date) = 7 ",array(":state"=>1));
        foreach($sevenDays as $project)
        {
            $data["name"] = $project->clientProfiles->first_name." ".$project->clientProfiles->last_name;
            $data["project"] = $project->name;
            $data["email"] = $project->clientProfiles->users->username;
            CVarDumper::dump($data,10,1);
            $this->sendMail($data,'sevenDays_reminder');

        }

        /*
        * Finding all client profiles who are 5 and 20 days old
        */
        echo "<br>Sending mails to users for feedback who are 5 or 20  days old<br>";
        $fiveNtwentyDaysOldProfiles = Users::model()->findAll("status=:status AND add_date <> '' AND (datediff(now(), add_date) = 5 OR datediff(now(), add_date) = 20) ",array(":status"=>1)) ;
        foreach($fiveNtwentyDaysOldProfiles as $users)
        {
            $data["name"] = $users->display_name;
            $data["email"] = $users->username;
            CVarDumper::dump($data,10,1);
            $this->sendMail($data,'fiveNtwentyDaysOldProfiles_feedback');

        }

        /*
        * Email asking Supplier to complete Profile, Reminder every 2, 4 and 7days
        */
        echo "<br>Sending asking Supplier to complete Profile, Reminder every 2, 4 and 7days<br>";
        $completeProfileReminder =  Suppliers::model()->findAll("is_application_submit = 0 AND add_date <> '' AND (datediff(now(), add_date) = 2 OR datediff(now(), add_date) = 4 OR datediff(now(), add_date) = 7 )");
        foreach($completeProfileReminder as $users)
        {
            $data["name"] = $users->first_name." ".$users->last_name;
            $data["email"] = $users->users->username;
            CVarDumper::dump($data,10,1);
            $this->sendMail($data,'reminder_completeProfile');

        }

        /*
        * 2 days after ^
        * SuppliersHasReferences
        **/

        $pastClient_2days_old = SuppliersHasReferences::model()->findAll("status=0 AND created <> '' AND (datediff(now(), created) = 2)",array());
        foreach($pastClient_2days_old as $users)
        {
            $data = $users->attributes;

            $data["supplier_id"]	= $users->suppliers_id ;
			$data['company_name'] 	= $users->suppliers->name;
			$data['first_name'] 	= $users->suppliers->first_name ;
			$data['last_name'] 		= $users->suppliers->last_name ;
			$data['email']			= $users->client_email ;
			$data['client_id'] 		= $users->client_id ;

            CVarDumper::dump($data,10,1);
            $this->sendMail($data,'followup');

        }
        /*
        *Sending mail after 2 days  IF clarifications not yet checked by the client
        */

        echo "<br> Sending mail after 2 days  IF clarifications not yet checked by the client.";
        $reminder_clarificationNotChecked = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND datediff(now(), add_date) = 2 ",array(":status"=>1));
        CVarDumper::dump($reminder_clarificationNotChecked,10,1);
        if(!empty($reminder_clarificationNotChecked)){
             foreach($reminder_clarificationNotChecked as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
                $data['id'] = $project->id;
                $data['pid'] = $project->client_projects_id;
                CVarDumper::dump($data,10,1);
                $this->sendMail($data,'seek_clarification');

            }
        }else{
            echo " -  NO records found ";
        }
        /*
        * Reminder email to be sent after 2 or 7
        * IF propsal not yet checked by the client.
        */

        echo "<br> Sending Reminder email to be sent after 2 or 7 IF propsal not yet checked by the client..";
        $reminder_propsalsNotChecked = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND (datediff(now(), add_date) = 2 OR datediff(now(), add_date) = 7) ",array(":status"=>2));
        CVarDumper::dump($reminder_propsalsNotChecked,10,1);
        if(!empty($reminder_propsalsNotChecked)){
             foreach($reminder_propsalsNotChecked as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
				$data["id"] = $project->client_projects_id;
                CVarDumper::dump($data,10,1);
                $this->sendMail($data,'remainder_email_22hour_2days_not_seen_proposal');

            }
        }else{
            echo " -  NO records found ";
        }

        /*
        * ONe week after the client approves a supplier
        */

        echo "<br> Sending mail after 1week of proposal accepted by the client.";
        $feedback_email_after1week_supplierApproved = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND datediff(now(), add_date) = 7  ",array(":status"=>4));
        CVarDumper::dump($feedback_email_after1week_supplierApproved,10,1);
        if(!empty($feedback_email_after1week_supplierApproved)){
             foreach($feedback_email_after1week_supplierApproved as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
				$referance	=	SuppliersHasReferences::model()->findByAttributes(array('suppliers_id'=>$project->suppliers_id,'client_id'=>$project->clientProjects->client_profiles_id));
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["supplier_name"] = $project->suppliers->first_name." ".$project->suppliers->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
				$data["references_id"] = $referance->id;
                CVarDumper::dump($data,10,1);
                $this->sendMail($data,'feedback_email_after1week_supplierApproved');

            }
        }else{
            echo " -  NO records found ";
        }




       // CVarDumper::dump($twoNfourDays,10,1);
    }

    public function actionHourlyReminder()
    {
        /*
        * Finding all the propsal assigned to supplier which are 22 hour old and has not been pitched yet
        *
        */
        echo "<br> Sending mail to 22 hour old propsal not pitched";
        $projectAllocatedAfter_22hour = SuppliersProjectsProposals::model()->findAll("status=:status AND add_date <> '' AND TIMESTAMPDIFF(HOUR,add_date,NOW()) = 22 ",array(":status"=>0));
        if(!empty($projectAllocatedAfter_22hour)){
            foreach($projectAllocatedAfter_22hour as $project)
            {
                $data["name"] = $project->suppliers->first_name." ".$project->suppliers->last_name;
                $data["email"] = $project->suppliers->users->username;
                $data["project"] = $project->clientProjects->name;
                CVarDumper::dump($data,10,1);
            //$this->sendMail($data,'remainder_email_22hourOld_notpitched');

        }
        }else{
            echo " -  NO records found ";
        }

        /*
        * Reminder email to be sent after 24 hours or
        *2 days IF clarifications not yet checked by the client.
        */

        echo "<br> Sending mail after 24 hours  IF clarifications not yet checked by the client.";
        $reminder_clarificationNotChecked = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND (TIMESTAMPDIFF(minute,add_date,NOW()) >= 1440 AND TIMESTAMPDIFF(minute,add_date,NOW()) <= 1445) ",array(":status"=>1));
        CVarDumper::dump($reminder_clarificationNotChecked,10,1);
        if(!empty($reminder_clarificationNotChecked)){
             foreach($reminder_clarificationNotChecked as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
                $data['id'] = $project->id;
                $data['pid'] = $project->client_projects_id;
                CVarDumper::dump($data,10,1);
                 $this->sendMail($data,'seek_clarification');

            }
        }else{
            echo " -  NO records found ";
        }


        /*
        * Reminder email to be sent after 24 hours
        * IF proposal not yet checked by the client.
        */

        echo "<br> Sending mail after 24 hours  IF proposal not yet checked by the client.";
        $reminder_proposalNotChecked = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND (TIMESTAMPDIFF(minute,add_date,NOW()) >= 1440 AND TIMESTAMPDIFF(minute,add_date,NOW()) <= 1445) ",array(":status"=>2));
        CVarDumper::dump($reminder_proposalNotChecked,10,1);
        if(!empty($reminder_proposalNotChecked)){
             foreach($reminder_proposalNotChecked as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
                $data['id'] = $project->id;
                $data['pid'] = $project->client_projects_id;
                CVarDumper::dump($data,10,1);
                 $this->sendMail($data,'remainder_email_22hour_2days_not_seen_proposal');

            }
        }else{
            echo " -  NO records found ";
        }


    //CVarDumper::dump($projectAllocatedAfter_22hour,10,1);

    }

    public function actionTest()
    {
        $this->layout='test';
        $this->render("test");

    }

    /*
    * Send chat Messages
    */
    public function actionSendChatMessage($to)
    {


        if(!empty($_GET["to"]) && isset($_GET["from"]) && isset($_GET["message"]) ){

            $to = Users::model()->findByAttributes(array("id"=>$_GET["to"]));
            $project = SuppliersProjectsProposals::model()->findByPk($_GET["from"]);


            if(!empty($to)){
                $data["email"] = $to->username;

                $data["message"] = (isset($_GET["message"])?$_GET["message"]:"");
                if($to->role_id==2){

                    $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                    $data["from"]= $project->suppliers->first_name." ".$project->suppliers->last_name;


                }
                else if($to->role_id==3){

                    $data["name"]=$project->suppliers->first_name." ".$project->suppliers->last_name;
                    $data["from"]=$project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;

                }




                //CVarDumper::dump($data,10,1);
                if($this->sendMail($data,'reminder_chatMessages'))
                    echo 1;
            }
            else{
                echo 0;
            }
        }

    }
	
	
	/* Changes start for new GetStarted and Flow */
	public function actionNewProject()
	{
		$this->layout="//layouts/projSite";
		//$client_projects	=	ClientProjects::model()->findByPk($id);
		$client_projects 	=	new ClientProjects;
		if(isset($_POST['ClientProjects']))
		{		$clientProjInfo		=	$_POST;
				//CVarDumper::dump($clientProjInfo,10,1);die;
				if(Yii::app()->user->isGuest)
				{
					
				}
				else
				{	
					
					
			// start current status part from here 
			$listStatus	=	array();
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
			$client_projects->current_status		=	$_POST['current_status'];
			$client_projects->other_current_status	=	(isset($_POST['ClientProjects']['other_current_status']))?$_POST['ClientProjects']['other_current_status']:'';
			$client_projects->regions				=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && $_POST['ClientProjects']['preferences']!='regoin')
				$client_projects->regions	=	'';
			$client_projects->start_date =	(isset($_POST['ClientProjects']['start_date']))?date('Y-m-d',strtotime($_POST['ClientProjects']['start_date'])):'';
			$client_projects->other_status=4;
			$client_projects->state	=	2;
			
			
			/*$client_projects->state	=	2;
			$users	=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
			$client_data=array();
			$client_data['name']		=	$users->first_name;
			$client_data['email']		=	$users->email;
			$this->sendMail($client_data,'submit_rfp');*/
			
			
			
			
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
				/*project documents start here */
				if(isset($_POST['attachment']))
				{
					$attachData	=	$_POST['attachment'];
					
					 foreach($attachData as $data1)
					{
							$data	=	json_decode($data1);
							//CVarDumper::dump($data->url,10,1);die;
							$docs						=	new ClientProjectDocuments;
							$docs->client_projects_id	=	$client_projects->id;
							$docs->path					=	$data->url;
							$docs->type					=	$data->mimetype;
							$docs->name					=	$data->filename;
							$docs->size					=	$data->size;
							$docs->status				=	1;
							$docs->add_date				=	date('Y-m-d');
							$docs->save();
						
					}
				}
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
					$clientProjectCount	=	ClientProfiles::model()->findByPK(Yii::app()->user->profileId);
					
					if(isset($_POST['city_pref']))
					{
						$clientProjectCount->cities_id	=	$_POST['city_pref'];
						$clientProjectCount->save();
					}
					if(count($clientProjectCount->clientProjects)==1)
						$this->redirect(Yii::app()->createUrl('client/index',array('first'=>1)));
        			else
						$this->redirect(Yii::app()->createUrl('client/index'));
			}
			else
					$this->redirect($this->createUrl('site/error'));
        
			die;
		
				
				
				}
			}
		$industries				=	Industries::model()->findAll();
		$services				=	Services::model()->findAll("status in(0,1)");
		//$currentStatus			=	CurrentStatus::model()->findAll();
		$currentStatus			=	CurrentStatus::model()->findAll("id in(2,1) order by id desc");
		$selecetedServices		=	array();
		$selecetedIndustries	=	array();
		$selecetedSkills		=	array();
		//foreach($client_projects->clientProjectsHasServices as $ser)
			//$selecetedServices[]	=	$ser->services_id;
		//foreach($client_projects->clientProjectsHasSkills as $skill)
			//$selecetedSkills[]	=	$skill->skills_id;
		//foreach($client_projects->clientProjectsHasIndustries as $ind)
		//	$selecetedIndustries[]	=	$ind->industries_id;
		$selecetedStatus		=	explode(',',$client_projects->current_status);
		$selecetedTier			=	explode(',',$client_projects->tier);
		$selecetedRegions		=	explode(',',$client_projects->regions);
		
		
		
		$profile 	=	ClientProfiles::model()->FindByAttributes(array('status'=>1));
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
		
		elseif($client_projects->preferences=='city' || $client_projects->preferences=='country' ){
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
		
		ksort($filt);
		$skills	=	Skills::model()->findAll();
		
		
		
		$this->render('newProject',array('project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills));
	
	}
	
	/* for front end */
	public function actionCalculate($id,$pref)
	{
		if(isset($_POST['option']))
			$options	=	explode(',',$_POST['option']);
		else
			$options	=	array();

		$listRegion	=	array();
		$listTier	=	array();
		$cityProfile='';
		$countryProfile='';
		if($pref=='regoin'){
			if(isset($options))
			foreach($options as $sel)
				$listRegion[]	=	$sel;
			if(isset($_POST['tier']))
			foreach($_POST['tier'] as $sel2)
				$listTier[]	=	$sel2;
				
			
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
		elseif($pref=='no-preferences'){
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
		$profile 	=	cities::model()->findByPK($id);
		$country	=	$profile->states_id;
		
		if($pref=='city'|| $pref=='country' ||$pref=='no-preferences'  )
		{
			 
			$country	=	$profile->states_id;
			$region		=	$profile->states->countries_id;
			$list		=	States::model()->findAllByAttributes(array('countries_id'=>$region));
			$cityProfile=	$profile->name;
			$countryProfile=$profile->states->name;
		}	
			
			
			$da			=	States::model()->findByPk($country);
			$tier		=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->countries;
		}
		ksort($filt);
		$this->renderPartial('_budget', array('list'=>$filt,'sel'=>$listTier,'preference'=>$pref,'city'=>$cityProfile,'countryName'=>$countryProfile));
	}
	
	public function actionCreateService()
	{
		$service	=	Services::model()->findByAttributes(array('name'=>$_POST['name']));
		if(empty($service))
			$service	=	new Services;
		if(isset($_POST['name'])){
			$service->name		=	$_POST['name'];
			$service->description	=	'added by user';
			$service->status	=	0;
			if($service->save())
				echo $service->id;
		}
		die;
	}
	
	public function actionNewLogIn()
	{
		/* Right Now Not is use */
		$model	=	new LoginForm;
		$model->username= $_POST['email'];
		$model->password= $_POST['password'];	
		if($model->validate() && $model->loginStatus() && $model->login()){
		echo "in";
		}
		else
		{
			echo $model->errors['password'][0];
		}

	}
	
	public function actionNewSignUp()
	{
		
		$model					=	new LoginForm;
		$users					=	new Users;
		$users->display_name	=	$_POST['first_name'];
		$users->role			=	'';
		$users->password		=	$_POST['password'];
		$users->username		=	$_POST['email'];
		$users->role_id			=	2;
		$users->status			=	1;
		if($users->save())
		{
			$profile	                =	new ClientProfiles;
			$profile->first_name	    =	$users->display_name;
			$profile->email				=	$users->username;
			$profile->last_name	    	=	$users->role;
			$profile->users_id			=	$users->id;
			$profile->cities_id			=	(!empty($_REQUEST['city_Sign']))?$_REQUEST['city_Sign']:134717;
			$profile->team_size		    =	0;
			$profile->company_link		=	'';
			$profile->company_name		=	$_POST['company_name'];
			$profile->status		    =	1;
			$profile->add_date		    =	date('Y-m-d H:i:s');
			if($profile->save()){
				$data['name']		=	$users->display_name;
				$data['email']		=	$users->username;
				$data['password']	=	$users->password;
				$data['linkedin']	=   isset($users->linkedin)?$users->linkedin:'';
				$this->sendMail($data,'rfp_submitted_new_tpl');
			
				$model->username	=	$users->username;
				$model->password	=	$users->password;
				if($model->login())
				{
					$users->status=0;
					if($users->save())
					$response = array("exist" =>true,'message'=>'Welcome to VenturePact. Post your first job by clicking on "Add a new Job". <br>If you would like to discuss your requirements over a call, feel free to schedule a call here.');
					else
					$response = array("exist" =>false,'message'=>'Error occurred during login to your account. Please try again after some time.');
				}
				else{
					$response = array("exist" =>false,'message'=>'Error occurred during login to your account. Please try again after some time.');
				}
			}
			else
				$response = array("exist" =>false,'message'=>'Signup not completed. Error occurred during registration. Please fill all the details carefully.');
		}
		else
			$response = array("exist" =>false,'message'=>'Signup not completed. This email address is already in use.');

		echo json_encode($response);
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
	public function ActionNewLinkedin()
	{
		$role				=	$_REQUEST['role'];
		$API_CONFIG = array(
			'appKey'       => '75anr5w4aijrvv',
			'appSecret'    => 'Aox4aWXcgWh1J3pk',
			'callbackUrl'  => $this->createAbsoluteUrl('/site/newlinkedinAfter',array('role'=>$role))
			);
		$_REQUEST['lType']	=	(isset($_REQUEST['lType'])) ? $_REQUEST['lType'] : '';
		switch($_REQUEST['lType']) {
			case 'initiate':
				$OBJ_linkedin = new LinkedIn($API_CONFIG);
				$_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
				if(!$_GET[LINKEDIN::_GET_RESPONSE]) {
					$response = $OBJ_linkedin->retrieveTokenRequest();
					if($response['success'] === TRUE) {
						Yii::app()->session['oauth_request']	= $response['linkedin'];
						header('Location: ' . LINKEDIN::_URL_AUTH . $response['linkedin']['oauth_token']);
					} else {
						echo "Request token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
					}
				}
				else{
					$response = $OBJ_linkedin->retrieveTokenAccess(Yii::app()->session['oauth_request']['oauth_token'],Yii::app()->session['oauth_request']['oauth_token_secret'], $_GET['oauth_verifier']);
					if($response['success'] === TRUE) {
						Yii::app()->session['oauth_access'] = $response['linkedin'];
						Yii::app()->session['oauth_authorized'] = TRUE;
						$this->redirect(Yii::app()->createUrl('newlinkedinAfter',array('role'=>$role)));
					} else {
						echo "Access token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
					}
				}
			break;
			case 'revoke':
				if(!oauth_session_exists()) {
					throw new LinkedInException('This script requires session support, which doesn\'t appear to be working correctly.');
				}
				$OBJ_linkedin = new LinkedIn($API_CONFIG);
				$OBJ_linkedin->setTokenAccess(Yii::app()->session['oauth_access']);
				$response = $OBJ_linkedin->revoke();
				if($response['success'] === TRUE) {
					session_unset();
					$_SESSION = array();
					if(session_destroy()) {
						header('Location: ' . $_SERVER['PHP_SELF']);
					} else {
						echo "Error clearing user's session";
					}
				} else {
					echo "Error revoking user's token:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
				}
			break;
			default:
				if(version_compare(PHP_VERSION, '5.0.0', '<')) {
					throw new LinkedInException('You must be running version 5.x or greater of PHP to use this library.'); 
				} 
				if(extension_loaded('curl')) {
					$curl_version = curl_version();
					$curl_version = $curl_version['version'];
				}else {
					throw new LinkedInException('You must load the cURL extension to use this library.'); 
				}
			break;
		}
	}	
	
	public function ActionNewLinkedinAfter()
	{
		$API_CONFIG = array(
			'appKey'       => '75anr5w4aijrvv',
			'appSecret'    => 'Aox4aWXcgWh1J3pk',
			'callbackUrl'  => $this->createAbsoluteUrl('/site/newlinkedinAfter',array('role'=>$_REQUEST['role']))
			//'callbackUrl'  => $this->createAbsoluteUrl('/site/newlinkedinAfter')
			);			
		
		$OBJ_linkedin = new LinkedIn($API_CONFIG);
		$response = $OBJ_linkedin->retrieveTokenAccess(Yii::app()->session['oauth_request']['oauth_token'],Yii::app()->session['oauth_request']['oauth_token_secret'], $_GET['oauth_verifier']);
		if($response['success'] === TRUE) {
			Yii::app()->session['oauth_access'] = $response['linkedin'];
			Yii::app()->session['oauth_authorized'] = TRUE;
		}
		Yii::app()->session['oauth_authorized'] = (isset( Yii::app()->session['oauth_authorized']))? Yii::app()->session['oauth_authorized']: FALSE;
		if( Yii::app()->session['oauth_authorized'] === TRUE) {
			
			$OBJ_linkedin = new LinkedIn($API_CONFIG);
			$OBJ_linkedin->setTokenAccess(Yii::app()->session['oauth_access']);
			$OBJ_linkedin->setResponseFormat(LINKEDIN::_RESPONSE_XML);
			$response = $OBJ_linkedin->profile('~:(id,first-name,last-name,public-profile-url,email-address,picture-url,location,interests,phone-numbers,main-address,positions,skills,educations,network)');
			if($response['success'] === TRUE) {
				$response['linkedin'] = new SimpleXMLElement($response['linkedin']);
				$responseArray = (array) $response['linkedin'];
				$loc	=	(array)$responseArray['location'];
				$postion	=	(array)$responseArray['positions'];
				if(isset($postion['position'][0])){
					$curPo		=	(isset($postion['position'][0]))?(array)$postion['position'][0]:array();
					$company1	=	(isset($curPo['company']))?(array)$curPo['company']:array();
					$company	=	(isset($company1['name']))?$company1['name']:'';
				}
				$location	=	explode(',',$loc['name']);
				if(isset($location[1]) && isset($location[0])){
					$stat	=	States::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[1]),' '),' ')));
					if(empty($stat)){
						$stat				=	new States;
						$stat->name			=	rtrim(ltrim(ucfirst($location[1]),' '),' ');
						$stat->description	=	'Data added from Linkedin';
						$stat->price_zone_id=	1;
						$stat->countries_id	=	1;
						$stat->code			=	1;
						$stat->code2			=	1;
						$stat->status		=	1;
						$stat->save();
					}
					$city	=	Cities::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[0]),' '),' '),'states_id'=>$stat->id));
					if(empty($city)){
						$city				=	new Cities;
						$city->name			=	rtrim(ltrim(ucfirst($location[0]),' '),' ');
						$city->description	=	'Data added from Linkedin';
						$city->states_id	=	$stat->id;
						$city->code			=	1;
						$city->status		=	1;
						$city->save();
					}
				}
				else{
					$city				=	Cities::model()->findByPk(9);
				}
				$linkedinId		=	$responseArray['id'];
				$email			=	$responseArray['email-address'];
				$phone			=	$responseArray['phone-numbers'];
				$display_name	=	(isset($responseArray['first-name']))?$responseArray['first-name']:'';
				$profileUrl		=	(isset($responseArray['public-profile-url']))?$responseArray['public-profile-url']:'';
				$profilePic		=	(isset($responseArray['picture-url']))?$responseArray['picture-url']:'';
				$last_name		=	(isset($responseArray['last-name']))?$responseArray['last-name']:'';
				$education1		=	(array)$responseArray['educations'];
				if(!empty($education1['education']))
					$educations		=	$education1['education'];
				else	
					$educations		=	array();
				if(!empty($responseArray['positions']))
					$position1		=	(array)$responseArray['positions'];
				else
					$position1		=	array();
				
				if(!empty($position1) && !empty($position1['position']))
					$positions		=	$position1['position'];
				else	
					$positions		=	array();
				$record_exists	=	Users::model()->find('linkedin = :linkedinId and username = :username', array(':linkedinId'=>$linkedinId,':username'=>$email));
				if(!empty($record_exists)){
					Yii::app()->user->setFlash('loginError','User Already Exists Please Log In.');
								$this->redirect(Yii::app()->createUrl('/site/login'));
					/*
					
					
					$model     			=     new LoginForm;
					$model->username	=	$record_exists->username;
					$model->password	=	$record_exists->password;
					if($model->validate() && $model->login()){
						if(isset(Yii::app()->user->role)){
							$this->redirect(array('site/newProjSubmit'));
						}else{
							$this->redirect(array('site/login'));
						}
					}
				*/}
				else{
					$users	=	Users::model()->findByAttributes(array('username'=>$email));
					if(empty($users)){
						$users					=	new Users;
						$users->username		=	$email;
						$password				=	time();
						$users->password		=	$password;
						$users->status			=	1;
						$users->role_id			=	$_REQUEST['role'];
						$users->display_name	=	$display_name;
						$users->add_date		=	date('Y-m-d H:i:s');
					}
					$users->linkedin			=	$linkedinId;
					if($users->save())
					{
						if($_REQUEST['role']==2){
							$profile	=	ClientProfiles::model()->find('users_id = :userId', array(':userId'=>$users->id));
							if(empty($profile)){
								$profile	                =	new ClientProfiles;
								$profile->first_name	    =	$display_name;
								$profile->last_name			=	$last_name;
								$profile->email				=	$email;
								$profile->phone_number		=	(isset($phone))?$phone:"";
								$profile->image				=	$profilePic;
								$profile->users_id		    =	$users->id;
								$profile->cities_id		    =	$city->id;
								$profile->company_name		=	(isset($company))?$company:'';
								$profile->status			=	1;
								$profile->add_date		    =	date('Y-m-d H:i:s');
								$profile->save();
							}
							$model				=	new LoginForm;
							$model->username	=	$users->username;
							$model->password	=	$users->password;
							if($model->login()){
								$data['name']		=	$users->display_name;
								$data['email']		=	$users->username;
								$data['password']	=	$users->password;
								$data['linkedin']	=	isset($users->linkedin)?$users->linkedin:'';
								$this->sendMail($data,'rfp_submitted_new_tpl');
								if(isset(Yii::app()->user->role)){
									$this->redirect(array('site/newProjSubmit'));
								}else{
									$this->redirect(array('site/login'));
								}
							}
							else{
								Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
								$this->redirect(Yii::app()->createUrl('/site/login'));
							}
						}
						else{
							$profile	=	Suppliers::model()->find('users_id = :userId', array(':userId'=>$users->id));
							if(empty($profile)){
								$profile	                =	new Suppliers;
								$profile->first_name	    =	$display_name;
								$profile->last_name			=	$last_name;
								$profile->name			    =	$users->display_name;
								$profile->email				=	$email;
								$profile->phone_number		=	(isset($phone))?$phone:"";
								$profile->logo				=	$profilePic;
								$profile->users_id		    =	$users->id;
								$profile->cities_id		    =	$city->id;
								$profile->status		    =	0;
								$profile->add_date		    =	date('Y-m-d H:i:s');
								$profile->save();
								//CVarDumper::dump($profile,10,1);die;
							}
							$model				=	new LoginForm;
							$model->username	=	$users->username;
							$model->password	=	$users->password;
							if($model->login()){

                                $data['name']		=	$users->display_name;
                                $data['email']		=	$users->username;
                                $data['password']	=	$users->password;
                                $this->sendMail($data,'complete_profile');
								$this->redirect(array('site/newProjSubmit'));
								
							}
							else{
								Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
								$this->redirect(Yii::app()->createUrl('/site/supplier'));
							}

						}
					}
					else{
						Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
						$this->redirect(Yii::app()->createUrl('/site/login'));
					}
                }
			}
			else{
				Yii::app()->user->setFlash('loginError',"Error retrieving profile information:<br />RESPONSE:<br /><pre>".print_r($response)."</pre>");
				$this->redirect(Yii::app()->createUrl('/site/login'));
			}
		}
	//die('Done');
    }
	public function actionNewProjSubmit()
	{
		 $this->render('testPost');
	}
	
    function bm25Weight($query, $collection, $tfWeight = 1, $dlWeight = 0.5) {
                $docScores = array();
                $count = count($collection['documents']);
                foreach($query as $term) {
                        $df = count($collection['terms'][$term]);
                        foreach($collection['terms'][$term] as $docID => $tf) {
                                $docLength = $collection['documents'][$docID];
                                $idf = log($count/$df);
                                $num = ($tfWeight + 1) * $tf;
                                $denom = $tfWeight
                                        * ((1 - $dlWeight) + $dlWeight *
                                                ($docLength / $collection['averageLength']))
                                        + $tf;
                                $score = $idf * ($num/$denom);
                                $docScores[$docID] = isset($docScores[$docID]) ?
                                                        $docScores[$docID] + $score : $score;
                        }
                }
                return $docScores;
        }







	
}
