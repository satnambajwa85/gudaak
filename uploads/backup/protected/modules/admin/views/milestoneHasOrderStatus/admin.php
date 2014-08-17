<?php
/* @var $this MilestoneHasOrderStatusController */
/* @var $model MilestoneHasOrderStatus */

$this->breadcrumbs=array(
	'Milestone Has Order Statuses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MilestoneHasOrderStatus', 'url'=>array('index')),
	array('label'=>'Create MilestoneHasOrderStatus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#milestone-has-order-status-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Milestone Has Order Statuses</h1>

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
	'id'=>'milestone-has-order-status-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'supplier_milestones_id',
		'old_status',
		'new_status',
		'date',
		'note',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
