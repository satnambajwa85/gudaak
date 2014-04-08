<?php
$this->breadcrumbs=array(
	'Entrance Exams'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EntranceExams', 'url'=>array('index')),
	array('label'=>'Create EntranceExams', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('entrance-exams-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Entrance Exams</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php echo CHtml::link('Create',array('/admin/entranceExams/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entrance-exams-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'level',
		array(
            'name'=>'Career Categories',
            'value'=>'$data->careerCategories->title'
        ),
		//'details',
		'start_date',
		'end_date',
		'test_date',
		'result_date',
		/*
		'add_date',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
