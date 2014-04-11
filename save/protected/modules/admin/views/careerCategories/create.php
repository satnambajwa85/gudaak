<?php
/* @var $this CareerCategoriesController */
/* @var $model CareerCategories */

$this->breadcrumbs=array(
	'Career Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CareerCategories', 'url'=>array('index')),
	array('label'=>'Manage CareerCategories', 'url'=>array('admin')),
);
?>

<h1>Create CareerCategories</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>