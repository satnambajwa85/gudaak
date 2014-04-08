<?php
/* @var $this CareerOptionsHasSubjectsController */
/* @var $model CareerOptionsHasSubjects */

$this->breadcrumbs=array(
	'Career Options Has Subjects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CareerOptionsHasSubjects', 'url'=>array('index')),
	array('label'=>'Create CareerOptionsHasSubjects', 'url'=>array('create')),
	array('label'=>'View CareerOptionsHasSubjects', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CareerOptionsHasSubjects', 'url'=>array('admin')),
);
?>

<h1>Update CareerOptionsHasSubjects <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>