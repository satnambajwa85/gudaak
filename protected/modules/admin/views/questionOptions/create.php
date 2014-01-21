<?php
/* @var $this QuestionOptionsController */
/* @var $model QuestionOptions */

$this->breadcrumbs=array(
	'Question Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuestionOptions', 'url'=>array('index')),
	array('label'=>'Manage QuestionOptions', 'url'=>array('admin')),
);
?>

<h1>Create QuestionOptions</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>