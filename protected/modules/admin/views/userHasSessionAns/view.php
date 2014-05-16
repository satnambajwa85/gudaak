<?php
$this->breadcrumbs=array(
	'User Has Session Ans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserHasSessionAns', 'url'=>array('index')),
	array('label'=>'Create UserHasSessionAns', 'url'=>array('create')),
	array('label'=>'Update UserHasSessionAns', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserHasSessionAns', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserHasSessionAns', 'url'=>array('admin')),
);
?>

<h1>View UserHasSessionAns #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'session_question_id',
		'answers',
		'status',
	),
)); ?>
