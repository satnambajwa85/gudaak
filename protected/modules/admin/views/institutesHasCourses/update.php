<?php
/* @var $this InstitutesHasCoursesController */
/* @var $model InstitutesHasCourses */

$this->breadcrumbs=array(
	'Institutes Has Courses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InstitutesHasCourses', 'url'=>array('index')),
	array('label'=>'Create InstitutesHasCourses', 'url'=>array('create')),
	array('label'=>'View InstitutesHasCourses', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage InstitutesHasCourses', 'url'=>array('admin')),
);
?>

<h1>Update InstitutesHasCourses <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>