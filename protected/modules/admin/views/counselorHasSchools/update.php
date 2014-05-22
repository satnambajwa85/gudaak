<?php
$this->breadcrumbs=array(
	'Counselor Has Schools'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CounselorHasSchools', 'url'=>array('index')),
	array('label'=>'Create CounselorHasSchools', 'url'=>array('create')),
	array('label'=>'View CounselorHasSchools', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CounselorHasSchools', 'url'=>array('admin')),
);
?>

<h1>Update CounselorHasSchools <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>