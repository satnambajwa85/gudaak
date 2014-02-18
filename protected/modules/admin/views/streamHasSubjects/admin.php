<?php
/* @var $this StreamHasSubjectsController */
/* @var $model StreamHasSubjects */

$this->breadcrumbs=array(
	'Stream Has Subjects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StreamHasSubjects', 'url'=>array('index')),
	array('label'=>'Create StreamHasSubjects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#stream-has-subjects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Stream Has Subjects</h1>
<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/streamHasSubjects/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stream-has-subjects-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'stream_id',
		'subjects_id',
		'type_subjects',
		'status',
		'add_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
