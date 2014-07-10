<?php
/* @var $this ArticlesCommentsController */
/* @var $model ArticlesComments */

$this->breadcrumbs=array(
	'Articles Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArticlesComments', 'url'=>array('index')),
	array('label'=>'Manage ArticlesComments', 'url'=>array('admin')),
);
?>

<h1>Create ArticlesComments</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>