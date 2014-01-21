<?php
/* @var $this QuestionOptionsController */
/* @var $model QuestionOptions */

$this->breadcrumbs=array(
	'Question Options'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuestionOptions', 'url'=>array('index')),
	array('label'=>'Create QuestionOptions', 'url'=>array('create')),
	array('label'=>'View QuestionOptions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QuestionOptions', 'url'=>array('admin')),
);
?>

<h1>Update QuestionOptions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>