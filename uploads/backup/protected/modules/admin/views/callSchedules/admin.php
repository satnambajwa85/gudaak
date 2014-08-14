<?php
/* @var $this CallSchedulesController */
/* @var $model CallSchedules */

$this->breadcrumbs=array(
	'Call Schedules'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CallSchedules', 'url'=>array('index')),
	array('label'=>'Create CallSchedules', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#call-schedules-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Call Schedules</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'call-schedules-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'id',
		'client_projects_id',
		'client_phone',
		'call_time',
		'add_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
