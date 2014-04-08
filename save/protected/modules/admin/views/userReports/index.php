<?php
/* @var $this UserReportsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Reports',
);

$this->menu=array(
	array('label'=>'Create UserReports', 'url'=>array('create')),
	array('label'=>'Manage UserReports', 'url'=>array('admin')),
);
?>

<h1>User Reports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
