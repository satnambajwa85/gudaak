<?php

class ClientProfilesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    public $projectStatus = array(
							'0'=>array(
								'client'=>'',
								'supplier'=>'New Lead'),
                            '1'=>array(
								'client'=>'',
								'supplier'=>'Seeking Clarification'),
							'2'=>array(
								'client'=>'',
								'supplier'=>'Proposal Submitted'),
							'3'=>array(
								'client'=>'',
								'supplier'=>'(We are not using this for time being)Accepted pitch by client'),
							'4'=>array(
								'client'=>'',
								'supplier'=>'Proposal Accepted'),
							'5'=>array(
								'client'=>'',
								'supplier'=>'Project Completed'),
							'6'=>array(
								'client'=>'',
								'supplier'=>'Proposal Archived')
							
							);
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
		$model=new ClientProfiles; 
          
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientProfiles']))
		{
			$model->attributes=$_POST['ClientProfiles'];
			$model->add_date = date("Y-m-d H:i");
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
        $old_model=ClientProfiles::model()->findByPK($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientProfiles']))
		{
			$model->attributes=$_POST['ClientProfiles'];
			$description='';
            
            if($model->save())
            {
              
                foreach( $model as $index => $model1)
                {
                    if($model1!=$old_model[$index])
                    {
                        $description .= 'old record '.$index.' = '.$old_model[$index].' -- new record '.$index.' = '.$model1."<br><hr>";    
                    }
                        
                }   
                
                if($description!="")
                {
                    parent::updateLog($model->users_id,$model->users->username,$description,Yii::app()->controller->id,Yii::app()->controller->action->id);
                }
                
            	$this->redirect(array('view','id'=>$model->id));
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
		$client		=	$this->loadModel($id);
		if(!empty($client->clientProjects)){
                foreach($client->clientProjects as  $project)
                {
                //Deleting project documents
                if(!empty($project->clientProjectDocuments)){
                    echo "<br> Dleting Project Documents<br>";
                    $c = ClientProjectDocuments::model()->deleteAll("client_projects_id = $project->id");
                   echo "<br> Dleting Project Documents COMPLETED<br>";
                }

                //Deleting Project Flows
                if(!empty($project->clientProjectFlows)){
                    echo "<br> Dleting Project Flow<br>";
                    $c = ClientProjectFlows::model()->deleteAll("client_projects_id = $project->id");
                     echo "<br> Dleting Project Flow COMPLETED<br>";
                }

                //Deleting project INDUSTRIES
                if(!empty($project->clientProjectsHasIndustries)){
                     echo "<br> Dleting Project INDUSTRIES<br>";
                    ClientProjectsHasIndustries::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project INDUSTRIES completed<br>";
                }

                //Deleting project Services
                if(!empty($project->clientProjectsHasServices)){
                    echo "<br> Dleting Project Services<br>";
                    ClientProjectsHasServices::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Services<br>";

                }

                //Deleting project Skills
                if(!empty($project->clientProjectsHasSkills)){
                    echo "<br> Dleting Project Skills<br>";
                    ClientProjectsHasSkills::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Skills Completed<br>";
                }

                //Deleting project Project Suppliers team
                if(!empty($project->clientProjectsHasSupplierTeams)){
                    echo "<br> Dleting Project Suppliers Team <br>";
                    ClientProjectsHasSupplierTeams::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Suppliers Team Completed<br>";
                }

                //Deleting project Project Zone
                if(!empty($project->clientProjectsHasZones)){
                    echo "<br> Dleting Project Zone<br>";
                    ClientProjectsHasZones::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Zone Completed<br>";
                }

                //Deleting project Project QUESTIONS
                if(!empty($project->clientProjectsQuestions)){
                    echo "<br> Dleting Project  QUESTIONS<br>";
                    ClientProjectsQuestions::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project  QUESTIONS<br>";
                }

                //Deleting project Project Preference
                if(!empty($project->projectReferences)){
                    echo "<br> Dleting Project Preference<br>";
                    ProjectReferences::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Preference<br>";
                }

                //Deleting project Project Unique Feature
                if(!empty($project->projectUniqueFeatures))
                {
                    echo "<br> Dleting Project Unique Feature<br>";
                    ProjectUniqueFeatures::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Unique Feature<br>";
                }

                //Deleting project Project  Feature and estimation
                if(!empty($project->projectsFeaturesAndEstimations)){
                    echo "<br> Dleting Project Unique Feature and estimation<br>";
                    ProjectsFeaturesAndEstimations::model()->deleteAll("client_projects_id = $project->id");
                    echo "<br> Dleting Project Unique Feature and estimation<br>";
                }

                //Deleting project Project  proposal assigned
                if(!empty($project->suppliersProjectsProposals)){
                    echo "<br> For project id $project->id";
                    foreach($project->suppliersProjectsProposals as $p){
                        //Delete all documents against a proposal
                        echo "<br> For propsal id $p->id";
                        if(!empty($p->supplierDocuments)){
                            echo "<br> Suppliers doc <br>";
                            $c = SupplierDocuments::model()->deleteAll("suppliers_propsal_id= $p->id");

                        }
                        //Delete all Team against a proposal
                        if(!empty($p->suppliersProjectTeams)){
                            echo "<br> Suppliers Team <br>";
                            $c = SuppliersProjectTeam::model()->deleteAll("project_proposal_id= $p->id");
                            echo "<br> Suppliers Team Completed  <br>";
                        }

                        $p->delete();
                    }


                }



                 $project->delete();

            }
		}

		echo "<br> Deleting the Profile";

		if(!empty($client))
			$client->delete();
				
				
				
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ClientProfiles');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClientProfiles('customSearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientProfiles']))
			$model->attributes=$_GET['ClientProfiles'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ClientProfiles the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ClientProfiles::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ClientProfiles $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-profiles-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
