<?php
/* @var $this CareerOptionsHasStreamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Career Options Has Streams',
);

$this->menu=array(
	array('label'=>'Create CareerOptionsHasStream', 'url'=>array('create')),
	array('label'=>'Manage CareerOptionsHasStream', 'url'=>array('admin')),
);
?>

<h1>Career Options Has Streams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
