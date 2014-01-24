<?php
/* @var $this QuestionOptionsController */
/* @var $model QuestionOptions */

$this->breadcrumbs=array(
	'Question Options'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List QuestionOptions', 'url'=>array('index')),
	array('label'=>'Create QuestionOptions', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#question-options-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Question Options</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/questionOptions/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'question-options-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
			array(
            'name'=>'Career Categories ',
            'value'=>'$data->career->careerCategories->title'
        ),
		array(
            'name'=>'Career ',
            'value'=>'$data->career->title'
        ),

		'name',
		'value',
		'description',
		'interest_value',
		'add_date',
		/*
		'status',
		'activation',
		'questions_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
