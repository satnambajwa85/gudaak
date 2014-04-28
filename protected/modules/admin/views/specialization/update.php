<?php
$this->breadcrumbs=array(
	'Specializations'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Specialization', 'url'=>array('index')),
	array('label'=>'Create Specialization', 'url'=>array('create')),
	array('label'=>'View Specialization', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Specialization', 'url'=>array('admin')),
);
?>

<h1>Update Specialization <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>