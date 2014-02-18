<?php
/* @var $this UserProfilesHasStreamController */
/* @var $model UserProfilesHasStream */

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
	$('#user-profiles-has-stream-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Profiles Has Streams</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/userProfilesHasStream/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-profiles-has-stream-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'user_profiles_id',
		'stream_id',
		'add_date',
		'reccomended',
		'self',
		/*
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
