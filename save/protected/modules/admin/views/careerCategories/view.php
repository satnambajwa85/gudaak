<?php
/* @var $this CareerCategoriesController */
/* @var $model CareerCategories */

$this->breadcrumbs=array(
	'Career Categories'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CareerCategories', 'url'=>array('index')),
	array('label'=>'Create CareerCategories', 'url'=>array('create')),
	array('label'=>'Update CareerCategories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CareerCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CareerCategories', 'url'=>array('admin')),
);
?>

<h1>View CareerCategories #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'image',
		'add_date',
		'published',
		'status',
	),
)); ?>
