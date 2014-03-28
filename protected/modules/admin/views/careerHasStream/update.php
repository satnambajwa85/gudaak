<?php
/* @var $this CareerHasStreamController */
/* @var $model CareerHasStream */

$this->breadcrumbs=array(
	'Career Has Streams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CareerHasStream', 'url'=>array('index')),
	array('label'=>'Create CareerHasStream', 'url'=>array('create')),
	array('label'=>'View CareerHasStream', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CareerHasStream', 'url'=>array('admin')),
);
?>

<h1>Update CareerHasStream <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>