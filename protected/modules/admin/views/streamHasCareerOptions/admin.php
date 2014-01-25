<?php
/* @var $this StreamHasCareerOptionsController */
/* @var $model StreamHasCareerOptions */

$this->breadcrumbs=array(
	'Stream Has Career Options'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StreamHasCareerOptions', 'url'=>array('index')),
	array('label'=>'Create StreamHasCareerOptions', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#stream-has-career-options-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Stream Has Career Options</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stream-has-career-options-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'stream_id',
		'career_options_id',
		'add_date',
		'published',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
