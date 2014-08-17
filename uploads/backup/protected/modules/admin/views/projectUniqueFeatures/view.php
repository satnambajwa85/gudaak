<?php
/* @var $this ProjectUniqueFeaturesController */
/* @var $model ProjectUniqueFeatures */

$this->breadcrumbs=array(
	'Project Unique Features'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProjectUniqueFeatures', 'url'=>array('index')),
	array('label'=>'Create ProjectUniqueFeatures', 'url'=>array('create')),
	array('label'=>'Update ProjectUniqueFeatures', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectUniqueFeatures', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectUniqueFeatures', 'url'=>array('admin')),
);
?>

<h1>View ProjectUniqueFeatures #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_projects_id',
		'name',
		'description',
	),
)); ?>
