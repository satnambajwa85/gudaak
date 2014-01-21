<?php
/* @var $this TestReportsController */
/* @var $model TestReports */

$this->breadcrumbs=array(
	'Test Reports'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TestReports', 'url'=>array('index')),
	array('label'=>'Create TestReports', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#test-reports-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Test Reports</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/testReports/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'test-reports-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'comments',
		'status',
		'activation',
		'user_profiles_id',
		'questions_id',
		/*
		'question_options_id',
		'reports_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
