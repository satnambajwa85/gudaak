<?php
/* @var $this SupplierTeamController */
/* @var $model SupplierTeam */

$this->breadcrumbs=array(
	'Supplier Teams'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SupplierTeam', 'url'=>array('index')),
	array('label'=>'Create SupplierTeam', 'url'=>array('create')),
	array('label'=>'Update SupplierTeam', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SupplierTeam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SupplierTeam', 'url'=>array('admin')),
);
?>

<h1>View SupplierTeam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_id',
		'first_name',
		'last_name',
		'about',
		'expertise_skills',
		'education',
		'experiance',
		'dob',
		'email',
		'phone',
		'skype',
		'image',
		'address',
		'pincode',
		'status',
	),
)); ?>
