<?php
/* @var $this SupplierTeamController */
/* @var $model SupplierTeam */

$this->breadcrumbs=array(
	'Supplier Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SupplierTeam', 'url'=>array('index')),
	array('label'=>'Manage SupplierTeam', 'url'=>array('admin')),
);
?>

<h1>Create SupplierTeam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>