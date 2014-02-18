<?php
/* @var $this CourseStreamController */
/* @var $model CourseStream */

$this->breadcrumbs=array(
	'Course Streams'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CourseStream', 'url'=>array('index')),
	array('label'=>'Create CourseStream', 'url'=>array('create')),
	array('label'=>'View CourseStream', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CourseStream', 'url'=>array('admin')),
);
?>

<h1>Update CourseStream <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>