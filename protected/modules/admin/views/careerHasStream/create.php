<?php
/* @var $this CareerHasStreamController */
/* @var $model CareerHasStream */

$this->breadcrumbs=array(
	'Career Has Streams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CareerHasStream', 'url'=>array('index')),
	array('label'=>'Manage CareerHasStream', 'url'=>array('admin')),
);
?>

<h1>Create CareerHasStream</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>