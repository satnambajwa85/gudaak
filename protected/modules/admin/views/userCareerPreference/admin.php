<?php
$this->breadcrumbs=array(
	'User Career Preferences'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserCareerPreference', 'url'=>array('index')),
	array('label'=>'Create UserCareerPreference', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-career-preference-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Career Preferences</h1>

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
	'id'=>'user-career-preference-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'add_date',
		'reccomended',
		'self',
		'default',
		'status',
		/*
		'modified_date',
		'updated_by',
		'comments',
		'user_profiles_id',
		'counsellor_id',
		'career_options_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
