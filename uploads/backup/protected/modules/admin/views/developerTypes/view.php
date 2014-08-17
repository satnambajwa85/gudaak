<?php
/* @var $this DeveloperTypesController */
/* @var $model DeveloperTypes */

$this->breadcrumbs=array(
	'Developer Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List DeveloperTypes', 'url'=>array('index')),
	array('label'=>'Create DeveloperTypes', 'url'=>array('create')),
	array('label'=>'Update DeveloperTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DeveloperTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DeveloperTypes', 'url'=>array('admin')),
);
?>

<h1>View DeveloperTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'status',
	),
)); ?>
