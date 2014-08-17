<?php
/* @var $this CitiesController */
/* @var $model Cities */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cities', 'url'=>array('index')),
	array('label'=>'Manage Cities', 'url'=>array('admin')),
);
?>

<h1>Create Cities</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>