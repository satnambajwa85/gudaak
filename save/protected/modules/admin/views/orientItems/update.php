<?php
/* @var $this OrientItemsController */
/* @var $model OrientItems */

$this->breadcrumbs=array(
	'Orient Items'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrientItems', 'url'=>array('index')),
	array('label'=>'Create OrientItems', 'url'=>array('create')),
	array('label'=>'View OrientItems', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrientItems', 'url'=>array('admin')),
);
?>

<h1>Update OrientItems <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>