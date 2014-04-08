<?php
/* @var $this CareerOptionsHasSubjectsController */
/* @var $model CareerOptionsHasSubjects */

$this->breadcrumbs=array(
	'Career Options Has Subjects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CareerOptionsHasSubjects', 'url'=>array('index')),
	array('label'=>'Manage CareerOptionsHasSubjects', 'url'=>array('admin')),
);
?>

<h1>Create CareerOptionsHasSubjects</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>