<?php
/* @var $this GenerateGudaakIdsController */
/* @var $model GenerateGudaakIds */

$this->breadcrumbs=array(
	'Generate Gudaak Ids'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GenerateGudaakIds', 'url'=>array('index')),
	array('label'=>'Manage GenerateGudaakIds', 'url'=>array('admin')),
);
?>

<h1>Create GenerateGudaakIds</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>