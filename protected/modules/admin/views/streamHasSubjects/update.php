<?php
/* @var $this StreamHasSubjectsController */
/* @var $model StreamHasSubjects */

$this->breadcrumbs=array(
	'Stream Has Subjects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StreamHasSubjects', 'url'=>array('index')),
	array('label'=>'Create StreamHasSubjects', 'url'=>array('create')),
	array('label'=>'View StreamHasSubjects', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StreamHasSubjects', 'url'=>array('admin')),
);
?>

<h1>Update StreamHasSubjects <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>