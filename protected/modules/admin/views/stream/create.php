<?php
/* @var $this StreamController */
/* @var $model Stream */

$this->breadcrumbs=array(
	'Streams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Stream', 'url'=>array('index')),
	array('label'=>'Manage Stream', 'url'=>array('admin')),
);
?>

<h1>Create Stream</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'subjectList'=>$subjectList,'subjectListType'=>$subjectListType)); ?>