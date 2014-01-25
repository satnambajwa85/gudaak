<?php
/* @var $this CareerOptionsController */
/* @var $model CareerOptions */

$this->breadcrumbs=array(
	'Career Options'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CareerOptions', 'url'=>array('index')),
	array('label'=>'Create CareerOptions', 'url'=>array('create')),
	array('label'=>'Update CareerOptions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CareerOptions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CareerOptions', 'url'=>array('admin')),
);
?>

<h1>View CareerOptions #<?php echo $model->id; ?></h1>

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
		'career_id',
	),
)); ?>
