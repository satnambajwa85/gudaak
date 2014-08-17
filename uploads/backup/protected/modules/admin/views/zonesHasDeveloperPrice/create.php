<?php
/* @var $this ZonesHasDeveloperPriceController */
/* @var $model ZonesHasDeveloperPrice */

$this->breadcrumbs=array(
	'Zones Has Developer Prices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ZonesHasDeveloperPrice', 'url'=>array('index')),
	array('label'=>'Manage ZonesHasDeveloperPrice', 'url'=>array('admin')),
);
?>

<h1>Create ZonesHasDeveloperPrice</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>