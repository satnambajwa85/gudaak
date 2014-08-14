<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */
$this->breadcrumbs=array(
	'Client Profiles'=>array('index'),
	$model->id,
);
$this->menu=array(
	array('label'=>'List ClientProfiles', 'url'=>array('index')),
	array('label'=>'Create ClientProfiles', 'url'=>array('create')),
	array('label'=>'Update ClientProfiles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProfiles', 'url'=>array('admin')),
);
?>
<h1>View ClientProfiles #<?php echo $model->id; ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
       array(               
            'label'=>'ID',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->id),
                                 array('clientProfiles/view','id'=>$model->id)),
        ),
        
        array(              
        
            'label'=>'User',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->users->display_name),
                                 array('users/view','id'=>$model->users->id)),
        ),
            
		
		array(
          'label' => 'City',
          'value' => $model->cities->name,
        ),
		'first_name',
		'last_name',
		'email',
		'phone_number',
		'address1',
		//'address2',
		'add_date',
        array(
          'label' => 'Status',
          'value' => ($model->status==1)?"Yes":"No",
        ),
	   
		'company_name',
        array(               // related city displayed as a link
            'label'=>'Link',
            'type'=>'raw',
            'value'=>CHtml::link('<a target="_blank" href="http://'.$model->company_link.'">'.$model->company_link.'</a>',array()),
        ),
        array(               // related city displayed as a link
            'label'=>'Image Path',
            'type'=>'raw',
            'value'=>CHtml::link('<a target="_blank" href="'.$model->image.'">'.$model->image.'</a>',array()),
        ),        
        'team_size',
		'description',
	),
)); ?>

<style>
    .custom_table
    {
        border-collapse: collapse;   
        width: 95%;
        font-size: 11px!important;
    }
    .custom_table th
    {
        background-color: #65A5CC;
        color:#fff;
        padding-bottom: 4px;
        padding-top: 5px;
        text-align: left;
    }
    .custom_table td,.custom_table th
    {
        border: 1px solid #E5F1F4;
        font-size: 1.2em;
        padding: 3px 7px 2px;
    }
    .background_none
    {
        background: none!important;
        color: #000!important;
        font-size:11px;
    }
</style>
<script>
$(document).ready(function(){
  $(".custom_table tr:odd").css("background-color", "#E5F1F4");
  $(".custom_table tr:even").css("background-color", "#F8F8F8");
});
</script>

 <br />
            <h4><?php echo $model->first_name; ?> Projects</h4>
            <table class="custom_table">
               <thead>
                  <tr>
                    <th>
                       Project ID
                    </th>
                    <th>
                       Project Title
                    </th>                      
                    <th>
                       Supplier
                    </th>
                     
                  </tr>
                </thead>

           
                
                
 <?php
    
    $clientProjects	= clientProjects::model()->findAllByAttributes(array('client_profiles_id'=>$model->id));

    if(count($clientProjects) > 0)
    {     
               foreach($clientProjects as $client_project)
               {
               
                ?>
                <tr>
                    <td>
                        <?php echo $client_project->id; ?> 
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=admin/clientProjects/view&id=<?php echo $client_project->id; ?>">(get detail)</a>
                    </td>
                    <td>
                         <?php echo $client_project->name; ?>
                    </td>                 
                    <td>
                         <?php   
                             $k = 0;
                             
                             if(isset($client_project->suppliersProjectsProposals))
                             {
                                                               
                                echo "<table style='width:100%'>";
                                                                
                                if(count($client_project->suppliersProjectsProposals) > 0)
                                {                                                                                                
                                    foreach($client_project->suppliersProjectsProposals as $suppliers)
                                    {
                                        if($k==0)
                                        {
                                            ?>
                                                <tr class='background_none'>
                                                    <th class='background_none'>Name</th>
                                                    <th class='background_none'>Status</th>
                                                </tr>                                    
                                            <?php   
                                        }
                                        ?>
                                        <tr class="background_none">
                                            <td>
                                                <?php
                                                     echo "&bull; <a href='".Yii::app()->request->baseUrl."/index.php?r=admin/suppliers/view&id=".$suppliers->suppliers->id."'>".$suppliers->suppliers->first_name."  ".$suppliers->suppliers->last_name."</a>";
                                                 ?>
                                            </td>                                        
                                                                                    
                                            <td>
                                            
                                                 <?php
                                                     if(isset($suppliers->status))
                                                     {
                                                        echo $this->projectStatus[$suppliers->status]['supplier'];    
                                                     }
                                                    
                                                  ?>
                                            </td>
                                       
                                        </tr>
                                        
                                        <?php
                                        $k++;
                                    }
                                    echo "</table>";
                                }else{
                                    ?>
                                    <table style='width:100%'>
                                        <tr class='background_none'>
                                            <th class='background_none'>Project Status</th>
                                        </tr>
                                        <tr class='background_none'>
                                            <td>
                                                <?php echo ($client_project->state=="1")?"Preparing for Job Scope..":"Awaiting for Proposals.."; ?>
                                            </td>
                                        </tr>
                                    </table>                                    
                                    <?php                                    
                                                                        
                                                                    
                                }                                
                             }?>
                    </td>
                    
                </tr>
                <?php
                }
                 ?>
            </table>
        <?php
    }

	else
	{?>
		<tr>
        		<td colspan="4">No Record Found!!</td> 
        </tr>
<?php	}
     ?>
<br />
<br />

