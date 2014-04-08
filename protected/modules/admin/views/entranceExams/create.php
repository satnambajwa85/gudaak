<?php
$this->breadcrumbs=array(
	'Entrance Exams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EntranceExams', 'url'=>array('index')),
	array('label'=>'Manage EntranceExams', 'url'=>array('admin')),
);
?>

<h1>Create EntranceExams</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>