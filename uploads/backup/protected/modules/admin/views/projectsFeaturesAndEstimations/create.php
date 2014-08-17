<?php
/* @var $this ProjectsFeaturesAndEstimationsController */
/* @var $model ProjectsFeaturesAndEstimations */

$this->breadcrumbs=array(
	'Projects Features And Estimations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectsFeaturesAndEstimations', 'url'=>array('index')),
	array('label'=>'Manage ProjectsFeaturesAndEstimations', 'url'=>array('admin')),
);
?>

<h1>Create ProjectsFeaturesAndEstimations</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>