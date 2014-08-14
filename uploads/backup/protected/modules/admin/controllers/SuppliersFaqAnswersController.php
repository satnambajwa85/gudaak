<?php

class SuppliersFaqAnswersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
		$model    =   SuppliersFaqAnswers::model()->findAllByAttributes(array('suppliers_id'=>$id));
        //CVarDumper::dump($model,10,1);die;
        $this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

    public function actionAllquestionsanswer()
    {
        $allQuestions  = faq::model()->findAll(array('condition'=>'status=1'));
        return $allQuestions;
    }



	public function actionCreate()
	{
		$model = new SuppliersFaqAnswers;

        $allQuestions = $this->actionAllquestionsanswer();


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SuppliersFaqAnswers']))
		{


		    $totalQuestions = count($_POST['SuppliersFaqAnswers']['hidden_questions']);

            if($_POST['SuppliersFaqAnswers']['suppliers_id'] > 0)
            {

                for($i=0;$i<$totalQuestions;$i++)
                {
                    $model = new SuppliersFaqAnswers;
                    $model->suppliers_id    =  $_POST['SuppliersFaqAnswers']['suppliers_id'];
                    $model->faq_id          =  $_POST['SuppliersFaqAnswers']['hidden_questions'][$i];
                    $model->answers         =  $_POST['SuppliersFaqAnswers']['answers'][$i];
                    $model->save();

                }

            }
			//$model->attributes=$_POST['SuppliersFaqAnswers'];
		     // CVarDumper::dump($model,10,1);die;
         	$this->redirect(array('view','id'=>$model->suppliers_id));
		}

		$this->render('create',array('model'=>$model,'allQuestions'=>$allQuestions));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $supplier_id = $model->suppliers_id;
        $allQuestions    =   SuppliersFaqAnswers::model()->findAllByAttributes(array('suppliers_id'=>$supplier_id));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		/*if(isset($_POST['SuppliersFaqAnswers']))
		{
			$model->attributes=$_POST['SuppliersFaqAnswers'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
         */
          if(isset($_POST['yt0']))
		  {

    		    $totalQuestions = count($_POST['SuppliersFaqAnswers']['hidden_questions']);

                if($supplier_id > 0)
                {

                    for($i=0;$i<$totalQuestions;$i++)
                    {
                        $model=SuppliersFaqAnswers::model()->findByAttributes(array('faq_id'=>$_POST['SuppliersFaqAnswers']['hidden_questions'][$i],'suppliers_id'=>$supplier_id));
                        $model->suppliers_id    =  $supplier_id;
                        $model->faq_id          =  $_POST['SuppliersFaqAnswers']['hidden_questions'][$i];
                        $model->answers         =  $_POST['SuppliersFaqAnswers']['answers'][$i];
                        $model->save();

                    }

                    $this->redirect($this->createUrl('view',array('id'=>$supplier_id)));

                }

	      }
          $this->render('update',array('model'=>$model,'allQuestions'=>$allQuestions));
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
		$dataProvider=new CActiveDataProvider('SuppliersFaqAnswers');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SuppliersFaqAnswers('customSearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SuppliersFaqAnswers']))
			$model->attributes=$_GET['SuppliersFaqAnswers'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SuppliersFaqAnswers the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SuppliersFaqAnswers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SuppliersFaqAnswers $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliers-faq-answers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
