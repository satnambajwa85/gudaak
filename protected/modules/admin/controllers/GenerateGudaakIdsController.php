<?php

class GenerateGudaakIdsController extends Controller
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
				'actions'=>array('create','update','admin','delete','dynamicList','adminView','createNew'),
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
		
		$model=new GenerateGudaakIds;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GenerateGudaakIds']))
		{	
			$number_of_user_Ids	=	$_POST['GenerateGudaakIds']['number_of_user_Ids'];
			if(empty($number_of_user_Ids)){
				Yii::app()->user->setFlash('error',"Please fill carefully.");
				$this->redirect(array('create'));
				die;
			}
				
			for ($x=1; $x<=$number_of_user_Ids; $x++)
			{	
				$rendT	=	 rand(5, 99999999);
				$GDKid				=	new GenerateGudaakIds;
				$GDKid->attributes	=	$_POST['GenerateGudaakIds'];
				$gudaakID			=	'GDK-S'.$_POST['GenerateGudaakIds']['schools_id'].'-C'.$_POST['GenerateGudaakIds']['cities_id'].'-'.$rendT;
				$GDKid->gudaak_id	=	$gudaakID;
				$GDKid->add_date 	=	date('Y-m-d H:i:s');
				$GDKid->save();
		    }

		} 
		
		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionCreateNew($id)
	{
		$school		=	Schools::model()->findByPk($id);
		$model=new GenerateGudaakIds;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GenerateGudaakIds']))
		{	
			$number_of_user_Ids	=	$_POST['GenerateGudaakIds']['number_of_user_Ids'];
			if(empty($number_of_user_Ids)){
				Yii::app()->user->setFlash('error',"Please fill carefully.");
				$this->redirect(array('create'));
				die;
			}
				
			for ($x=1; $x<=$number_of_user_Ids; $x++)
			{	
				$rendT	=	 rand(5, 99999999);
				$GDKid				=	new GenerateGudaakIds;
				$GDKid->attributes	=	$_POST['GenerateGudaakIds'];
				$gudaakID			=	'GDK-S'.$_POST['GenerateGudaakIds']['schools_id'].'-C'.$_POST['GenerateGudaakIds']['cities_id'].'-'.$rendT;
				$GDKid->gudaak_id	=	$gudaakID;
				$GDKid->activation	=1;
				$GDKid->add_date 	=	date('Y-m-d H:i:s');
				$GDKid->save();
		    }
		
		} 
		
		$this->render('createNew',array('model'=>$model,'school'=>$school));
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

		if(isset($_POST['GenerateGudaakIds']))
		{
			$model->attributes=$_POST['GenerateGudaakIds'];
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
		$dataProvider=new CActiveDataProvider('GenerateGudaakIds');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GenerateGudaakIds('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GenerateGudaakIds']))
			$model->attributes=$_GET['GenerateGudaakIds'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GenerateGudaakIds the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GenerateGudaakIds::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionAdminView()
	{
		$id	=	$_REQUEST['id'];
		$school		=	Schools::model()->findByPk($id);
		$model=new GenerateGudaakIds('search');
		if(isset($id))
			$model->schools_id=$id; 
			$model->activation=1;
		if(isset($_GET['GenerateGudaakIds']))
			$model->attributes=$_GET['GenerateGudaakIds'];

		$this->render('admin2',array(
			'model'=>$model,'id'=>$id,'school'=>$school
		));
	}
	/**
	 * Performs the AJAX validation.
	 * @param GenerateGudaakIds $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='generate-gudaak-ids-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionDynamicList()
	{	 
		$getId = '';
		if(!empty($_POST['GenerateGudaakIds']['schools_id'])) 
			$getId	 	= $_POST['GenerateGudaakIds']['schools_id'];
			$data		=	 Schools::model()->findByAttributes(array('id'=>$getId));
			$data		=	 Cities::model()->findAll('id =:id',array(':id'=>(int) $data->cities_id));
			$data		=	CHtml::listData($data,'id','title');
			foreach($data as $value=>$name){
				echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
			}
		die;

			 
	}
}
