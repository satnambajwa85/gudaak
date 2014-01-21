<?php
/* @var $this UserReportsController */
/* @var $model UserReports */

$this->breadcrumbs=array(
	'User Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserReports', 'url'=>array('index')),
	array('label'=>'Create UserReports', 'url'=>array('create')),
	array('label'=>'Update UserReports', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserReports', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserReports', 'url'=>array('admin')),
);
?>

<h1>View UserReports #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_profiles_id',
		'score',
		'interest',
		'activation',
		'status',
		'add_date',
		'orient_items_id',
	),
)); ?>
