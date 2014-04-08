<?php
/* @var $this OrientCategoriesController */
/* @var $model OrientCategories */

$this->breadcrumbs=array(
	'Orient Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrientCategories', 'url'=>array('index')),
	array('label'=>'Manage OrientCategories', 'url'=>array('admin')),
);
?>

<h1>Create OrientCategories</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>