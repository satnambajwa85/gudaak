<?php
$this->breadcrumbs=array(
	'Entrance Exams'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EntranceExams', 'url'=>array('index')),
	array('label'=>'Create EntranceExams', 'url'=>array('create')),
	array('label'=>'View EntranceExams', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EntranceExams', 'url'=>array('admin')),
);
?>

<h1>Update EntranceExams <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>