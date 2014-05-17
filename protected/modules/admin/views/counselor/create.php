<?php
$this->breadcrumbs=array(
	'Counselors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Counselor', 'url'=>array('index')),
	array('label'=>'Manage Counselor', 'url'=>array('admin')),
);
?>

<h1>Create Counselor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>