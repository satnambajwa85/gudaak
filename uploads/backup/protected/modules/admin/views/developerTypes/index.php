<?php
/* @var $this DeveloperTypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Developer Types',
);

$this->menu=array(
	array('label'=>'Create DeveloperTypes', 'url'=>array('create')),
	array('label'=>'Manage DeveloperTypes', 'url'=>array('admin')),
);
?>

<h1>Developer Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
