<?php
/* @var $this SuppliersProjectsProposalsController */
/* @var $model SuppliersProjectsProposals */

$this->breadcrumbs=array(
	'Suppliers Projects Proposals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersProjectsProposals', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjectsProposals', 'url'=>array('create')),
	array('label'=>'Update SuppliersProjectsProposals', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersProjectsProposals', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersProjectsProposals', 'url'=>array('admin')),
);
?>

<h1>View SuppliersProjectsProposals #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_id',
		'client_projects_id',
		'pitch',
		'estimated_cost',
		'time_estimation',
		'status',
		'add_date',
		'comments',
		'others',
	),
)); ?>
