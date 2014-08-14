<?php

class SuppliersProjectsProposalsController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('admin','delete','create','update','index','view','DynamicSupplier'),
				'expression'=>'Yii::app()->user->role=="admin"',
				//'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	 public function actionDynamicSupplier()
	 {
		  		$id				=	$_POST['client_projects_id'];
				$model			= 	SuppliersProjectsProposals::model()->findAllByAttributes(array('client_projects_id'=>$id));
				$assignedSup	=	array();
				foreach($model as $AssSup ){
					$assignedSup[]		=	$AssSup->suppliers_id;
				}
					
				$list_data		=	array();
				$lists	    =	Suppliers::model()->findAllByAttributes(array('status'=>'3'));
				foreach($lists as $list)
                {
                		$list_data[$list->id]	=	$list;
				}
				foreach($assignedSup as $cur){
					unset($list_data[$cur]);
				}
				$listData = CHtml::listData($list_data,'id', 'name'); 
				foreach($listData as $key=>$list)
					{
						
							echo CHtml::tag('option',array('value'=>$key),CHtml::encode($list),true);
					}
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
		$model=new SuppliersProjectsProposals;
        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        
		
		if(isset($_POST['SuppliersProjectsProposals']))
		{
			require_once("sendgrid-php/sendgrid-php.php");
			$model->add_date = date("Y-m-d H:i");
			foreach($_POST['SuppliersProjectsProposals']['suppliers_id']  as $supplier){
			    //Save new lead
				$model1=new SuppliersProjectsProposals;
				$model1->attributes=$_POST['SuppliersProjectsProposals'];
                $model1->add_date = date("Y-m-d H:i");
				$model1->suppliers_id	=	$supplier;
				$model1->save ();
				
                //Add to logs
                $model_log=new Log;
	            $model_log->add_date = date("Y-m-d H:i");
				$model_log->for_user = $model1->suppliers->users_id;
				$model_log->description = "You have been matched with a client";
				$model_log->title =  CHtml::link('New Lead',array('/supplier/rfp','render'=>'full','projectid'=>$model1->id,'stat'=>$model1->status));
				$model_log->notification =1;
				$model_log->status =1;
				$model_log->login_id =Yii::app()->user->id;
				$model_log->save();

				/*email notification to supplier*/
				$data=array();
				$data['email']=$model1->suppliers->users->username;
				$data['name']=$model1->suppliers->name;
				$data['id']=$model1->id;
                
				$data['status']=$model1->status;
                
                $project = SuppliersProjectsProposals::model()->findByAttributes(array("suppliers_id"=>$model1->suppliers_id,"id"=>(int)$data['id']));
                
                $current_status = explode(',',$project->clientProjects->current_status);
              
			    $project_status = CHtml::listData(CurrentStatus::model()->findAllByAttributes(array("id"=>$current_status)),'id','name','position');
                
    
                
                                  
                
				$subject = 'VenturePact: New project coming through';
				$body = $this->renderPartial('/mails/assign_project_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
												'stat'=>$data['status'],
												'id'=>$data['id'],
                                                'project'=>$project,
                                                'project_status'=>$project_status), true);
		
				$from       =    Yii::app()->params['adminEmail'];
				$to         =    $data['email'];
                $fromname   = "VenturePact Team";
			    
                
				$options = array("turn_off_ssl_verification" => true);
				$sendgrid = new SendGrid('riteshtandon231981', 'venturepact1', $options);
				$mail = new SendGrid\Email();
                
                
              //  $to = "sandeep.verma@venturepact.com";
                $templete	=	'supplier_project_proposal';
				$mail->addTo($to)->addTo($from)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
				if($sendgrid->send($mail))
				{
					parent::mailLog($subject,$to,$templete,$body);
				}
			}
			$this->redirect(array('admin'));
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
        $old_model=SuppliersProjectsProposals::model()->findByPK($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        

		if(isset($_POST['SuppliersProjectsProposals']))
		{
		  $description='';
		  $model->attributes=$_POST['SuppliersProjectsProposals'];
	
         
            
            
			if($model->save())
            {
                
                foreach($model as $key=>$value)
                {
                    if($value!=$old_model[$key])
                    {
                        $description .= 'old record '.$key.' = '.$old_model[$key].' -- new record '.$key.' = '.$value."<br><hr>";
                    }
                }
                
                if($description!="")
                {
                    parent::updateLog($model->suppliers->users->id,$model->suppliers->users->username,$description,Yii::app()->controller->id,Yii::app()->controller->action->id);
                }
                
                $this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('SuppliersProjectsProposals');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SuppliersProjectsProposals('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SuppliersProjectsProposals']))
			$model->attributes=$_GET['SuppliersProjectsProposals'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SuppliersProjectsProposals the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SuppliersProjectsProposals::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SuppliersProjectsProposals $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliers-projects-proposals-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    

}
