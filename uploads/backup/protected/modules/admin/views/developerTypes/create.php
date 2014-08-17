<?php
/* @var $this DeveloperTypesController */
/* @var $model DeveloperTypes */

$this->breadcrumbs=array(
	'Developer Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DeveloperTypes', 'url'=>array('index')),
	array('label'=>'Manage DeveloperTypes', 'url'=>array('admin')),
);
?>

<h1>Create DeveloperTypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>