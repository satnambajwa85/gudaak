<?php
/* @var $this InterestsController */
/* @var $model Interests */

$this->breadcrumbs=array(
	'Interests'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Interests', 'url'=>array('index')),
	array('label'=>'Create Interests', 'url'=>array('create')),
	array('label'=>'View Interests', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Interests', 'url'=>array('admin')),
);
?>

<h1>Update Interests <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>