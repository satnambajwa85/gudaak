<?php

class DefaultController extends Controller
{
	
	public $layout='//layouts/column2';
	
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
	public function actionIndex()
	{
		$model=new SuppliersProjectsProposals('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SuppliersProjectsProposals']))
			$model->attributes=$_GET['SuppliersProjectsProposals'];

		$this->render('index',array(
			'model'=>$model,
		));
		 
	}

    /*  Function for setting company name  */
    public function actioncompanyName()
    {
		$name		 =    array();
		$id		   =    array();
		$list_data	=	array();
		if(empty($_POST['project_name']))
	    {
				$lists	    =	suppliersProjectsProposals::model()->findAll();
				foreach($lists as $list)
				   if(count($list->suppliers)==1)
					  $list_data[]=$list;		    
				$name = CHtml::listData($list_data,'suppliers_id', 'suppliers.name');
				$id   = CHtml::listData($list_data,'suppliers_id', 'suppliers_id');
				
				echo CHtml::tag('option',array('value'=>''),"All",true);
				
				foreach ($id as $ids)
					echo CHtml::tag('option',array('value'=>$ids),$name[$ids],true);
		}
		else
		{
		        $project_ID = $_POST['project_name']; 	   
				$lists	    =	suppliersProjectsProposals::model()->findAll("client_projects_id='{$project_ID}'");
				foreach($lists as $list)
				   if(count($list->suppliers)==1)
					  $list_data[]=$list;		    
				
				$name = CHtml::listData($list_data,'suppliers_id', 'suppliers.name');
				$id   = CHtml::listData($list_data,'suppliers_id', 'suppliers_id');
				echo CHtml::tag('option',array('value'=>''),"All",true);
				foreach ($id as $ids)
					echo CHtml::tag('option',array('value'=>$ids),$name[$ids],true);
				
		}
    }  

	public function actionstatus()
	{
		$status_name=array();
		$company_id=$_POST['company_name'];		        	   
		if(empty($_POST['project_name']) && empty($_POST['company_name'])){
			$lists  =   suppliersProjectsProposals::model()->findAll();
		}
		else if(empty($_POST['project_name'])&&!empty($_POST['company_name'])){ 
			$lists  =   suppliersProjectsProposals::model()->findAll("suppliers_id='{$company_id}'");
		}
		else{
			$lists=suppliersProjectsProposals::model()->findAll("suppliers_id='{$company_id}' and client_projects_id='{$_POST['project_name']}'");
		}
		foreach($lists as $list)
			$list_data[]=$list;
		
		$status_name = CHtml::listData($list_data,function($list_data){ return CHtml::encode($list_data['status']);},function($list_data){ return CHtml::encode(c_Status($list_data['status']));});
				
		$id   = CHtml::listData($list_data,function($list_data){ return CHtml::encode($list_data['status']);}, function($list_data){ return CHtml::encode($list_data['status']);});
				echo CHtml::tag('option',array('value'=>''),"All",true);
				foreach ($id as $ids)
					echo CHtml::tag('option',array('value'=>$ids),$status_name[$ids],true);
	}  


	public function actiongrid()
	{
		$status 		   =    array();
		$project_names	=	array();
		$company_names	=	array();
		$criteria=new CDbCriteria;		
		
		$projectNamesF	=	(isset($_POST['project_name']) && !empty($_POST['project_name']))?$_POST['project_name']:'';
		$companyNamesF	=	(isset($_POST['company_name']) && !empty($_POST['company_name']))?$_POST['company_name']:'';
		$statusF		=	(isset($_POST['status']) && !empty($_POST['status']))?$_POST['status']:'';
			
		//And condition indicater
		$first			=	0	;
		
		
		if((!empty($projectNamesF)) && empty($companyNamesF) && empty($_POST['status']))
		{
			$first	=	1;
			$criteria->addCondition("client_projects_id={$projectNamesF}");
		}
		if((!empty($companyNamesF)&&empty($projectNamesF)&&empty($statusF)))
		{
			if($first == 1)
				$criteria->addCondition("suppliers_id={$companyNamesF}",'AND');
			else	
				$criteria->addCondition("suppliers_id={$companyNamesF}");
		} 
		if((!empty($statusF) && empty($projectNamesF)&&empty($companyNamesF)) )
		{
			if($statusF==10)
				$statusF	=	0;

			if($first == 1)
				$criteria->addCondition("status={$statusF}",'AND');
			else	
				$criteria->addCondition("status={$statusF}");
		}
			 
		$dataProvider=new CActiveDataProvider('suppliersProjectsProposals' ,
			array(
					'sort' => array('defaultOrder' => 'client_projects_id '),
					'criteria'=>$criteria
				));
		
		
		$this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$dataProvider,
			'columns'=>array(
							array(            
							'name'=>'Projects',
							'value'=>'$data->clientProjects->name',
							     ),
							array(            
							'name'=>'Client Name',
							'value'=>'$data->clientProjects->clientProfiles->first_name." ".$data->clientProjects->clientProfiles->last_name',
							     ),    
							array(            
							'name'=>'Supplier Company ',
							'value'=>'$data->suppliers->name',
							     ),	    
							array(            
							'name'=>'Supplier Name',
							'value'=>'$data->suppliers->first_name." ".$data->suppliers->last_name',
							     ),
							array(            
							'name'=>'Supplier Email',
							'value'=>'$data->suppliers->email',
							     ),     
							array(            
							'name'=>'Supplier Contact No',
							'value'=>'$data->suppliers->phone_number',
							     ),	  
							array(            
							'name'=>'Status',
							'value'=>'c_Status($data->status)',
							     ),        
							'add_date'   		
							
			                ),
			
			             )); 
	}
}
        
		 function c_Status($val)  /* to get description of current status  */ 
				{	
					if($val==0)
					  return 'New Lead';
					else if($val==1) 
					  return 'Seeking Clarification';
					else if($val==2)
					  return 'Proposal Submitted';
					else if($val==4)
					  return 'Proposal Accepted';
					else if($val==5)
					  return 'Project Completed';
					else if($val==6)
					  return 'Proposal Archived';  
	

				}
