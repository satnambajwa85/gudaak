<?php
/* @var $this SiteSettingController */
/* @var $model SiteSetting */

$this->breadcrumbs=array(
	'Site Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SiteSetting', 'url'=>array('index')),
	array('label'=>'Manage SiteSetting', 'url'=>array('admin')),
);
?>

<h1>Create SiteSetting</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>