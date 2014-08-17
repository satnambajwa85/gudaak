<?php
/* @var $this ProjectsFeaturesAndEstimationsController */
/* @var $model ProjectsFeaturesAndEstimations */

$this->breadcrumbs=array(
	'Projects Features And Estimations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProjectsFeaturesAndEstimations', 'url'=>array('index')),
	array('label'=>'Create ProjectsFeaturesAndEstimations', 'url'=>array('create')),
	array('label'=>'Update ProjectsFeaturesAndEstimations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectsFeaturesAndEstimations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectsFeaturesAndEstimations', 'url'=>array('admin')),
);
?>

<h1>View ProjectsFeaturesAndEstimations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_projects_id',
		'features_id',
	),
)); ?>
