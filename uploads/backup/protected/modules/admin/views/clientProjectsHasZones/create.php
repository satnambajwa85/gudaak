<?php
/* @var $this ClientProjectsHasZonesController */
/* @var $model ClientProjectsHasZones */

$this->breadcrumbs=array(
	'Client Projects Has Zones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasZones', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectsHasZones', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectsHasZones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>