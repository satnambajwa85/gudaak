<?php

class SchoolsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
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
				'actions'=>array('create','update','admin','delete','adminView'),
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
	public function actionCreate($id)
	{
		$model=new Schools;
		if(isset($_POST['Schools']))
		{	
			$model->attributes	=	$_POST['Schools'];
			$testEmail			=	$_POST['Schools']['email'];
			$model->add_date	=	date('Y:m:d H:i:s');
			$model->password	=	md5($_POST['Schools']['password']);
			$model->email		=	$_POST['Schools']['email'];
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
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/schools/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/schools/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->images	=	$fileName;
			}
			if($model->save()){ 
				$schoolUser					=	new UserLogin;
				$schoolUser->username		=	$model->email;
				$schoolUser->password		=	$model->password;
				$schoolUser->activation		=	1;
				$schoolUser->user_role_id	=	4;
				$schoolUser->add_date		=	date('Y-m-d H:i:s');
				if($schoolUser->save()){
					$schoolLogin	=	new SchoolsHasUserLogin;
					$schoolLogin->schools_id	=	$model->id;
					$schoolLogin->user_login_id	=	$schoolUser->id;
					$schoolLogin->add_date		=	date('Y-m-d H:i:s');
					if($schoolLogin->save()){ 
						$this->redirect(array('adminView','id'=>$model->cities_id));
					}
				}
			 
				 
			}
		}

		$this->render('form',array('model'=>$model,'id'=>$id));
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

		if(isset($_POST['Schools']))
		{
			$model->attributes	=$_POST['Schools'];
			$model->password	=123456;
			$model->modification_date 	=date('Y:m:d H:i:s');
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
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/schools/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/schools/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->images	=	$fileName;
				if(isset($_POST['Schools']['oldImage'])){
					@unlink($targetFolder1.'original/'.$_POST['Schools']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['Schools']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['Schools']['oldImage']);
				}
			}
			else
				$model->images	=	$_POST['Schools']['oldImage'];
				//CVarDumper::dump($model,10,1);die;
			if($model->save()){
				 $school					=	SchoolsHasUserLogin::model()->findByAttributes(array('schools_id'=>$id));
				 $school->published 		=	1;
				$school->add_date  		  	=	date('Y-m-d H:i:s');
				if($school->save()){
					$schoolUser					=	UserLogin::model()->findByPk($school->user_login_id);
					$schoolUser->username		=	$school->userLogin->username;
					$schoolUser->password		=	$school->userLogin->password;
					$schoolUser->activation		=	1;
					$schoolUser->user_role_id	=	4;
					$schoolUser->add_date		=	date('Y-m-d H:i:s');
					$this->redirect(array('adminView','id'=>$model->cities_id));
				}
			
			}
				
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
		$dataProvider=new CActiveDataProvider('Schools');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Schools('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Schools']))
			$model->attributes=$_GET['Schools'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Schools the loaded model
	 * @throws CHttpException
	 */
	public function actionAdminView()
	{
		$id	=	$_REQUEST['id'];
		$model=new Schools('search');
		if(isset($id))
			$model->cities_id=$id; 
		if(isset($_GET['Schools']))
			$model->attributes=$_GET['Schools'];
		$this->render('admin',array('model'=>$model,'id'=>$id));
	}
	public function loadModel($id)
	{
		$model=Schools::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Schools $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='schools-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
