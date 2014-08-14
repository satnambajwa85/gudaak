<?php
/* @var $this FunctionalityGroupsController */
/* @var $model FunctionalityGroups */

$this->breadcrumbs=array(
	'Functionality Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FunctionalityGroups', 'url'=>array('index')),
	array('label'=>'Manage FunctionalityGroups', 'url'=>array('admin')),
);
?>

<h1>Create FunctionalityGroups</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>