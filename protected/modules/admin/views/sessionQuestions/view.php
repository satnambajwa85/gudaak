<?php
$this->breadcrumbs=array(
	'Session Questions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SessionQuestions', 'url'=>array('index')),
	array('label'=>'Create SessionQuestions', 'url'=>array('create')),
	array('label'=>'Update SessionQuestions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SessionQuestions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SessionQuestions', 'url'=>array('admin')),
);
?>

<h1>View SessionQuestions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'session_id',
		'name',
		'description',
		'controller_type',
		'options',
		'other',
		'add_date',
		'status',
	),
)); ?>
