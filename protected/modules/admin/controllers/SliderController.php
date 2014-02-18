<?php

class SliderController extends Controller
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
				'users'=>array('@'),
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
		$model=new Slider;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slider']))
		{
			$model->attributes=$_POST['Slider'];
			
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/slider/';
			if (!empty($_FILES['Slider']['name']['image1'])) {
				$tempFile = $_FILES['Slider']['tmp_name']['image1'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['Slider']['name']['image1'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/slider/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 117;
					$img->image_x           = 173;
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image1	=	$fileName;
			}
			if (!empty($_FILES['Slider']['name']['image2'])) {
				$tempFile = $_FILES['Slider']['tmp_name']['image2'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['Slider']['name']['image2'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/slider/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 117;
					$img->image_x           = 173;
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image2	=	$fileName;
			}
				
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Slider']))
		{
			$model->attributes=$_POST['Slider'];
			
			$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/slider/';
					$targetFolder = Yii::app()->request->baseUrl.'/uploads/slider/';
				if (!empty($_FILES['Slider']['name']['image1'])) {
					$tempFile = $_FILES['Slider']['tmp_name']['image1'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['Slider']['name']['image1'];
					$pat = $targetFile;
					move_uploaded_file($tempFile,$targetFile);
					$absoPath = $pat;
					$newName = time();
					$img = Yii::app()->imagemod->load($pat);
					# ORIGINAL
					$img->file_max_size = 5000000; // 5 MB
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/original/');
					$img->processed;
					#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 335;
					$img->image_x           = 1800;
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 90;
					$img->image_x           = 162;
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image1	=	$fileName;
				if($_POST['Slider']['oldImage']!=''){
					@unlink($targetFolder1.'original/'.$_POST['Slider']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['Slider']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['Slider']['oldImage']);
				}
			}
				if (!empty($_FILES['Slider']['name']['image2'])) {
					$tempFile = $_FILES['Slider']['tmp_name']['image2'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['Slider']['name']['image2'];
					$pat = $targetFile;
					move_uploaded_file($tempFile,$targetFile);
					$absoPath = $pat;
					$newName = time();
					$img = Yii::app()->imagemod->load($pat);
					# ORIGINAL
					$img->file_max_size = 5000000; // 5 MB
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/original/');
					$img->processed;
					#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 335;
					$img->image_x           = 1800;
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 90;
					$img->image_x           = 162;
					$img->file_new_name_body = $newName;
					$img->process('uploads/slider/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image2	=	$fileName;
				if($_POST['Slider']['oldImage']!=''){
					@unlink($targetFolder1.'original/'.$_POST['Slider']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['Slider']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['Slider']['oldImage']);
				}
			}
			
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
		$dataProvider=new CActiveDataProvider('Slider');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Slider('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slider']))
			$model->attributes=$_GET['Slider'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Slider the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Slider::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Slider $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='slider-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
