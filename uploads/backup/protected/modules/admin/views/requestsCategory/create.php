<?php
/* @var $this RequestsCategoryController */
/* @var $model RequestsCategory */

$this->breadcrumbs=array(
	'Requests Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RequestsCategory', 'url'=>array('index')),
	array('label'=>'Manage RequestsCategory', 'url'=>array('admin')),
);
?>

<h1>Create RequestsCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>