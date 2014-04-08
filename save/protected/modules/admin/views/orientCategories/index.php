<?php
/* @var $this OrientCategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Orient Categories',
);

$this->menu=array(
	array('label'=>'Create OrientCategories', 'url'=>array('create')),
	array('label'=>'Manage OrientCategories', 'url'=>array('admin')),
);
?>

<h1>Orient Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
