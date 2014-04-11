<?php
/* @var $this InstitutesHasCoursesController */
/* @var $model InstitutesHasCourses */

$this->breadcrumbs=array(
	'Institutes Has Courses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InstitutesHasCourses', 'url'=>array('index')),
	array('label'=>'Manage InstitutesHasCourses', 'url'=>array('admin')),
);
?>

<h1>Create InstitutesHasCourses</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>