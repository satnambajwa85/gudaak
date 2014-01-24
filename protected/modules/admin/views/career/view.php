<?php
/* @var $this CareerController */
/* @var $model Career */

$this->breadcrumbs=array(
	'Careers'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Career', 'url'=>array('index')),
	array('label'=>'Create Career', 'url'=>array('create')),
	array('label'=>'Update Career', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Career', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Career', 'url'=>array('admin')),
);
?>

<h1>View Career #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'image',
		'add_date',
		'modification_date',
		'published',
		'status',
		'career_categories_id',
	),
)); ?>
