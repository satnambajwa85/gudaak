<?php
/* @var $this SiteSettingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Site Settings',
);

$this->menu=array(
	array('label'=>'Create SiteSetting', 'url'=>array('create')),
	array('label'=>'Manage SiteSetting', 'url'=>array('admin')),
);
?>

<h1>Site Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
