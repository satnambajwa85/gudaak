<?php

class CounselorController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete','dynamicList','adminView','createNew'),
				'expression' =>"Yii::app()->user->userType ==  'admin'",
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
		$model=new Counselor;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Counselor']))
		{
			$model->attributes=$_POST['Counselor'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/counselor/';
			if (!empty($_FILES['Counselor']['name']['image'])) {
				$tempFile = $_FILES['Counselor']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['Counselor']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/counselor/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/counselor/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/counselor/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}else{
				$model->image	=	'noimage.jpg';
			}
			CVarDumper::dump($model,10,1);
			die;
			if($model->save())
				$this->redirect(array('admin'));
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

		if(isset($_POST['Counselor']))
		{
			$model->attributes=$_POST['Counselor'];
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Counselor');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Counselor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Counselor']))
			$model->attributes=$_GET['Counselor'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Counselor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='counselor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
