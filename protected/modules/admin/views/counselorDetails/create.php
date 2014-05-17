<?php
$this->breadcrumbs=array(
	'Counselor Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CounselorDetails', 'url'=>array('index')),
	array('label'=>'Manage CounselorDetails', 'url'=>array('admin')),
);
?>

<h1>Create CounselorDetails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>