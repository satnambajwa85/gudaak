<?php
$this->breadcrumbs=array(
	'Counselor Details'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CounselorDetails', 'url'=>array('index')),
	array('label'=>'Create CounselorDetails', 'url'=>array('create')),
	array('label'=>'View CounselorDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CounselorDetails', 'url'=>array('admin')),
);
?>

<h1>Update CounselorDetails <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>