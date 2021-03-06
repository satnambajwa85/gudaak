<?php
/* @var $this CareerDetailsController */
/* @var $model CareerDetails */

$this->breadcrumbs=array(
	'Career Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CareerDetails', 'url'=>array('index')),
	array('label'=>'Create CareerDetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#career-details-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Career Details</h1>
<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
</div><?php echo CHtml::link('Create',array('/admin/careerOptions/createDetails','id'=>$id),array('class'=>'pull-right btn btn-s-md btn-success')); ?>
	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'career-details-grid',
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
		array(
            'name'=>'Career',
            'value'=>'$data->title'
        ),
		'title',
		//'description',
		'image',
		'published',
		'status',
		/*
		'career_options_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
