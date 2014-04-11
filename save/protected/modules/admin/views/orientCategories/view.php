<?php
/* @var $this OrientCategoriesController */
/* @var $model OrientCategories */

$this->breadcrumbs=array(
	'Orient Categories'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List OrientCategories', 'url'=>array('index')),
	array('label'=>'Create OrientCategories', 'url'=>array('create')),
	array('label'=>'Update OrientCategories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrientCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrientCategories', 'url'=>array('admin')),
);
?>

<h1>View OrientCategories #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'alias',
		'description',
		'image',
		'add_date',
		'published',
		'status',
	),
)); ?>
