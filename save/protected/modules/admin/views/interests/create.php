<?php
/* @var $this InterestsController */
/* @var $model Interests */

$this->breadcrumbs=array(
	'Interests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Interests', 'url'=>array('index')),
	array('label'=>'Manage Interests', 'url'=>array('admin')),
);
?>

<h1>Create Interests</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>