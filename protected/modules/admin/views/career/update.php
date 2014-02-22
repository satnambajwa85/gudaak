<?php
/* @var $this CareerController */
/* @var $model Career */

$this->breadcrumbs=array(
	'Careers'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Career', 'url'=>array('index')),
	array('label'=>'Create Career', 'url'=>array('create')),
	array('label'=>'View Career', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Career', 'url'=>array('admin')),
);
?>

<h1>Update Career <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'streams'=>$streams)); ?>