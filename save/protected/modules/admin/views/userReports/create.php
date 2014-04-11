<?php
/* @var $this UserReportsController */
/* @var $model UserReports */

$this->breadcrumbs=array(
	'User Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserReports', 'url'=>array('index')),
	array('label'=>'Manage UserReports', 'url'=>array('admin')),
);
?>

<h1>Create UserReports</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>