<?php
/* @var $this ClientProjectsHasSupplierTeamController */
/* @var $model ClientProjectsHasSupplierTeam */

$this->breadcrumbs=array(
	'Client Projects Has Supplier Teams'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasSupplierTeam', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasSupplierTeam', 'url'=>array('create')),
	array('label'=>'Update ClientProjectsHasSupplierTeam', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectsHasSupplierTeam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectsHasSupplierTeam', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectsHasSupplierTeam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_projects_id',
		'supplier_team_id',
	),
)); ?>
