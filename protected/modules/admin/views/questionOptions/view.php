<?php
/* @var $this QuestionOptionsController */
/* @var $model QuestionOptions */

$this->breadcrumbs=array(
	'Question Options'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List QuestionOptions', 'url'=>array('index')),
	array('label'=>'Create QuestionOptions', 'url'=>array('create')),
	array('label'=>'Update QuestionOptions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QuestionOptions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuestionOptions', 'url'=>array('admin')),
);
?>

<h1>View QuestionOptions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'value',
		'description',
		'interest_value',
		'add_date',
		'status',
		'activation',
		'questions_id',
	),
)); ?>
