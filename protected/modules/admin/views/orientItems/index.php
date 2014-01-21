<?php
/* @var $this OrientItemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Orient Items',
);

$this->menu=array(
	array('label'=>'Create OrientItems', 'url'=>array('create')),
	array('label'=>'Manage OrientItems', 'url'=>array('admin')),
);
?>

<h1>Orient Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
