<?php
/* @var $this ZonesHasDeveloperPriceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Zones Has Developer Prices',
);

$this->menu=array(
	array('label'=>'Create ZonesHasDeveloperPrice', 'url'=>array('create')),
	array('label'=>'Manage ZonesHasDeveloperPrice', 'url'=>array('admin')),
);
?>

<h1>Zones Has Developer Prices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
