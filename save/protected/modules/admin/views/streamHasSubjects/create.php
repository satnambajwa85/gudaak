<?php
/* @var $this StreamHasSubjectsController */
/* @var $model StreamHasSubjects */

$this->breadcrumbs=array(
	'Stream Has Subjects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StreamHasSubjects', 'url'=>array('index')),
	array('label'=>'Manage StreamHasSubjects', 'url'=>array('admin')),
);
?>

<h1>Create StreamHasSubjects</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>