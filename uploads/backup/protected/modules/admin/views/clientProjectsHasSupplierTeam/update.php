<?php
/* @var $this ClientProjectsHasSupplierTeamController */
/* @var $model ClientProjectsHasSupplierTeam */

$this->breadcrumbs=array(
	'Client Projects Has Supplier Teams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasSupplierTeam', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasSupplierTeam', 'url'=>array('create')),
	array('label'=>'View ClientProjectsHasSupplierTeam', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectsHasSupplierTeam', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectsHasSupplierTeam <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>