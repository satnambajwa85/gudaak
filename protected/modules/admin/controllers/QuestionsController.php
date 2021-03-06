<?php

class QuestionsController extends Controller
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
		$model=new Questions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Questions']))
		{
			$model->attributes		=$_POST['Questions'];
			$model->orient_items_id	=$_POST['Questions']['orient_items_id'];
			$model->options			=$_POST['Questions']['options'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/questions/';
			if (!empty($_FILES['Questions']['name']['image'])) {
				$tempFile = $_FILES['Questions']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['Questions']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/questions/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 500;
					$img->image_x           = 500;
					$img->file_new_name_body = $newName;
					$img->process('uploads/questions/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 100;
					$img->image_x           = 100;
					$img->file_new_name_body = $newName;
					$img->process('uploads/questions/small/');
			 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}
			if($model->save()){
				foreach($model->options as $optionsList){
					$option	=	new QuestionsHasQuestionOptions;
					$option->question_options_id 	 = $optionsList;
					$option->questions_id			=	$model->id;
					$option->save();
					
					
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}
	
		$this->render('create',array('model'=>$model));
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

		if(isset($_POST['Questions']))
		{
			$model->attributes=$_POST['Questions'];
			$model->orient_items_id	=$_POST['Questions']['orient_items_id'];
			$model->options			=$_POST['Questions']['options'];
				$targetFolder1 = $_SERVER['DOCUMENT_ROOT'].Yii::app()->baseUrl.'/uploads/questions/';
				//echo $targetFolder1;die;
					$targetFolder = Yii::app()->request->baseUrl.'/uploads/countries/';
				if (!empty($_FILES['Questions']['name']['image'])) {
					$tempFile = $_FILES['Questions']['tmp_name']['image'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['Questions']['name']['image'];
					$pat = $targetFile;
					move_uploaded_file($tempFile,$targetFile);
					$absoPath = $pat;
					$newName = time();
					$img = Yii::app()->imagemod->load($pat);
					# ORIGINAL
					$img->file_max_size = 5000000; // 5 MB
					$img->file_new_name_body = $newName;
					$img->process('uploads/questions/original/');
					$img->processed;
					#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
						#THUMB Image
						$img->image_resize      = true;
						$img->image_y         	= 500;
						$img->image_x           = 500;
						$img->file_new_name_body = $newName;
						$img->process('uploads/questions/large/');
						
						#STHUMB Image
						$img->image_resize      = true;
						$img->image_y         	= 100;
						$img->image_x           = 100;
						$img->file_new_name_body = $newName;
						$img->process('uploads/questions/small/');
				 
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
				if($_POST['Questions']['oldImage']!=''){
					@unlink($targetFolder1.'original/'.$_POST['Questions']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['Questions']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['Questions']['oldImage']);
			 
				}
			}
			else
				$model->image	=	$_POST['Questions']['oldImage'];
			if($model->save()){
					foreach($model->options as $optionsList){
					$option	=	new QuestionsHasQuestionOptions;
					$option->question_options_id 	 = $optionsList;
					$option->questions_id			=	$model->id;
					$option->save();
					
					
				}
			}
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
		$dataProvider=new CActiveDataProvider('Questions');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Questions('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Questions']))
			$model->attributes=$_GET['Questions'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Questions the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Questions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Questions $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='questions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
