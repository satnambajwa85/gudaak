<?php
/* @var $this OrientCategoriesController */
/* @var $model OrientCategories */

$this->breadcrumbs=array(
	'Orient Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrientCategories', 'url'=>array('index')),
	array('label'=>'Create OrientCategories', 'url'=>array('create')),
	array('label'=>'View OrientCategories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrientCategories', 'url'=>array('admin')),
);
?>

<h1>Update OrientCategories <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>