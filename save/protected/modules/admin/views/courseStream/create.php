<?php
/* @var $this CourseStreamController */
/* @var $model CourseStream */

$this->breadcrumbs=array(
	'Course Streams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CourseStream', 'url'=>array('index')),
	array('label'=>'Manage CourseStream', 'url'=>array('admin')),
);
?>

<h1>Create CourseStream</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>