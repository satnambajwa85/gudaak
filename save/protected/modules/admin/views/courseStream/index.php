<?php
/* @var $this CourseStreamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Course Streams',
);

$this->menu=array(
	array('label'=>'Create CourseStream', 'url'=>array('create')),
	array('label'=>'Manage CourseStream', 'url'=>array('admin')),
);
?>

<h1>Course Streams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
