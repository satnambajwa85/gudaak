<?php
/* @var $this ClientProjectsHasZonesController */
/* @var $model ClientProjectsHasZones */

$this->breadcrumbs=array(
	'Client Projects Has Zones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasZones', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasZones', 'url'=>array('create')),
	array('label'=>'View ClientProjectsHasZones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectsHasZones', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectsHasZones <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>