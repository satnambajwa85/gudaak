<?php
/* @var $this ProjectUniqueFeaturesController */
/* @var $model ProjectUniqueFeatures */

$this->breadcrumbs=array(
	'Project Unique Features'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectUniqueFeatures', 'url'=>array('index')),
	array('label'=>'Manage ProjectUniqueFeatures', 'url'=>array('admin')),
);
?>

<h1>Create ProjectUniqueFeatures</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>