<?php
/* @var $this StreamHasCareerOptionsController */
/* @var $model StreamHasCareerOptions */

$this->breadcrumbs=array(
	'Stream Has Career Options'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StreamHasCareerOptions', 'url'=>array('index')),
	array('label'=>'Create StreamHasCareerOptions', 'url'=>array('create')),
	array('label'=>'Update StreamHasCareerOptions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StreamHasCareerOptions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StreamHasCareerOptions', 'url'=>array('admin')),
);
?>

<h1>View StreamHasCareerOptions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'stream_id',
		'career_options_id',
		'add_date',
		'published',
		'status',
	),
)); ?>
