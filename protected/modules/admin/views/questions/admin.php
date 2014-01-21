<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Questions', 'url'=>array('index')),
	array('label'=>'Create Questions', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#questions-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Questions</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/questions/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'questions-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'Categories',
            'value'=>'$data->orientItems->orientCategories->title'
        ),
		array(
            'name'=>'Sub_Categories',
            'value'=>'$data->orientItems->title'
        ),
		'title',
		'alias',
		//'description',
		'image',
		'published',
		/*
		'status',
		'orient_items_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
