<?php
/* @var $this MilestoneHasOrderStatusController */
/* @var $model MilestoneHasOrderStatus */

$this->breadcrumbs=array(
	'Milestone Has Order Statuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MilestoneHasOrderStatus', 'url'=>array('index')),
	array('label'=>'Create MilestoneHasOrderStatus', 'url'=>array('create')),
	array('label'=>'View MilestoneHasOrderStatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MilestoneHasOrderStatus', 'url'=>array('admin')),
);
?>

<h1>Update MilestoneHasOrderStatus <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>