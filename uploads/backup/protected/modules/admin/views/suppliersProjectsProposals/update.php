<?php
/* @var $this SuppliersProjectsProposalsController */
/* @var $model SuppliersProjectsProposals */

$this->breadcrumbs=array(
	'Suppliers Projects Proposals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersProjectsProposals', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjectsProposals', 'url'=>array('create')),
	array('label'=>'View SuppliersProjectsProposals', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersProjectsProposals', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersProjectsProposals <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>