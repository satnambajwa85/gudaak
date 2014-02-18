<?php
/* @var $this CareerOptionsController */
/* @var $model CareerOptions */

$this->breadcrumbs=array(
	'Career Options'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CareerOptions', 'url'=>array('index')),
	array('label'=>'Create CareerOptions', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#career-options-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Career Options</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/careerOptions/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>
	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'career-options-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'Career Categories ',
            'value'=>'$data->career->careerCategories->title'
        ),
			array(
            'name'=>'Career',
            'value'=>'$data->career->title'
        ),
		'title',
		//'description',
		 array(
            'name'=>'image',
            'type'=>'raw',
             'value' => 'CHtml::image(Yii::app()->baseUrl . "/uploads/career_options/small/" . $data->image)'

        ),
		'add_date',
		'modification_date',
		/*
		'published',
		'status',
		'career_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
