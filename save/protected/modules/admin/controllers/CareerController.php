<?php

class CareerController extends Controller
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
				'actions'=>array('create','update','admin','delete','adminView','createNew'),
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
		$model=new Career;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Career']))
		{
			$model->attributes=$_POST['Career'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/career/';
			if (!empty($_FILES['Career']['name']['image'])) {
				$tempFile = $_FILES['Career']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['Career']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/career/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}
			if($model->save()){
				if(!empty($_POST['Career']['streams']))
				foreach($_POST['Career']['streams'] as $subject=>$val){
					if($val){
						$modl				=	new StreamHasCareer;
						$modl->career_id	=	$model->id;
						$modl->stream_id	=	$subject;
						$modl->add_date		=	date('Y-m-d H:i:s');
						$modl->status		=	1;
						$modl->published	=	1;
						$modl->save();
					}
					 
				}
				$this->redirect(array('adminView','id'=>$model->career_categories_id));
			}
		}
		$streams	=	array();
		foreach($model->streamHasCareer as $sub)
			$streams[]	=	$sub->stream_id;

		$this->render('create',array(
			'model'=>$model,'streams'=>$streams
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

		if(isset($_POST['Career']))
		{
			$model->attributes			=	$_POST['Career'];
			$model->modification_date	=	date('Y-m-d H:i:s');
			$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/career/';
					$targetFolder = Yii::app()->request->baseUrl.'/uploads/career/';
				if (!empty($_FILES['Career']['name']['image'])) {
					$tempFile = $_FILES['Career']['tmp_name']['image'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['Career']['name']['image'];
					$pat = $targetFile;
					move_uploaded_file($tempFile,$targetFile);
					$absoPath = $pat;
					$newName = time();
					$img = Yii::app()->imagemod->load($pat);
					# ORIGINAL
					$img->file_max_size = 5000000; // 5 MB
					$img->file_new_name_body = $newName;
					$img->process('uploads/career/original/');
					$img->processed;
					#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
				if($_POST['Career']['oldImage']!=''){
					@unlink($targetFolder1.'original/'.$_POST['Career']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['Career']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['Career']['oldImage']);
				}
			}
			else
				$model->image	=	$_POST['Career']['oldImage'];
			
			if($model->save()){
				StreamHasCareer::model()->deleteAllByAttributes(array('career_id'=>$model->id));
				if(!empty($_POST['Career']['streams']))
				foreach($_POST['Career']['streams'] as $subject=>$val){
					if($val){
						$modl				=	new StreamHasCareer;
						$modl->career_id	=	$model->id;
						$modl->stream_id	=	$subject;
						$modl->add_date		=	date('Y-m-d H:i:s');
						$modl->status		=	1;
						$modl->published	=	1;
						$modl->save();
					}
				}
				$this->redirect(array('adminView','id'=>$model->career_categories_id));
			}//$this->redirect(array('view','id'=>$model->id));
		}
		$streams	=	array();
		foreach($model->streamHasCareers as $sub)
			$streams[]	=	$sub->stream_id;

		$this->render('update',array(
			'model'=>$model,'streams'=>$streams
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		StreamHasCareer::model()->deleteAllByAttributes(array('stream_id'=>$id));		
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
		$dataProvider=new CActiveDataProvider('Career');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionCreateNew($id)
	{
		$model=new Career;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Career']))
		{
			$model->attributes=$_POST['Career'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/career/';
			if (!empty($_FILES['Career']['name']['image'])) {
				$tempFile = $_FILES['Career']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['Career']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/career/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}
			if($model->save()){
				if(!empty($_POST['Career']['streams']))
				foreach($_POST['Career']['streams'] as $subject=>$val){
					if($val){
						$modl				=	new StreamHasCareer;
						$modl->career_id	=	$model->id;
						$modl->stream_id	=	$subject;
						$modl->add_date		=	date('Y-m-d H:i:s');
						$modl->status		=	1;
						$modl->published	=	1;
						$modl->save();
					}
				}
				$this->redirect(array('adminView','id'=>$model->career_categories_id));
			}
		}
		$streams	=	array();
		foreach($model->streamHasCareers as $sub)
			$streams[]	=	$sub->stream_id;

		$this->render('form',array('model'=>$model,'id'=>$id,'streams'=>$streams));
	}
	public function actionAdmin()
	{
		$model=new Career('search');
		$model->unsetAttributes();// clear any default values
		if(isset($_GET['Career']))
			$model->attributes=$_GET['Career'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAdminView()
	{
		$id	=	$_REQUEST['id'];
		$model=new Career('search');
		if(isset($id))
			$model->career_categories_id=$id;  // clear any default values
		if(isset($_GET['Career']))
			$model->attributes=$_GET['Career'];

		$this->render('admin',array(
			'model'=>$model,'id'=>$id
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Career the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Career::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Career $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='career-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
