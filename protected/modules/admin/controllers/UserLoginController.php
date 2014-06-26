<?php

class UserLoginController extends Controller
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
				'actions'=>array('create','update','admin','delete'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UserLogin;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserLogin']))
		{
			$model->attributes	=	$_POST['UserLogin'];
			$model->password	=	md5($_POST['UserLogin']['password']);
			$model->add_date	=	date('Y-m-d H:s:i');
			if($model->save()){
				$data['name']		=	$model->name;
				$data['email']		=	$model->username;
				$data['password']	=	$_POST['UserLogin']['password'];
				$data['code']		=	$this->createAbsoluteUrl('/site/checkUser',array('email'=>base64_encode($model->username)));
				$this->sendMail($data,'register'); 
				if($model->user_role_id==5){
					
					$user					=	new Counselor;
					$user->user_login_id	=	$model->id;
					$user->email			=	$model->username;
					$user->first_name		=	'first name';
					$user->last_name		=	'last name';
					$user->status			=	1;
					$user->image			=	'noimage.jpg';
					$user->save();
					$this->redirect(array('/admin/counselor/admin'));
				}
				else if($model->user_role_id==4){
					$user					=	new Schools;
					$user->add_date			=	date('Y-m-d');
					$user->email			=	$model->username;
					$user->password			=	$model->password;
					$user->name				=	$model->name;
					$user->cities_id		=	1;
					$user->status			=	1;
					$user->images			=	'noimage.jpg';
					if($user->save()){
						$schoolLogin				=	new SchoolsHasUserLogin;
						$schoolLogin->schools_id	=	$user->id;
						$schoolLogin->user_login_id	=	$model->id;
						$schoolLogin->add_date		=	date('Y-m-d H:i:s');
						if($schoolLogin->save()){
							$this->redirect(array('/admin/schools/adminView','id'=>1));
						}
					}
				}
				else{
					$user	=	 new UserProfiles;
					$user->user_login_id	=	$model->id;
					$user->add_date			=	date('Y-m-d');
					$user->gender			=	'male';
					$user->email			=	$model->username;
					$user->display_name		=	$model->name;
					$user->first_name		=	'first name';
					$user->last_name		=	'last name';
					$user->status			=	1;
					$user->image			=	'noimage.jpg';
					$user->save();
					$this->redirect(array('/admin/userProfiles/admin'));
				}
			}
		}
		$this->render('create',array('model'=>$model,));
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

		if(isset($_POST['UserLogin']))
		{
			$model->attributes=$_POST['UserLogin'];
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
		$dataProvider=new CActiveDataProvider('UserLogin');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserLogin('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserLogin']))
			$model->attributes=$_GET['UserLogin'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserLogin the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserLogin::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserLogin $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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
           echo 'No';
		   return 0;
        }else {
			return 1;
        }
	}
	
}
