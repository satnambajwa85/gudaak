<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
	array('label'=>'Update Suppliers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Suppliers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<h1>View Suppliers #<?php echo $model->id; ?></h1>
<div id="outter" style="display:inline;">
		<div style="width:49%; float:left; margin-right:0.5%">
        <a href="<?php echo $this->createUrl('suppliers/update',array('id'=>$model->id));?>" class="btn btn-info pull-right">Edit Profile</a>

			<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		    array(               
            'label'=>'User ID',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->users_id),
                                 array('users/view','id'=>$model->users_id)),
        ),
		'first_name',
		'last_name',
		array(
          'label' => 'City',
          'value' => $model->cities->name,
        ),
		'cover',
		'name',
		'logo',
		'email',
		'phone_number',
		//'tagline',
		//'short_description',
		//'details',
		'modification_date',
		//'status',
		'skype_id',
		'website',
		'foundation_year',
		'location',
		'about_company',
		'number_of_employee',
		//'team_background',
		//'rough_estimate',
		//'open_source_links',
		//'consultation_description',
		//'total_available_employees',
		'standard_pitch',
		'standard_service_agreement',
		'accept_new_project_date',
		 array(
          'label' => 'Status',
         // 'value' => ($model->status==0)?'Deactivate':($model->status==1)?'Profile Submitted':($model->status==2)?'Approved':'Signed & Verified',
          'value'=>($model->status==0)?"Deactivate":(($model->status==1)?"Profile Submitted ":(($model->status==2)?"Approve":"Signed/Verified") ),
        ),
		array(
          'label' => 'Available for consultancy',
          'value' => isset($model->Is_available_for_consultancy)?($model->Is_available_for_consultancy==0)?'No':'Yes':'',
        ),
		array(
          'label' => 'Profile Submitted',
          'value' => isset($model->is_profile_complete)?($model->is_profile_complete==0)?'No':'Yes':'',
        ),
		array(
          'label' => 'FAQ Submitted',
          'value' => isset($model->is_faq_complete)?($model->is_faq_complete==0)?'No':'Yes':'',
        ),
		array(
          'label' => 'Application Submitted',
          'value' => isset($model->is_application_submit)?($model->is_application_submit==0)?'No':'Yes':'',
        ),
		 
		//'consultation_price',
		//'response_time',
		//'add_date',
	
	),
	 
			)); ?>
		</div>
		<div style="width:50%; display:inline;  float:left; overflow-y:scroll; max-height:300px;">
		 
		<table width="100%"  cellpadding="10px" cellspacing="10px" border="1" style="margin-top:0.5%; text-align:center;">
			<tr><td colspan="4" align="center">
            <h4 align="center"> <?php echo !empty($model->name)? $model->name : $model->users->display_name;?>'s Projects </h4></td>
            </tr>
                <tr>
                    <th>Project ID</th>
                    <th> Project Name</th>
                    <th> Client Name</th>
                    <th> Status</th>
                </tr>
            <?php 
             if(count($modelSuppDetails))
             {
              foreach($modelSuppDetails as $supData)
              {
                  
            ?>
             <tr>
                    <td><?php echo $supData->client_projects_id; ?>
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=admin/clientProjects/view&id=<?php echo $supData->client_projects_id; ?>" target="_blank">(Show Details)</a></td>
                    <td><?php echo $supData->clientProjects->name; ?></td>
                    <?php $name= isset($supData->clientProjects->clientProfiles->first_name)?$supData->clientProjects->clientProfiles->first_name." ":' '." ";
                        $name.=	isset($supData->clientProjects->clientProfiles->last_name)?$supData->clientProjects->clientProfiles->last_name:' '." ";?>
                    <td><?php echo CHtml::link($name,array("/admin/clientprofiles/view","id"=>$supData->clientProjects->clientProfiles->id),array("target"=>"_blank"));
                 ?></td>
                    <td><?php if($supData->status==0)
                                    echo 'Assigned to supplier by admin';
                                  else if($supData->status==1)	
                                    echo 'Seeking Clarification';
                                  else if($supData->status==2)	
                                    echo 'Proposal Submitted';
                                  else if($supData->status==4)	
                                    echo 'Proposal Accepted';
                                  else if($supData->status==5)	
                                    echo 'Project Completed';
                                  else if($supData->status==6)	
                                    echo 'Proposal Archived';
                                else
                                  echo 'Status not defined yet';
                    
                     ?></td>
              </tr>
            
            <?php }
             }
            else
            {
            ?>
            <tr><td colspan="4" align="center">
            <h5 align="center"> No Record Found!! </h5></td>
            </tr>
            <?php }?>
            </table>
	</div>
		<div style="width:50%; display:inline;  float:left; overflow-y:scroll;max-height:300px; margin-bottom:1%;">
        <table width="100%" border="1" style="margin-top:1%; text-align:center;" >
<tr><td colspan="5" align="center">
<h4 align="center"> <?php echo !empty($model->name)? $model->name : $model->users->display_name;?>'s Previous Clients </h4></td>
</tr>
	<tr>
        <th>Company </th>
        <th> Client Name</th>
        <th> Email</th>
		<th> Year</th>
        <th> Status</th>
    </tr>
<?php 
 if(count($modelPastClients))
 {
  foreach($modelPastClients as $clientData)
  {
?>
 <tr>
  		<td><?php echo (!empty($clientData->company_name))?$clientData->company_name:'NA'; ?></td>
        <td><a href="<?php echo $this->createUrl('suppliersHasReferences/view',array("id"=>$clientData->id))?>" target="_blank"><?php echo $clientData->client_first_name.' '.$clientData->client_last_name; ?></a></td>
        <td><?php echo !empty($clientData->client_email)?$clientData->client_email:'NA';?></td>
        <td><?php echo (!empty($clientData->year_engagement))?$clientData->year_engagement:'NA';?></td>
        <td><?php echo ($clientData->status==1)?'Review Received':'Awaiting Review';?></td>
        
  </tr>

<?php }
 }
else
{
?>
<tr><td colspan="5" align="center">
<h5 align="center"> No Record Found!! </h5></td>
</tr>
<?php }?>
</table>
 		</div>
		<div style="width:50%; display:inline; margin-top:1%; float:left; overflow-y:scroll; max-height:300px; margin-bottom:1%;">
<table width="100%"   cellpadding="10px" cellspacing="10px" border="1" style="text-align:center;">
<tr><td colspan="9" align="center">
<h4 align="center"> <?php echo !empty($model->name)? $model->name : $model->users->display_name;?>'s Portfolio </h4></td>
</tr>
	<tr>
        <th> ID </th>
        <th> Project Name</th>
        <th> Industry</th>
        <th> Client Name</th>
        <th> Year Done</th>
        <th> Total Time </th>
        <th> Cost</th>
        <th> Skills</th>
        <th> Service </th>
        
        
	</tr>
<?php 
 if(count($modelPortfolio))
 {
  foreach($modelPortfolio as $supPort)
  {
	  
?>
 	<tr>
  		<td> <?php echo $supPort->id; ?><a href=" <?php echo $this->createUrl("suppliersHasPortfolio/view",array('id'=>$supPort->id));?>" target="_blank">(Show Details)</a></td>
        <td><a href="http://<?php echo $supPort->project_link;?>" target="_blank"><?php echo $supPort->project_name; ?></a></td>
        <td><?php echo $supPort->industry->name; ?></td>
        <td><?php echo $supPort->client_name; 	 ?></td>
       	<td><?php echo (!empty($supPort->year_done))?$supPort->year_done:'NA'; 	 ?></td>
       	<td><?php echo (!empty($supPort->estimate_timelines))?$supPort->estimate_timelines:'NA';?></td>
        <td><?php echo (!empty($supPort->estimate_price))?$supPort->estimate_price:'NA'; ?></td>
        <td><?php $skillSet		=  ''; 
				  foreach($supPort->suppliersPortfolioHasSkills as $projSkill) 	 
						$skillSet	.=	'  '.$projSkill->skills->name;
					echo $skillSet;
		?></td>
        <td><?php echo isset($supPort->service->name)?$supPort->service->name:'NA'; ?></td>
 	</tr>

<?php }
 }
else
{
?>
<tr><td colspan="9" align="center">
<h5 align="center"> No Record Found!! </h5></td>
</tr>
<?php }?>
<tr>
	<td colspan="9"><br />
</td>
</tr>
</table>
<br />
<br /><br />
<br />
</div>
</div>
</div>
