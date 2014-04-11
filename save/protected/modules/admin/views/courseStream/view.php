<?php
/* @var $this CourseStreamController */
/* @var $model CourseStream */

$this->breadcrumbs=array(
	'Course Streams'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CourseStream', 'url'=>array('index')),
	array('label'=>'Create CourseStream', 'url'=>array('create')),
	array('label'=>'Update CourseStream', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CourseStream', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CourseStream', 'url'=>array('admin')),
);
?>

<h1>View CourseStream #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'image',
		'add_date',
		'published',
		'status',
		'courses_id',
	),
)); ?>
