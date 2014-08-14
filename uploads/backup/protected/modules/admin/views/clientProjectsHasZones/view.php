<?php
/* @var $this ClientProjectsHasZonesController */
/* @var $model ClientProjectsHasZones */

$this->breadcrumbs=array(
	'Client Projects Has Zones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasZones', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasZones', 'url'=>array('create')),
	array('label'=>'Update ClientProjectsHasZones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectsHasZones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectsHasZones', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectsHasZones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_projects_id',
		'zones_id',
	),
)); ?>
