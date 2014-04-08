<?php
/* @var $this TestReportsController */
/* @var $model TestReports */

$this->breadcrumbs=array(
	'Test Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TestReports', 'url'=>array('index')),
	array('label'=>'Create TestReports', 'url'=>array('create')),
	array('label'=>'Update TestReports', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TestReports', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestReports', 'url'=>array('admin')),
);
?>

<h1>View TestReports #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'comments',
		'status',
		'activation',
		'user_profiles_id',
		'questions_id',
		'question_options_id',
		 
	),
)); ?>
