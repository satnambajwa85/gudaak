<?php
/* @var $this FunctionalityGroupsController */
/* @var $model FunctionalityGroups */

$this->breadcrumbs=array(
	'Functionality Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FunctionalityGroups', 'url'=>array('index')),
	array('label'=>'Create FunctionalityGroups', 'url'=>array('create')),
	array('label'=>'Update FunctionalityGroups', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FunctionalityGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FunctionalityGroups', 'url'=>array('admin')),
);
?>

<h1>View FunctionalityGroups #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
