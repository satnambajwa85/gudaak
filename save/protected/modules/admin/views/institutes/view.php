<?php
/* @var $this InstitutesController */
/* @var $model Institutes */

$this->breadcrumbs=array(
	'Institutes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Institutes', 'url'=>array('index')),
	array('label'=>'Create Institutes', 'url'=>array('create')),
	array('label'=>'Update Institutes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Institutes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Institutes', 'url'=>array('admin')),
);
?>

<h1>View Institutes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'address1',
		'address2',
		'pincode',
		'phone_number',
		'email',
		'logo',
		'image',
		'add_date',
		'status',
		'activation',
		'cities_id',
	),
)); ?>
