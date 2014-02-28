<?php
/* @var $this GenerateGudaakIdsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Generate Gudaak Ids',
);

$this->menu=array(
	array('label'=>'Create GenerateGudaakIds', 'url'=>array('create')),
	array('label'=>'Manage GenerateGudaakIds', 'url'=>array('admin')),
);
?>

<h1>Generate Gudaak Ids</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
