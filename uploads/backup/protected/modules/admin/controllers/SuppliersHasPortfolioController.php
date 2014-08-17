<?php

class SuppliersHasPortfolioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
public $filpickerKey = "AlqJxqOBnROGcRhBT1jPFz";
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view'),
				'expression'=>'Yii::app()->user->role=="admin"',
				//'users'=>array('admin'),
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
		$model=new SuppliersHasPortfolio;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SuppliersHasPortfolio']))
		{
			$model->attributes=$_POST['SuppliersHasPortfolio'];

			if($model->save())
			{
				foreach($_POST['SuppliersHasSkills']['skills_id'] as $skill)
				{
					$supSkills	=	new SuppliersPortfolioHasSkills;
					$supSkills->portfolio_id	=	$model->id;
					$supSkills->skills_id		=	$skill;
					$supSkills->status			=	0;
					$supSkills->add_date		=	date('Y-m-d H:i:s');
					$supSkills->save();

				}
			}
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
		 $supplierSkills	=	array();
		foreach($model->suppliersPortfolioHasSkills as $skilled)
		 $supplierSkills[]=$skilled->id;

		if(isset($_POST['SuppliersHasPortfolio']))
		{
			$model->attributes=$_POST['SuppliersHasPortfolio'];
				if($model->save())
				{
							$supSkills	=	SuppliersPortfolioHasSkills::model()->findAllByAttributes(array('portfolio_id'=>$model->id));
						foreach($supSkills as $suppSklls)
							  $suppSklls->delete();
						foreach($_POST['SuppliersHasSkills']['skills_id'] as $skill)
						{
								$supSkills	=	new SuppliersPortfolioHasSkills;
								$supSkills->portfolio_id	=	$model->id;
								$supSkills->skills_id		=	$skill;
								$supSkills->status			=	0;
								$supSkills->add_date		=	date('Y-m-d H:i:s');
								$supSkills->save();

						}

				}
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array('model'=>$model,'supplierSkills'=>$supplierSkills));
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
		$dataProvider=new CActiveDataProvider('SuppliersHasPortfolio');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SuppliersHasPortfolio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SuppliersHasPortfolio']))
			$model->attributes=$_GET['SuppliersHasPortfolio'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SuppliersHasPortfolio the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SuppliersHasPortfolio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SuppliersHasPortfolio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliers-has-portfolio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
