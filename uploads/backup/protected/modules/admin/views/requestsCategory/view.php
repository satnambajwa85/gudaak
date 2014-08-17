<?php
/* @var $this RequestsCategoryController */
/* @var $model RequestsCategory */

$this->breadcrumbs=array(
	'Requests Categories'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List RequestsCategory', 'url'=>array('index')),
	array('label'=>'Create RequestsCategory', 'url'=>array('create')),
	array('label'=>'Update RequestsCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RequestsCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RequestsCategory', 'url'=>array('admin')),
);
?>

<h1>View RequestsCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'add_date',
		'status',
	),
)); ?>
