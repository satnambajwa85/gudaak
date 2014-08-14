<?php
/* @var $this SuppliersProjectsProposalsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Projects Proposals',
);

$this->menu=array(
	array('label'=>'Create SuppliersProjectsProposals', 'url'=>array('create')),
	array('label'=>'Manage SuppliersProjectsProposals', 'url'=>array('admin')),
);
?>

<h1>Suppliers Projects Proposals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
