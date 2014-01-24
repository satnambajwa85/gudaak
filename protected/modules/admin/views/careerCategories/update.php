<?php
/* @var $this CareerCategoriesController */
/* @var $model CareerCategories */

$this->breadcrumbs=array(
	'Career Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CareerCategories', 'url'=>array('index')),
	array('label'=>'Create CareerCategories', 'url'=>array('create')),
	array('label'=>'View CareerCategories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CareerCategories', 'url'=>array('admin')),
);
?>

<h1>Update CareerCategories <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>