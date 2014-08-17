<?php
/* @var $this ProjectUniqueFeaturesController */
/* @var $model ProjectUniqueFeatures */

$this->breadcrumbs=array(
	'Project Unique Features'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectUniqueFeatures', 'url'=>array('index')),
	array('label'=>'Create ProjectUniqueFeatures', 'url'=>array('create')),
	array('label'=>'View ProjectUniqueFeatures', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectUniqueFeatures', 'url'=>array('admin')),
);
?>

<h1>Update ProjectUniqueFeatures <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>