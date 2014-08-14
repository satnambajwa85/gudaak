<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */

$this->breadcrumbs=array(
	'Client Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ClientProjects', 'url'=>array('index')),
	array('label'=>'Create ClientProjects', 'url'=>array('create')),
	array('label'=>'Update ClientProjects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjects', 'url'=>array('admin')),
);
?>

<h1>View ClientProjects #<?php echo $model->id; ?></h1>
<?php


$skill_preference = "";
$questions = "";

$tiers = "";

if($model->tier!="")
{
    //$price_tier	=	priceTier::model()->findbyAttributes(array('id'=>$model->tier));
    $tier = explode(",",$model->tier);
    
    for($i=0;$i<count($tier);$i++)
    {
            
         $price_tier	=	priceTier::model()->findbyAttributes(array('id'=>$tier[$i]));
         $tiers .= ", $".$price_tier->min_price." - $".$price_tier->max_price;
         
    }     
    $tiers = substr($tiers,1,strlen($tiers));

}




$que	=	clientProjectsQuestions::model()->findAllByAttributes(array('client_projects_id'=>$model->id));
foreach($que as $question)
{
   $questions .= $question->question.", ";
}


foreach($model->clientProjectsHasSkills as $skill)
{    
    $skill_preference .= $skill->skills->name.", ";
}

 ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'id',
        array(               
            'label'=>'Full Name',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->clientProfiles->first_name." ".$model->clientProfiles->last_name),
                                 array('clientProfiles/view','id'=>$model->clientProfiles->id)),
        ),
            
            
        array(
          'label' => 'Category',
          'value' => (isset($model->clientProjectsHasServices->clientProjectsHasServices[0]))?$model->clientProjectsHasServices[0]->services->name:"",
        ), 
        array(
          'label' => 'Job Title',
          'value' => $model->name,
        ), 
        array(
          'label' => 'Skill Preference',
          'value' => $skill_preference,
        ), 
         array(
          'label' => 'Start Date',
          'value' => date("m-d-Y",strtotime($model->start_date)),
        ), 
        
		'description',
		'tag_line',
		'business_problem',
		'about_company',
		'is_call_scheduled',
		'summary',
		'requirement_change_scale',
         array(
          'label' => 'Preference',
          'value' => ($model->preferences=="regoin")?"Region":$model->preferences,
        ), 
        
        array(
          'label' => 'Range of Total Budget',
          'value' => "$".$model->min_budget." - $".$model->max_budget,
        ),
        array(
          'label' => 'Tier Budget',

          'value' => $tiers,
        ),
	//	'custom_budget_range',
		'absolute_necessary_language',
		'good_know_language',
		'which_one_is_important',
		//'questions_for_supplier',
         array(
          'label' => 'Questions',
          'value' => $questions,
        ),
		/*array(
			'name'=>'current_status',
			'value'=>$model->current_status,
		),*/
	),
));

if(false)
{
    echo '<div class="mt50"></div>';
    
    $stau	=	explode(',',$model->current_status);
    $lists	=	CurrentStatus::model()->findAllByAttributes(array('id'=>$stau));
    foreach($lists as $list){
    	echo $list->name.'</br>';
    }

}
?>
