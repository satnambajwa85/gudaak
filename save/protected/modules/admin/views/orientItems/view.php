<?php
/* @var $this OrientItemsController */
/* @var $model OrientItems */

$this->breadcrumbs=array(
	'Orient Items'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List OrientItems', 'url'=>array('index')),
	array('label'=>'Create OrientItems', 'url'=>array('create')),
	array('label'=>'Update OrientItems', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrientItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrientItems', 'url'=>array('admin')),
);
?>

<h1>View OrientItems #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'alias',
		'description',
		'image',
		'video_link',
		'add_date',
		'published',
		'status',
		'orient_categories_id',
	),
)); ?>
