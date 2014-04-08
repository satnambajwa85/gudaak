<?php
/* @var $this CareerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Careers',
);

$this->menu=array(
	array('label'=>'Create Career', 'url'=>array('create')),
	array('label'=>'Manage Career', 'url'=>array('admin')),
);
?>

<h1>Careers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
