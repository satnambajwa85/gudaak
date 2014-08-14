<?php
/* @var $this ProjectUniqueFeaturesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Project Unique Features',
);

$this->menu=array(
	array('label'=>'Create ProjectUniqueFeatures', 'url'=>array('create')),
	array('label'=>'Manage ProjectUniqueFeatures', 'url'=>array('admin')),
);
?>

<h1>Project Unique Features</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
