<?php
/* @var $this StreamHasSubjectsController */
/* @var $model StreamHasSubjects */

$this->breadcrumbs=array(
	'Stream Has Subjects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StreamHasSubjects', 'url'=>array('index')),
	array('label'=>'Create StreamHasSubjects', 'url'=>array('create')),
	array('label'=>'Update StreamHasSubjects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StreamHasSubjects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StreamHasSubjects', 'url'=>array('admin')),
);
?>

<h1>View StreamHasSubjects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'stream_id',
		'subjects_id',
		'type_subjects',
		'status',
		'add_date',
	),
)); ?>
