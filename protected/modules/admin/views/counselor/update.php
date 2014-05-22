<?php
$this->breadcrumbs=array(
	'Counselors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Counselor', 'url'=>array('index')),
	array('label'=>'Create Counselor', 'url'=>array('create')),
	array('label'=>'View Counselor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Counselor', 'url'=>array('admin')),
);
?>

<h1>Update Counselor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>