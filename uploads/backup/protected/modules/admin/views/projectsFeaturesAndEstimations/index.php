<?php
/* @var $this ProjectsFeaturesAndEstimationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projects Features And Estimations',
);

$this->menu=array(
	array('label'=>'Create ProjectsFeaturesAndEstimations', 'url'=>array('create')),
	array('label'=>'Manage ProjectsFeaturesAndEstimations', 'url'=>array('admin')),
);
?>

<h1>Projects Features And Estimations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
