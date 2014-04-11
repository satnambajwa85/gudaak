<?php
/* @var $this CareerDetailsController */
/* @var $model CareerDetails */

$this->breadcrumbs=array(
	'Career Details'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CareerDetails', 'url'=>array('index')),
	array('label'=>'Create CareerDetails', 'url'=>array('create')),
	array('label'=>'Update CareerDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CareerDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CareerDetails', 'url'=>array('admin')),
);
?>

<h1>View CareerDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'image',
		'published',
		'status',
		'career_options_id',
	),
)); ?>
