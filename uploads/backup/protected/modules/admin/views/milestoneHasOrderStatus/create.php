<?php
/* @var $this MilestoneHasOrderStatusController */
/* @var $model MilestoneHasOrderStatus */

$this->breadcrumbs=array(
	'Milestone Has Order Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MilestoneHasOrderStatus', 'url'=>array('index')),
	array('label'=>'Manage MilestoneHasOrderStatus', 'url'=>array('admin')),
);
?>

<h1>Create MilestoneHasOrderStatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>