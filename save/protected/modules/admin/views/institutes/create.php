<?php
/* @var $this InstitutesController */
/* @var $model Institutes */

$this->breadcrumbs=array(
	'Institutes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Institutes', 'url'=>array('index')),
	array('label'=>'Manage Institutes', 'url'=>array('admin')),
);
?>

<h1>Create Institutes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>