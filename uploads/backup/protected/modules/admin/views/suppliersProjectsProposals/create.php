<?php
/* @var $this SuppliersProjectsProposalsController */
/* @var $model SuppliersProjectsProposals */

$this->breadcrumbs=array(
	'Suppliers Projects Proposals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersProjectsProposals', 'url'=>array('index')),
	array('label'=>'Manage SuppliersProjectsProposals', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersProjectsProposals</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>