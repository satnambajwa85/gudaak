<?php
/* @var $this StreamHasCareerOptionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stream Has Career Options',
);

$this->menu=array(
	array('label'=>'Create StreamHasCareerOptions', 'url'=>array('create')),
	array('label'=>'Manage StreamHasCareerOptions', 'url'=>array('admin')),
);
?>

<h1>Stream Has Career Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
