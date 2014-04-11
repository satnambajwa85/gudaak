<?php
/* @var $this StreamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Streams',
);

$this->menu=array(
	array('label'=>'Create Stream', 'url'=>array('create')),
	array('label'=>'Manage Stream', 'url'=>array('admin')),
);
?>

<h1>Streams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
