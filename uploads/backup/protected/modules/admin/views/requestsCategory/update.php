<?php
/* @var $this RequestsCategoryController */
/* @var $model RequestsCategory */

$this->breadcrumbs=array(
	'Requests Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RequestsCategory', 'url'=>array('index')),
	array('label'=>'Create RequestsCategory', 'url'=>array('create')),
	array('label'=>'View RequestsCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RequestsCategory', 'url'=>array('admin')),
);
?>

<h1>Update RequestsCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>