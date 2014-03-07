<?php
/* @var $this CareerOptionsController */
/* @var $model CareerOptions */

$this->breadcrumbs=array(
	'Career Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CareerOptions', 'url'=>array('index')),
	array('label'=>'Manage CareerOptions', 'url'=>array('admin')),
);
?>

<h1>Create CareerOptions</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'subjectList'=>$subjectList)); ?>