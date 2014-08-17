<?php
/* @var $this SupplierTeamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Supplier Teams',
);

$this->menu=array(
	array('label'=>'Create SupplierTeam', 'url'=>array('create')),
	array('label'=>'Manage SupplierTeam', 'url'=>array('admin')),
);
?>

<h1>Supplier Teams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
