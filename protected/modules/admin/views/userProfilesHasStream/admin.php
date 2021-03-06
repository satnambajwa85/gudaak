<?php
$this->breadcrumbs=array(
	'User Profiles Has Streams'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserProfilesHasStream', 'url'=>array('index')),
	array('label'=>'Create UserProfilesHasStream', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-profiles-has-stream-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Profiles Has Streams</h1>

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
	'id'=>'user-profiles-has-stream-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_profiles_id',
		'stream_id',
		'counsellor_id',
		'comments',
		'add_date',
		/*
		'reccomended',
		'self',
		'default',
		'status',
		'modified_date',
		'updated_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
