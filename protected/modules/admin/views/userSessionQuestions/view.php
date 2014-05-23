<?php
$this->breadcrumbs=array(
	'User Session Questions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserSessionQuestions', 'url'=>array('index')),
	array('label'=>'Create UserSessionQuestions', 'url'=>array('create')),
	array('label'=>'Update UserSessionQuestions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserSessionQuestions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserSessionQuestions', 'url'=>array('admin')),
);
?>

<h1>View UserSessionQuestions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'session_questions_id',
		'answer',
		'add_date',
		'status',
	),
)); ?>
