<?php
/* @var $this CareerOptionsHasSubjectsController */
/* @var $model CareerOptionsHasSubjects */

$this->breadcrumbs=array(
	'Career Options Has Subjects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CareerOptionsHasSubjects', 'url'=>array('index')),
	array('label'=>'Create CareerOptionsHasSubjects', 'url'=>array('create')),
	array('label'=>'Update CareerOptionsHasSubjects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CareerOptionsHasSubjects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CareerOptionsHasSubjects', 'url'=>array('admin')),
);
?>

<h1>View CareerOptionsHasSubjects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'career_options_id',
		'subjects_id',
	),
)); ?>
