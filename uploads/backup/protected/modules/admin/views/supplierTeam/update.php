<?php
/* @var $this SupplierTeamController */
/* @var $model SupplierTeam */

$this->breadcrumbs=array(
	'Supplier Teams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SupplierTeam', 'url'=>array('index')),
	array('label'=>'Create SupplierTeam', 'url'=>array('create')),
	array('label'=>'View SupplierTeam', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SupplierTeam', 'url'=>array('admin')),
);
?>

<h1>Update SupplierTeam <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>