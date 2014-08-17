
<?php 

$status_listData =  array('0'=>'New Lead','1'=>'Seeking Clarification','2'=>'Proposal Submitted','4'=>'Proposal Accepted','5'=>'Project Completed','6'=>'Proposal Archived');


	$proj_id 	=		array();
	$sup_id 	=	    array();
	foreach(ClientProjects::model()->findAll("state=2") as $project)
	  {
		 if(count($project->suppliersProjectsProposals)>0)
		  $proj_id[]=$project; 
	  }
	foreach(Suppliers::model()->findAll('status=3') as $supp)
	   {
	   		if(count($supp->suppliersProjectsProposals)>0)
	     		$sup_id[]=$supp;
	   }?>
	<h4 align="center"><u> Status of Projects </u></h4>
    <?php  $this->Widget('WidgetPageSize'); ?>
    
	<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-projects-proposals-grid',
	'dataProvider'=>$model->search(),
 	'filter'=>$model,
	'columns'=>array(	 
		array(            
            'name'=>'Project',
            'type'=>'raw',
            'value'=>'CHtml::link($data->clientProjects->name, array("/admin/clientProjects/view","id"=>$data->clientProjects->id),array("target"=>"_blank"))',
			'filter'=>CHtml::activeDropDownList($model, 'client_projects_id',
        Chtml::listData($proj_id, 'id', 'name'),
        array('empty'=>'Select Project')),
               ),
		array(            
            'header'=>'Client Name',
			'type'=>'raw',
            'value'=>'CHtml::link($data->clientProjects->clientProfiles->first_name." ".$data->clientProjects->clientProfiles->last_name, array("/admin/clientProfiles/view","id"=>$data->clientProjects->clientProfiles->id),array("target"=>"_blank"))',
			
		   ),
		array(            
            'name'=>'Supplier Company ',
            'value'=>'$data->suppliers->name',
            
             'filter'=>CHtml::activeDropDownList($model, 'suppliers_id',
       				 CHtml::listData($sup_id,'id', 'name'),
        array('empty'=>'Select Company')),
			),
		array(            
		'header'=>'Supplier Name',
		'type'=>'raw',
        'value'=>'CHtml::link($data->suppliers->first_name." ".$data->suppliers->last_name, array("/admin/suppliers/view","id"=>$data->suppliers->id),array("target"=>"_blank"))',
		
	   ),
	  array(            
            'header'=>'Supplier Email',
			'type'=>'raw',
			'value'=>'$data->suppliers->users->username',
		   ),
	  array(            
		'header'=>'Supplier Contacts',
		'type'=>'raw',
		'value'=>'$data->suppliers->phone_number',
	   ),
	array(            
            'name'=>'status',
            'value'=>'($data->status==0)?"New Lead":(($data->status==1)?"Seeking Clarification":(($data->status==2)?"Proposal Submitted":(($data->status==4)?"Proposal Accepted":(($data->status==5)?"Project Completed":"Proposal Archived"))))',
			'filter'=>CHtml::activeDropDownList($model, 'status',$status_listData,array('empty'=>'Select status')),
               ),
		'add_date',	
		/*
		
		'comments',
		'others',
		*/
		array(
			'class'=>'CButtonColumn',
				'buttons'=>array(
							 
				'delete'=>array(
							'visible'=>'false',
					),
                    	'view'=>array(
							'visible'=>'false',
					),	'update'=>array(
							'visible'=>'false',
					),
				),
	
        ),
        
	),
)); ?>
