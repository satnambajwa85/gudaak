<?php

class CareerDetailsController extends Controller
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
				'actions'=>array('create','update','DynamicCareer','DynamicCareerList','admin','delete','adminView','createNew'),
				'expression' =>"Yii::app()->user->userType ==  'admin'",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','DynamicCareer','DynamicCareerList'),
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
		$model=new CareerDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CareerDetails']))
		{
			$model->attributes=$_POST['CareerDetails'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/career_details/';
			if (!empty($_FILES['CareerDetails']['name']['image'])) {
				$tempFile = $_FILES['CareerDetails']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['CareerDetails']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/career_details/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_details/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_details/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}
			if($model->save())
				$this->redirect(array('adminView','id'=>$model->career_options_id));//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreateNew($id)
	{
		$model=new CareerDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CareerDetails']))
		{
			$model->attributes=$_POST['CareerDetails'];
			$cut	=	CareerDetails::model()->findByAttributes(array('title'=>$model->title,'career_options_id'=>$model->career_options_id));
			if(empty($cut)){
				
			
				$targetFolder = Yii::app()->request->baseUrl.'/uploads/career_details/';
				if (!empty($_FILES['CareerDetails']['name']['image'])) {
					$tempFile = $_FILES['CareerDetails']['tmp_name']['image'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['CareerDetails']['name']['image'];
					$pat = $targetFile;
					move_uploaded_file($tempFile,$targetFile);
					$absoPath = $pat;
					$newName = time();
					$img = Yii::app()->imagemod->load($pat);
					# ORIGINAL
					$img->file_max_size = 5000000; // 5 MB
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_details/original/');
					$img->processed;
					#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
					if ($img->processed) {
						#THUMB Image
						$img->image_resize      = true;
						$img->image_y         	= 304;
						$img->image_x           = 304;
						$img->file_new_name_body = $newName;
						$img->process('uploads/career_details/large/');
						
						#STHUMB Image
						$img->image_resize      = true;
						$img->image_y         	= 115;
						$img->image_x           = 265;
						$img->file_new_name_body = $newName;
						$img->process('uploads/career_details/small/');
					 
						$fileName	=	$img->file_dst_name;
						$img->clean();
		
					}
					$model->image	=	$fileName;
				}
				if($model->save())
					$this->redirect(array('adminView','id'=>$model->career_options_id));//$this->redirect(array('view','id'=>$model->id));
			}
			else
				Yii::app()->user->setFlash('error', "Title already exists");
		}

		$this->render('form',array(
			'model'=>$model,'id'=>$id
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

		if(isset($_POST['CareerDetails']))
		{
			$model->attributes=$_POST['CareerDetails'];
			$cut	=	CareerDetails::model()->findByAttributes(array('title'=>$model->title,'career_options_id'=>$model->career_options_id));
			if(empty($cut) || $cut->id==$model->id){
				$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/career_details/';
					$targetFolder = Yii::app()->request->baseUrl.'/uploads/career_details/';
				if (!empty($_FILES['CareerDetails']['name']['image'])) {
					$tempFile = $_FILES['CareerDetails']['tmp_name']['image'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['CareerDetails']['name']['image'];
					$pat = $targetFile;
					move_uploaded_file($tempFile,$targetFile);
					$absoPath = $pat;
					$newName = time();
					$img = Yii::app()->imagemod->load($pat);
					# ORIGINAL
					$img->file_max_size = 5000000; // 5 MB
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_details/original/');
					$img->processed;
					#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_details/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_details/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
				if($_POST['CareerDetails']['oldImage']!=''){
					@unlink($targetFolder1.'original/'.$_POST['CareerDetails']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['CareerDetails']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['CareerDetails']['oldImage']);
				}
				 
			}
			else
				$model->image	=	$_POST['CareerDetails']['oldImage'];
				if($model->save())
					$this->redirect(array('adminView','id'=>$model->career_options_id));//$this->redirect(array('careerDetails/adminView','id'=>$model->id));
			}
			else
				Yii::app()->user->setFlash('error', "Title already exists");
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
		CareerOptions::model()->deleteAllByAttributes(array('career_options_id'=>$id));
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
		$dataProvider=new CActiveDataProvider('CareerDetails');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CareerDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CareerDetails']))
			$model->attributes=$_GET['CareerDetails'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdminView($id)
	{
		$model=new CareerDetails('search');
		$model->unsetAttributes();  // clear any default values
		$model->career_options_id=$id;
		if(isset($_GET['CareerDetails']))
			$model->attributes=$_GET['CareerDetails'];

		$this->render('admin',array(
			'model'=>$model,'id'=>$id
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CareerDetails the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CareerDetails::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CareerDetails $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='career-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionDynamicCareer()
	{	 
		$getId = '';
		if(!empty($_POST['CareerDetails']['career_categories_id'])) 
			$getId	 = $_POST['CareerDetails']['career_categories_id'];
			$data	=	Career::model()->findAll('career_categories_id =:parent_id',array(':parent_id'=>(int) $getId));
			$data	=	CHtml::listData($data,'id','title');
			echo '<option value="0">Please Select</option>';
			foreach($data as $value=>$name){
				echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
			}
		die;
	}
	public function actionDynamicCareerList()
	{	 
		$getId = '';
		if(!empty($_POST['CareerDetails']['career_id'])) 
			$getId	 = $_POST['CareerDetails']['career_id'];
			$data	=	CareerOptions::model()->findAll('career_id =:parent_id',array(':parent_id'=>(int) $getId));
			$data	=	CHtml::listData($data,'id','title');
			echo '<option value="0">Please Select</option>';
			foreach($data as $value=>$name){
				echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
			}
		die;
	}		
}
