<?php
$this->breadcrumbs=array(
	'Entrance Exams'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EntranceExams', 'url'=>array('index')),
	array('label'=>'Create EntranceExams', 'url'=>array('create')),
	array('label'=>'Update EntranceExams', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EntranceExams', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EntranceExams', 'url'=>array('admin')),
);
?>

<h1>View EntranceExams #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'level',
		'career_category',
		'details',
		'start_date',
		'end_date',
		'test_date',
		'result_date',
		'add_date',
		'status',
	),
)); ?>
