<?php
$this->breadcrumbs=array(
	'Career Assessments'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CareerAssessment', 'url'=>array('index')),
	array('label'=>'Create CareerAssessment', 'url'=>array('create')),
	array('label'=>'View CareerAssessment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CareerAssessment', 'url'=>array('admin')),
);
?>

<h1>Update CareerAssessment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>