<?php
/* @var $this AffiliationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Affiliations',
);

$this->menu=array(
	array('label'=>'Create Affiliations', 'url'=>array('create')),
	array('label'=>'Manage Affiliations', 'url'=>array('admin')),
);
?>

<h1>Affiliations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
