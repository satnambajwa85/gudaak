<?php
/* @var $this ZonesHasDeveloperPriceController */
/* @var $model ZonesHasDeveloperPrice */

$this->breadcrumbs=array(
	'Zones Has Developer Prices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ZonesHasDeveloperPrice', 'url'=>array('index')),
	array('label'=>'Create ZonesHasDeveloperPrice', 'url'=>array('create')),
	array('label'=>'Update ZonesHasDeveloperPrice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ZonesHasDeveloperPrice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ZonesHasDeveloperPrice', 'url'=>array('admin')),
);
?>

<h1>View ZonesHasDeveloperPrice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'zones_id',
		'developer_types_id',
		'min_price',
		'max_price',
		'status',
		'add_date',
	),
)); ?>
