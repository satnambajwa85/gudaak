<?php
/* @var $this MilestoneHasOrderStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Milestone Has Order Statuses',
);

$this->menu=array(
	array('label'=>'Create MilestoneHasOrderStatus', 'url'=>array('create')),
	array('label'=>'Manage MilestoneHasOrderStatus', 'url'=>array('admin')),
);
?>

<h1>Milestone Has Order Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
