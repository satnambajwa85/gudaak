<?php
/* @var $this StreamHasCareerOptionsController */
/* @var $model StreamHasCareerOptions */

$this->breadcrumbs=array(
	'Stream Has Career Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StreamHasCareerOptions', 'url'=>array('index')),
	array('label'=>'Manage StreamHasCareerOptions', 'url'=>array('admin')),
);
?>

<h1>Create StreamHasCareerOptions</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>