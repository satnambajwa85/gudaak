<?php
/* @var $this InstitutesController */
/* @var $model Institutes */

$this->breadcrumbs=array(
	'Institutes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Institutes', 'url'=>array('index')),
	array('label'=>'Create Institutes', 'url'=>array('create')),
	array('label'=>'View Institutes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Institutes', 'url'=>array('admin')),
);
?>

<h1>Update Institutes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>