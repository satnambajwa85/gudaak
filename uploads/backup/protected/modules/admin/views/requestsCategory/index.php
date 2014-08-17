<?php
/* @var $this RequestsCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Requests Categories',
);

$this->menu=array(
	array('label'=>'Create RequestsCategory', 'url'=>array('create')),
	array('label'=>'Manage RequestsCategory', 'url'=>array('admin')),
);
?>

<h1>Requests Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
