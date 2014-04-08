<?php
/* @var $this SchoolsController */
/* @var $model Schools */

$this->breadcrumbs=array(
	'Schools'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Schools', 'url'=>array('index')),
	array('label'=>'Manage Schools', 'url'=>array('admin')),
);
?>

<h1>Create Schools</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>