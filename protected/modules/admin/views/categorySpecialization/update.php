<?php
$this->breadcrumbs=array(
	'Category Specializations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategorySpecialization', 'url'=>array('index')),
	array('label'=>'Create CategorySpecialization', 'url'=>array('create')),
	array('label'=>'View CategorySpecialization', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CategorySpecialization', 'url'=>array('admin')),
);
?>

<h1>Update CategorySpecialization <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>