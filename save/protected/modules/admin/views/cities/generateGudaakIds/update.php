<?php
/* @var $this GenerateGudaakIdsController */
/* @var $model GenerateGudaakIds */

$this->breadcrumbs=array(
	'Generate Gudaak Ids'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GenerateGudaakIds', 'url'=>array('index')),
	array('label'=>'Create GenerateGudaakIds', 'url'=>array('create')),
	array('label'=>'View GenerateGudaakIds', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GenerateGudaakIds', 'url'=>array('admin')),
);
?>

<h1>Update GenerateGudaakIds <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>