<?php
$this->breadcrumbs=array(
	'Session Questions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SessionQuestions', 'url'=>array('index')),
	array('label'=>'Create SessionQuestions', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('session-questions-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Session Questions</h1>

<?php echo CHtml::link('Create',array('create'),array('class'=>'pull-right')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'session-questions-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'session_id',
		'name',
		'description',
		'controller_type',
		'options',
		/*
		'other',
		'add_date',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
