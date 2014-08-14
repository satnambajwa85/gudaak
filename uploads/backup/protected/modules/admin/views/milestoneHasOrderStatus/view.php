<?php
/* @var $this MilestoneHasOrderStatusController */
/* @var $model MilestoneHasOrderStatus */

$this->breadcrumbs=array(
	'Milestone Has Order Statuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MilestoneHasOrderStatus', 'url'=>array('index')),
	array('label'=>'Create MilestoneHasOrderStatus', 'url'=>array('create')),
	array('label'=>'Update MilestoneHasOrderStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MilestoneHasOrderStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MilestoneHasOrderStatus', 'url'=>array('admin')),
);
?>

<h1>View MilestoneHasOrderStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'supplier_milestones_id',
		'old_status',
		'new_status',
		'date',
		'note',
	),
)); ?>
