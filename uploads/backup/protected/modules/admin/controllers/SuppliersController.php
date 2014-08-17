
<?php

class SuppliersController extends Controller
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
				'actions'=>array('admin','delete','create','update','index','view','ajaxProfile'),
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
		$modelSuppDetails=SuppliersProjectsProposals::model()->findAllByAttributes(array('suppliers_id'=>$id));
		$modelPastClients=SuppliersHasReferences::model()->findAllByAttributes(array('suppliers_id'=>$id));
		$modelPortfolio=SuppliersHasPortfolio::model()->findAllByAttributes(array('suppliers_id'=>$id));
		$this->render('view',array(
			'model'=>$this->loadModel($id),'modelSuppDetails'=>$modelSuppDetails,'modelPastClients'=>$modelPastClients,'modelPortfolio'=>$modelPortfolio));
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Suppliers;
		$model->status=0;
        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suppliers']))
		{
			$model->attributes=$_POST['Suppliers'];
			$model->add_date = date("Y-m-d H:i");
			$model->accept_new_project_date=date("Y-m-d H:i");
			if($model->save())
			 {
				foreach($_POST['SuppliersHasSkills']['skills_id'] as $skill)
				{
					$supSkills	=	new SuppliersHasSkills;
					$supSkills->suppliers_id	=	$model->id;
					$supSkills->skills_id		=	$skill;
					$supSkills->status			=	0;
					$supSkills->add_date		=	date('Y-m-d H:i:s');
					$supSkills->save();

				}
				$this->redirect(array('view','id'=>$model->id));
			 }
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
        $old_model = Suppliers::model()->findByPk($id);
		$supplierTeam	= 	SupplierTeam::model()->findAllByAttributes(array('suppliers_id'=>$model->id));
		$supplierTeam1			=	new SupplierTeam;
		$selecetedServices		=	array();
		$selecetedIndustries	=	array();
		
		foreach($model->suppliersHasServices as $ser)
			$selecetedServices[]	=	$ser->services_id;
		
		foreach($model->suppliersHasIndustries as $ind)
			$selecetedIndustries[]	=	$ind->industries_id;
        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suppliers']))
		{
			
			$model->attributes=$_POST['Suppliers'];
			if(empty($model->accept_new_project_date))
				$model->accept_new_project_date	=	NULL;
			else
				$model->accept_new_project_date	=	date('Y-m-d',strtotime($model->accept_new_project_date));
			if($model->save())
			{
			 
                  $description = ""; 
                  foreach($model as $key=>$value)
                  {
                      if($value!=$old_model[$key])
                      {
                           $description .= 'old record '.$key.' = '.$old_model[$key].' -- new record '.$key.' = '.$value."<br><hr>";
                      }
                     
                  }
                  
                
                  
             
					if(isset($_POST['SuppliersHasSkills']['skills_id']))
					{
					    
						$supSkills	=	SuppliersHasSkills::model()->findAllByAttributes(array('suppliers_id'=>$model->id));
                        $old_skills = $supSkills;
                      
						foreach($supSkills as $suppSklls)
							  $suppSklls->delete();
						foreach($_POST['SuppliersHasSkills']['skills_id'] as $skill)
						{
								$supSkills	=	new SuppliersHasSkills;
								$supSkills->suppliers_id	=	$model->id;
								$supSkills->skills_id		=	$skill;
								$supSkills->status			=	0;
								$supSkills->add_date		=	date('Y-m-d H:i:s');
								$supSkills->save();

						}
                        
                        
                        //skills update log code
                        $latest_skills = $_POST['SuppliersHasSkills']['skills_id'];
                        $count_latest_skills = count($latest_skills);
                        $count_old_skills = count($old_skills);
                        $large_val = 0;
                        if($count_latest_skills > $count_old_skills)
                        {
                            $large_val = $count_latest_skills;
                        }else{
                            $large_val = $count_old_skills;
                        }
                        
                        if($large_val > 0)
                        {
                            $old ="";
                            $new ="";
                
                            for($j=0;$j<$large_val;$j++)
                            {
                               
                                  $oldSkills = isset($old_skills[$j]->skills->name)?$old_skills[$j]->skills->name:"";
                                  $new_skills = "";
                                  if(isset($latest_skills[$j]))
                                  {
                                     $new_skills = Skills::model()->FindByAttributes(array('id'=>$latest_skills[$j]));
                                     if(count($new_skills) > 0)
                                     {
                                        $new_skills = $new_skills->name;   
                                     }
                                     
                                  }
                                  
                                  $old .= $oldSkills.",";
                                  $new .= $new_skills.",";
                                  
                            }
                            if(($old!="" && $new!="") && ($old!=$new))
                            {
                                $description .="Old Skills = ".$old." -- New Skills = ".$new."<br><hr>";    
                            }
                            
                        }
                       
                       //end skills update log code
                            
					}
                    
                   
					if(isset($_POST['Services']))	
					{
					    $supServices	=	SuppliersHasServices::model()->findAllByAttributes(array('suppliers_id'=>$model->id));
                        $old_services   = $supServices;
						foreach($supServices as $suppSrvc)
							  $suppSrvc->delete();
						foreach($_POST['Services'] as $srvcs)
						{
								$supSrvcs	=	new SuppliersHasServices;
								$supSrvcs->suppliers_id	=	$model->id;
								$supSrvcs->services_id		=	$srvcs;
								$supSrvcs->status			=	1;
								$supSrvcs->add_date		=	date('Y-m-d H:i:s');
								$supSrvcs->save();

						}
                        
                         // services update code
                        $count_new_services = count($_POST['Services']);
                        $new_services = $_POST['Services'];
                        $count_old_services = count($old_services);
                        $large_val1 = 0;
                       
                        if($count_new_services > $count_old_services)
                        {
                            $large_val1 = $count_new_services;
                        }else{
                             $large_val1 = $count_old_services;
                        }
                        
                        if($large_val1 > 0)
                        {
                            $old = "";
                            $new = "";
  
                            for($j=0;$j < $large_val1 ; $j++ )
                            {
                                $oldServices = isset($old_services[$j]->services_id)?$old_services[$j]->services_id:"";
                                $newServices = isset($new_services[$j])?$new_services[$j]:"";
                                $old .= $oldServices.",";
                                $new .= $newServices.","; 
                            }
                            if(($old!="" && $new!="") && ($old!=$new))
                            {
                                $description .="Old Services = ".$old." -- New Services= ".$new."<br><hr>";    
                            }
                            
                        }
                        
                         // end of services update code
                        
					}
                    
					if(isset($_POST['Industries']))
					{
					      //  CVarDumper::Dump($_POST['Industries'],10,1);die;
					     	$supIndustry	=	SuppliersHasIndustries::model()->findAllByAttributes(array('suppliers_id'=>$model->id));
                            $old_industries = $supIndustry; 
							foreach($supIndustry as $suppInd)
								  $suppInd->delete();
							foreach($_POST['Industries'] as $Ind)
							{
								$supSrvcs	=	new SuppliersHasIndustries;
								$supSrvcs->suppliers_id	=	$model->id;
								$supSrvcs->industries_id		=	$Ind;
								$supSrvcs->status			=	0;
								$supSrvcs->add_date		=	date('Y-m-d H:i:s');
								$supSrvcs->save();
						    }
                            
                            
                              $count_new_industries = count($_POST['Industries']);
                              $new_industries = $_POST['Services'];
                              $count_old_industries = count($old_industries);
                              $large_val1 = 0;
                               
                              if($count_new_industries > $count_old_industries)
                              {
                                    $large_val1 = $count_new_industries;
                              }else{
                                     $large_val1 = $count_old_industries;
                              }
                              
                                echo $large_val1;
                                if($large_val1 > 0)
                                {
                                    $old = "";
                                    $new = "";
                                  //  CVarDumper::Dump($old_industries,10,1);die;  
                                    for($j=0;$j < $large_val1 ; $j++ )
                                    {
                                       // echo $old_industries[$j]->industries_id; 
                                        $oldIndustries = isset($old_industries[$j]->industries_id)?$old_industries[$j]->industries_id:"";
                                        $newIndustries = isset($new_industries[$j])?$new_industries[$j]:"";
                                        $old .= $oldIndustries.",";
                                        $new .= $newIndustries.","; 
                                    }
                                   
                                    if(($old!="" && $new!="") && ($old!=$new))
                                    {
                                        $description .="Old Industry = ".$old." -- New Industry= ".$new."<br><hr>";    
                                    }
                                    
                                }
                        
                              
                            
					}
                    
                    
                      if($description!="")
                      {
                           
                            parent::updateLog($model->users->id,$model->users->username,$description,Yii::app()->controller->id,Yii::app()->controller->action->id);   
                      }
                        

				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,'supplierTeam'=>$supplierTeam,'supplierTeam1'=>$supplierTeam1,'selecetedServices'=>$selecetedServices,'selecetedIndustries'=>$selecetedIndustries
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$supplier	=	$this->loadModel($id);
		 if(!empty($supplier->supplierTeams))
            {
                echo "<br>Deleting teams</br>";

                foreach($supplier->supplierTeams as $t)
                    $t->delete();
                echo "<br>Deleting teams completed</br>";
            }
            if(!empty($supplier->suppliersFaqAnswers))
            {
                echo "<br>Deleting Faq Answres</br>";
                if(!empty($supplier->suppliersFaqAnswers))
                    SuppliersFaqAnswers::model()->deleteAll("suppliers_id= $supplier->id");
                echo "<br>Deleting Faq Answres completed</br>";
            }
            if(!empty($supplier->suppliersHasIndustries))
            {
                echo "<br>Deleting Industires</br>";
                if(!empty($supplier->suppliersHasIndustries))
                    SuppliersHasIndustries::model()->deleteAll("suppliers_id= $supplier->id");
                echo "<br>Deleting Industries completed</br>";
            }
            if(!empty($supplier->suppliersHasPortfolios))
            {
                echo "<br>Deleting Portfolio</br>";
                foreach($supplier->suppliersHasPortfolios as $p)
                {
                    if(!empty($p->skills))
                        $p->skills->deleteAll();
                    $p->delete();
                }
                echo "<br>Deleting Portfolio Completed</br>";

            }
            if(!empty($supplier->suppliersProjectsProposals))
            {
                echo "<br>Deleting Proposals</br>";
                foreach($supplier->suppliersProjectsProposals as $p)
                {
                    if(!empty($p->supplierDocuments)){
                        SupplierDocuments::model()->deleteAll("suppliers_propsal_id= $p->id");
                    }
                    if(!empty($p->suppliersProjectTeams))
                        SuppliersProjectTeam::model()->deleteAll("project_proposal_id= $p->id");
                    $p->delete();
                }
                echo "<br>Deleting Proposal Completed</br>";

            }
            if(!empty($supplier->suppliersHasReferences))
            {
                echo "<br>Deleting References</br>";
                if(!empty($supplier->suppliersHasReferences))
                    SuppliersHasReferences::model()->deleteAll("suppliers_id= $supplier->id");
                echo "<br>Deleting References Completed</br>";
            }

            if(!empty($supplier->suppliersHasServices))
            {
                echo "<br>Deleting Services</br>";
                if(!empty($supplier->suppliersHasServices))
                    SuppliersHasServices::model()->deleteAll("suppliers_id= $supplier->id");
                echo "<br>Deleting References Completed</br>";
            }



            if(!empty($supplier->suppliersHasSkills))
            {
                echo "<br>Deleting References</br>";

                SuppliersHasSkills::model()->deleteAll("suppliers_id= $supplier->id");
                echo "<br>Deleting References Completed</br>";
            }

			if(!empty($supplier))
                $supplier->delete();
				
				

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		else
			$this->redirect(array('admin'));	
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Suppliers');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
 
		$model=new Suppliers('customsearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Suppliers']))
			$model->attributes=$_GET['Suppliers'];
	
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Suppliers the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Suppliers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Suppliers $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function ActionAjaxProfile($supid){
		
		if(isset($_POST))
		{
			$response = array('iserror'=>false,"errors"=>array(),"success"=>array());
			if(isset($_POST['memberid']) && isset($_POST['action']))
			{
				
				switch($_POST["action"])
				{
					case "remove" :
						$data= SupplierTeam::model()->findByAttributes(array('id'=>$_POST["memberid"],'suppliers_id'=>$supid));
					if($data->delete())
					{
						$response["iserror"]= false;
						$success =array("msg"=>"Deleted Succesfully");
						array_push($response["success"],$success);
					}
					else
					{
						$response["iserror"]= true;
						$errors = array("msg"=>"Server Error");
						array_push($response["errors"],$errors);
					}
						break;
					case "add" :
					
						$supplierTeam = new SupplierTeam;
						$supplierTeam->suppliers_id = $supid;
						$supplierTeam->first_name = $_POST["first_name"];
						$supplierTeam->experiance = $_POST["experiance"];
						if($supplierTeam->save())
						{
							$response["iserror"]= false;
							$success =array("msg"=>"Team Member Added",
											"lastInsertedId"=>$supplierTeam->id
																 );
 							array_push($response["success"],$success);
							
						}
						else
						{
							$response["iserror"]= true;
							$errors = array("msg"=>"Server Error");
							array_push($response["errors"],$errors);
						}
					
						break;
                    case "addprojectteam" :
					   
						$supplierTeam = new SuppliersProjectTeam;
						$supplierTeam->project_proposal_id = $_POST["pid"];
						$supplierTeam->name = $_POST["name"];
						$supplierTeam->description = $_POST["description"];
						$supplierTeam->image = $_POST["memberimage"];
						$supplierTeam->created = date("Y-m-d H:s");
						$supplierTeam->modified = date("Y-m-d H:s");
						if($supplierTeam->save())
						{
							$response["iserror"]= false;
							$success =array("msg"=>"Team Member Added",
											"lastInsertedId"=>$supplierTeam->id
																 );
 							array_push($response["success"],$success);
							
						}
						else
						{
							$response["iserror"]= true;
							$errors = array("msg"=>"Server Error".CVarDumper::dump($supplierTeam,10,1));
							array_push($response["errors"],$errors);
						}
					
						break;
					case "removeprojectteam" :
						$data= SuppliersProjectTeam::model()->findByAttributes(array('id'=>$_POST["memberid"]));
					if($data->delete())
					{
						$response["iserror"]= false;
						$success =array("msg"=>"Deleted Succesfully");
						array_push($response["success"],$success);
					}
					else
					{
						$response["iserror"]= true;
						$errors = array("msg"=>"Server Error");
						array_push($response["errors"],$errors);
					}
						break;
					default :
							$response["iserror"]= true;
							$errors = array("msg"=>"Un-Authorize Access!!");
							array_push($response["errors"],$errors);
				}
			}
			
		}else
		{
			$response["iserror"]= true;
			array_push($response["errors"],"Server Error");
		}
		echo json_encode($response);
		die;
	}
}
