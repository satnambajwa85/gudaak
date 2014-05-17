<?php
$this->breadcrumbs=array(
	'Category Specializations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CategorySpecialization', 'url'=>array('index')),
	array('label'=>'Create CategorySpecialization', 'url'=>array('create')),
	array('label'=>'Update CategorySpecialization', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CategorySpecialization', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategorySpecialization', 'url'=>array('admin')),
);
?>

<h1>View CategorySpecialization #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'add_date',
		'status',
	),
)); ?>
