<?php
/* @var $this UserReportsController */
/* @var $model UserReports */

$this->breadcrumbs=array(
	'User Reports'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserReports', 'url'=>array('index')),
	array('label'=>'Create UserReports', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-reports-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Reports</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/userReports/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-reports-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'user_profiles_id',
		'score',
		'interest',
		'activation',
		'status',
		/*
		'add_date',
		'orient_items_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
