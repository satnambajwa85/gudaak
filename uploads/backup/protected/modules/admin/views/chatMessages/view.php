<?php
/* @var $this ChatMessagesController */
/* @var $model ChatMessages */

$this->breadcrumbs=array(
	'Chat Messages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ChatMessages', 'url'=>array('index')),
	array('label'=>'Create ChatMessages', 'url'=>array('create')),
	array('label'=>'Update ChatMessages', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ChatMessages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChatMessages', 'url'=>array('admin')),
);
?>

<h1>View ChatMessages #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_projects_id',
		'suppliers_id',
		'message',
		'add_date',
		'ip_address',
		'is_sent_from_supplier',
	),
)); ?>
