<?php
/* @var $this CourseStreamController */
/* @var $model CourseStream */

$this->breadcrumbs=array(
	'Course Streams'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CourseStream', 'url'=>array('index')),
	array('label'=>'Create CourseStream', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#course-stream-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Course Streams</h1>


<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/courseStream/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'course-stream-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		//'description',
		'image',
		'add_date',
		'published',
		/*
		'status',
		'courses_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
