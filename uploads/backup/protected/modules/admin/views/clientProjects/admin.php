<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */

$this->breadcrumbs=array(
	'Client Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ClientProjects', 'url'=>array('index')),
	array('label'=>'Create ClientProjects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-projects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Client Projects</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php  $this->Widget('WidgetPageSize'); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-projects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'type'=>'raw',
			'name'=>'client_profiles_id',
			'value'=>'CHtml::link($data->clientProfiles->first_name." ".$data->clientProfiles->last_name,array("/admin/clientProfiles/view","id"=>$data->client_profiles_id))',
			'filter'=>'',
			'header'=>'Client Name',
		),
		'name',
		'description',
		array(            
            'name'=>'status',
            'value'=>'($data->other_status==4)?"Submitted ":"Incomplete"',
			'filter'=>CHtml::activeDropDownList($model, 'other_status',array('1'=>"Incomplete",'4'=>'Submitted'),array('empty'=>'Select status'))
            ),
		'business_problem',
		/*
		'about_company',
		'is_call_scheduled',
		'summary',
		'requirement_change_scale',
		'min_budget',
		'max_budget',
		'custom_budget_range',
		'absolute_necessary_language',
		'good_know_language',
		'which_one_is_important',
		'questions_for_supplier',
		'current_status',
		*/
		array(
			'class'=>'CButtonColumn',
			 'viewButtonUrl'=>'Yii::app()->createUrl(\'admin/clientProjects/view&id=\'. $data->id)'
		),
	),
)); ?>
