<?php
/* @var $this CareerOptionsHasStreamController */
/* @var $model CareerOptionsHasStream */

$this->breadcrumbs=array(
	'Career Options Has Streams'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CareerOptionsHasStream', 'url'=>array('index')),
	array('label'=>'Create CareerOptionsHasStream', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#career-options-has-stream-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Career Options Has Streams</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/careerOptionsHasStream/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'career-options-has-stream-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'Stream ',
            'value'=>'$data->stream->name'
        ),
		array(
            'name'=>'Career Options ',
            'value'=>'$data->careerOptions->title'
        ),
		'published',
		'status',
		'add_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
