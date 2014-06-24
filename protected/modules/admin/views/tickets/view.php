<?php
$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Tickets', 'url'=>array('index')),
	array('label'=>'Create Tickets', 'url'=>array('create')),
	array('label'=>'Update Tickets', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tickets', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tickets', 'url'=>array('admin')),
);
?>

<h1>View Tickets #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sender_id',
		'receiver_id',
		'title',
		'problem',
		'mode',
		'language',
		'available',
		'solution',
		'status',
		'add_date',
		'modification_date',
	),
)); ?>
