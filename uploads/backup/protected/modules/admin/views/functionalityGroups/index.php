<?php
/* @var $this FunctionalityGroupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Functionality Groups',
);

$this->menu=array(
	array('label'=>'Create FunctionalityGroups', 'url'=>array('create')),
	array('label'=>'Manage FunctionalityGroups', 'url'=>array('admin')),
);
?>

<h1>Functionality Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
