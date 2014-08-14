<?php
/* @var $this ClientProjectsHasSupplierTeamController */
/* @var $model ClientProjectsHasSupplierTeam */

$this->breadcrumbs=array(
	'Client Projects Has Supplier Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasSupplierTeam', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectsHasSupplierTeam', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectsHasSupplierTeam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>