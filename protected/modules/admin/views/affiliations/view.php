<?php
/* @var $this AffiliationsController */
/* @var $model Affiliations */

$this->breadcrumbs=array(
	'Affiliations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Affiliations', 'url'=>array('index')),
	array('label'=>'Create Affiliations', 'url'=>array('create')),
	array('label'=>'Update Affiliations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Affiliations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Affiliations', 'url'=>array('admin')),
);
?>

<h1>View Affiliations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'logo',
		'status',
		'activation',
		'add_date',
	),
)); ?>
