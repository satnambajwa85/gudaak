<?php
/* @var $this OrientItemsController */
/* @var $model OrientItems */

$this->breadcrumbs=array(
	'Orient Items'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OrientItems', 'url'=>array('index')),
	array('label'=>'Create OrientItems', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#orient-items-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Orient Items</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/orientItems/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'orient-items-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'Categories',
            'value'=>'$data->orientCategories->title'
        ),
		'title',
		'alias',
		'description',
		'image',
		'video_link',
		/*
		'add_date',
		'published',
		'status',
		'orient_categories_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
