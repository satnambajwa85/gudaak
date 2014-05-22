<?php
$this->breadcrumbs=array(
	'Counselor Has Schools'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CounselorHasSchools', 'url'=>array('index')),
	array('label'=>'Manage CounselorHasSchools', 'url'=>array('admin')),
);
?>

<h1>Create CounselorHasSchools</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>