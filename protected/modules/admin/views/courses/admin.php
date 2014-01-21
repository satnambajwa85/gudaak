<?php
/* @var $this CoursesController */
/* @var $model Courses */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Courses', 'url'=>array('index')),
	array('label'=>'Create Courses', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#courses-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Courses</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/courses/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'courses-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'add_date',
		'published',
		'status',
		/*
		'interests_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
