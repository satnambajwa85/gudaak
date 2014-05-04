<?php
$this->breadcrumbs=array(
	'Career Assessments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CareerAssessment', 'url'=>array('index')),
	array('label'=>'Manage CareerAssessment', 'url'=>array('admin')),
);
?>

<h1>Create CareerAssessment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>