<?php
/* @var $this CareerOptionsHasStreamController */
/* @var $model CareerOptionsHasStream */

$this->breadcrumbs=array(
	'Career Options Has Streams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CareerOptionsHasStream', 'url'=>array('index')),
	array('label'=>'Manage CareerOptionsHasStream', 'url'=>array('admin')),
);
?>

<h1>Create CareerOptionsHasStream</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>