<?php
/* @var $this DeveloperTypesController */
/* @var $model DeveloperTypes */

$this->breadcrumbs=array(
	'Developer Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DeveloperTypes', 'url'=>array('index')),
	array('label'=>'Create DeveloperTypes', 'url'=>array('create')),
	array('label'=>'View DeveloperTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DeveloperTypes', 'url'=>array('admin')),
);
?>

<h1>Update DeveloperTypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>