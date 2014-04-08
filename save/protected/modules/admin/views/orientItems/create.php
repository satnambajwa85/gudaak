<?php
/* @var $this OrientItemsController */
/* @var $model OrientItems */

$this->breadcrumbs=array(
	'Orient Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrientItems', 'url'=>array('index')),
	array('label'=>'Manage OrientItems', 'url'=>array('admin')),
);
?>

<h1>Create OrientItems</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>