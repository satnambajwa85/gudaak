<?php
/* @var $this UserReportsController */
/* @var $model UserReports */

$this->breadcrumbs=array(
	'User Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserReports', 'url'=>array('index')),
	array('label'=>'Create UserReports', 'url'=>array('create')),
	array('label'=>'View UserReports', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserReports', 'url'=>array('admin')),
);
?>

<h1>Update UserReports <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>