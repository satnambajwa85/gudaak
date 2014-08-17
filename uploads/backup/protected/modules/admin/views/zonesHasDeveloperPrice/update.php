<?php
/* @var $this ZonesHasDeveloperPriceController */
/* @var $model ZonesHasDeveloperPrice */

$this->breadcrumbs=array(
	'Zones Has Developer Prices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ZonesHasDeveloperPrice', 'url'=>array('index')),
	array('label'=>'Create ZonesHasDeveloperPrice', 'url'=>array('create')),
	array('label'=>'View ZonesHasDeveloperPrice', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ZonesHasDeveloperPrice', 'url'=>array('admin')),
);
?>

<h1>Update ZonesHasDeveloperPrice <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>