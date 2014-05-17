<?php
$this->breadcrumbs=array(
	'Category Specializations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategorySpecialization', 'url'=>array('index')),
	array('label'=>'Manage CategorySpecialization', 'url'=>array('admin')),
);
?>

<h1>Create CategorySpecialization</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>