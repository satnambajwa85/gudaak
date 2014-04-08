<?php
/* @var $this TestReportsController */
/* @var $model TestReports */

$this->breadcrumbs=array(
	'Test Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TestReports', 'url'=>array('index')),
	array('label'=>'Manage TestReports', 'url'=>array('admin')),
);
?>

<h1>Create TestReports</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>