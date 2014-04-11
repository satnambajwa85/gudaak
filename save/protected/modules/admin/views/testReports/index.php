<?php
/* @var $this TestReportsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Test Reports',
);

$this->menu=array(
	array('label'=>'Create TestReports', 'url'=>array('create')),
	array('label'=>'Manage TestReports', 'url'=>array('admin')),
);
?>

<h1>Test Reports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
