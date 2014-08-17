<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */

$this->breadcrumbs=array(
	'Suppliers Has References'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersHasReferences', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasReferences', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-has-references-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Has References</h1>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php  $this->Widget('WidgetPageSize'); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-has-references-grid',
	'dataProvider'=>$model->customSearch(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'suppliers_id',
			'type'=>'raw',
			'value'=>'CHtml::link($data->suppliers->name,array("suppliers/view","id"=>$data->suppliers_id))',
		),
		
		'company_name',
		array(
			'name'=>'client_id',
			'type'=>'raw',
			'value'=>'CHtml::link($data->client_id, array("clientProfiles/view","id"=>$data->client_id))',
			'header'=>'ClientID',
		),
		'client_first_name',
		'client_email',
		'project_name',
			array(
            'name'=>'status',
            'value'=>'($data->status==1)?"Verified ":"Awating Review"',
			'filter'=>CHtml::activeDropDownList($model, 'status',array('1'=>"Verified",'0'=>'Awating Review'),array('empty'=>'Select status'))
            ),
		/*
		'year_engagement',
		'industry_id',
		'suppliers_id',
		'q1_communication_rating',
		'q2_skill_rating',
		'q3_timelines_ratings',
		'q4_independence_rating',
		'provider_do_well',
		'provider_improve',
		'problems_during_development',
		'client_project_description',
		'status',
		'created',
		'modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
