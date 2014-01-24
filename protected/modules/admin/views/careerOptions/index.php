<?php
/* @var $this CareerOptionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Career Options',
);

$this->menu=array(
	array('label'=>'Create CareerOptions', 'url'=>array('create')),
	array('label'=>'Manage CareerOptions', 'url'=>array('admin')),
);
?>

<h1>Career Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
