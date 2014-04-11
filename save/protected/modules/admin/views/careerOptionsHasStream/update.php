<?php
/* @var $this CareerOptionsHasStreamController */
/* @var $model CareerOptionsHasStream */

$this->breadcrumbs=array(
	'Career Options Has Streams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CareerOptionsHasStream', 'url'=>array('index')),
	array('label'=>'Create CareerOptionsHasStream', 'url'=>array('create')),
	array('label'=>'View CareerOptionsHasStream', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CareerOptionsHasStream', 'url'=>array('admin')),
);
?>

<h1>Update CareerOptionsHasStream <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>