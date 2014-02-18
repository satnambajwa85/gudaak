<?php
/* @var $this InstitutesHasCoursesController */
/* @var $model InstitutesHasCourses */

$this->breadcrumbs=array(
	'Institutes Has Courses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List InstitutesHasCourses', 'url'=>array('index')),
	array('label'=>'Create InstitutesHasCourses', 'url'=>array('create')),
	array('label'=>'Update InstitutesHasCourses', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InstitutesHasCourses', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InstitutesHasCourses', 'url'=>array('admin')),
);
?>

<h1>View InstitutesHasCourses #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'institutes_id',
		'courses_id',
		'add_date',
		'published',
		'status',
	),
)); ?>
