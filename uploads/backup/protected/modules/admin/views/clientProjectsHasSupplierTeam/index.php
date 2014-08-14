<?php
/* @var $this ClientProjectsHasSupplierTeamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Projects Has Supplier Teams',
);

$this->menu=array(
	array('label'=>'Create ClientProjectsHasSupplierTeam', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectsHasSupplierTeam', 'url'=>array('admin')),
);
?>

<h1>Client Projects Has Supplier Teams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
