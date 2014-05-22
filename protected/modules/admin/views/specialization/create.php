<?php
$this->breadcrumbs=array(
	'Specializations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Specialization', 'url'=>array('index')),
	array('label'=>'Manage Specialization', 'url'=>array('admin')),
);
?>

<h1>Create Specialization</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>