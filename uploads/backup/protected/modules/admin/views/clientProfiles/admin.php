<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */

$this->breadcrumbs=array(
	'Client Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ClientProfiles', 'url'=>array('index')),
	array('label'=>'Create ClientProfiles', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-profiles-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Client Profiles</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

 
 <?php  $this->Widget('WidgetPageSize'); ?>
 


 
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-profiles-grid',
	'dataProvider'=>$model->customSearch(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'users_id',
		array(
			'name'=>'users_id',
			'type'=>'raw',
			'value'=>'CHtml::link($data->users->username,array("/admin/users/view","id"=>$data->users_id))',
		),
		array(
			'name'=>'cities_id',
			'value'=>'$data->cities->name',
			'header'=>'Location'
		),
		'first_name',
		'last_name',
		
		//'email',
		/*
		'phone_number',
		'address1',
		'address2',
		'add_date',
		'status',
		'company_name',
		'description',
		*/
		array(
			'class'=>'CButtonColumn',
			'buttons'=>array(
							'delete'=>array('visible'=>'false'),
							),
		),
	),
)); ?>


