<?php
/* @var $this ProjectsFeaturesAndEstimationsController */
/* @var $model ProjectsFeaturesAndEstimations */

$this->breadcrumbs=array(
	'Projects Features And Estimations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectsFeaturesAndEstimations', 'url'=>array('index')),
	array('label'=>'Create ProjectsFeaturesAndEstimations', 'url'=>array('create')),
	array('label'=>'View ProjectsFeaturesAndEstimations', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectsFeaturesAndEstimations', 'url'=>array('admin')),
);
?>

<h1>Update ProjectsFeaturesAndEstimations <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>