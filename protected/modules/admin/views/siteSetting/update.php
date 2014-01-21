<?php
/* @var $this SiteSettingController */
/* @var $model SiteSetting */

$this->breadcrumbs=array(
	'Site Settings'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SiteSetting', 'url'=>array('index')),
	array('label'=>'Create SiteSetting', 'url'=>array('create')),
	array('label'=>'View SiteSetting', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SiteSetting', 'url'=>array('admin')),
);
?>

<h1>Update SiteSetting <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>