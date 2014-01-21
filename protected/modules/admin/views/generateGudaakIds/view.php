<?php
/* @var $this GenerateGudaakIdsController */
/* @var $model GenerateGudaakIds */

$this->breadcrumbs=array(
	'Generate Gudaak Ids'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GenerateGudaakIds', 'url'=>array('index')),
	array('label'=>'Create GenerateGudaakIds', 'url'=>array('create')),
	array('label'=>'Update GenerateGudaakIds', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GenerateGudaakIds', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GenerateGudaakIds', 'url'=>array('admin')),
);
?>

<h1>View GenerateGudaakIds #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'gudaak_id',
		'cities_id',
		'schools_id',
		'add_date',
		'activation',
		'status',
	),
)); ?>
