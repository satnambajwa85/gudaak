<?php
/* @var $this CareerHasStreamController */
/* @var $model CareerHasStream */

$this->breadcrumbs=array(
	'Career Has Streams'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CareerHasStream', 'url'=>array('index')),
	array('label'=>'Create CareerHasStream', 'url'=>array('create')),
	array('label'=>'Update CareerHasStream', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CareerHasStream', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CareerHasStream', 'url'=>array('admin')),
);
?>

<h1>View CareerHasStream #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'career_id',
		'stream_id',
		'add_date',
		'published',
		'status',
	),
)); ?>
