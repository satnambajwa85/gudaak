<?php
/* @var $this ClientProjectsHasZonesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Projects Has Zones',
);

$this->menu=array(
	array('label'=>'Create ClientProjectsHasZones', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectsHasZones', 'url'=>array('admin')),
);
?>

<h1>Client Projects Has Zones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
