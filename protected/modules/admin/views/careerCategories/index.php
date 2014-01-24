<?php
/* @var $this CareerCategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Career Categories',
);

$this->menu=array(
	array('label'=>'Create CareerCategories', 'url'=>array('create')),
	array('label'=>'Manage CareerCategories', 'url'=>array('admin')),
);
?>

<h1>Career Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
