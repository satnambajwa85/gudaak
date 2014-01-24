<?php
/* @var $this CareerDetailsController */
/* @var $model CareerDetails */

$this->breadcrumbs=array(
	'Career Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CareerDetails', 'url'=>array('index')),
	array('label'=>'Manage CareerDetails', 'url'=>array('admin')),
);
?>

<h1>Create CareerDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>