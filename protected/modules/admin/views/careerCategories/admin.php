<?php
/* @var $this CareerCategoriesController */
/* @var $model CareerCategories */

$this->breadcrumbs=array(
	'Career Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CareerCategories', 'url'=>array('index')),
	array('label'=>'Create CareerCategories', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#career-categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Career Categories</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/careerCategories/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>
	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'career-categories-grid',
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
		*/
		array(
			'type'=>'raw',
			'name'=>'Add Records',
            'value'=>'CHtml::link("Data",array("/admin/career/adminView","id"=>$data->id))',
            ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
