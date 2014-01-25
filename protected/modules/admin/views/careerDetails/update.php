<?php
/* @var $this CareerDetailsController */
/* @var $model CareerDetails */

$this->breadcrumbs=array(
	'Career Details'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CareerDetails', 'url'=>array('index')),
	array('label'=>'Create CareerDetails', 'url'=>array('create')),
	array('label'=>'View CareerDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CareerDetails', 'url'=>array('admin')),
);
?>

<h1>Update CareerDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>