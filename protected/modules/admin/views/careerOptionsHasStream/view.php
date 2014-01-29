<?php
/* @var $this CareerOptionsHasStreamController */
/* @var $model CareerOptionsHasStream */

$this->breadcrumbs=array(
	'Career Options Has Streams'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CareerOptionsHasStream', 'url'=>array('index')),
	array('label'=>'Create CareerOptionsHasStream', 'url'=>array('create')),
	array('label'=>'Update CareerOptionsHasStream', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CareerOptionsHasStream', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CareerOptionsHasStream', 'url'=>array('admin')),
);
?>

<h1>View CareerOptionsHasStream #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'career_options_id',
		'stream_id',
		'published',
		'status',
		'add_date',
	),
)); ?>
