<?php
/* @var $this TestReportsController */
/* @var $model TestReports */

$this->breadcrumbs=array(
	'Test Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TestReports', 'url'=>array('index')),
	array('label'=>'Create TestReports', 'url'=>array('create')),
	array('label'=>'View TestReports', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TestReports', 'url'=>array('admin')),
);
?>

<h1>Update TestReports <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>