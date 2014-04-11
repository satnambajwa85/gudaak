<?php
/* @var $this InstitutesHasCoursesController */
/* @var $model InstitutesHasCourses */

$this->breadcrumbs=array(
	'Institutes Has Courses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List InstitutesHasCourses', 'url'=>array('index')),
	array('label'=>'Create InstitutesHasCourses', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#institutes-has-courses-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Institutes Has Courses</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/institutesHasCourses/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'institutes-has-courses-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'institutes_id',
		'courses_id',
		'add_date',
		'published',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
