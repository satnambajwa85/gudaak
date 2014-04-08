<?php
/* @var $this CareerDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Career Details',
);

$this->menu=array(
	array('label'=>'Create CareerDetails', 'url'=>array('create')),
	array('label'=>'Manage CareerDetails', 'url'=>array('admin')),
);
?>

<h1>Career Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
