<?php
/* @var $this InstitutesHasCoursesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Institutes Has Courses',
);

$this->menu=array(
	array('label'=>'Create InstitutesHasCourses', 'url'=>array('create')),
	array('label'=>'Manage InstitutesHasCourses', 'url'=>array('admin')),
);
?>

<h1>Institutes Has Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
