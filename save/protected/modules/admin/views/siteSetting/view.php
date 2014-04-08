<?php
/* @var $this SiteSettingController */
/* @var $model SiteSetting */

$this->breadcrumbs=array(
	'Site Settings'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SiteSetting', 'url'=>array('index')),
	array('label'=>'Create SiteSetting', 'url'=>array('create')),
	array('label'=>'Update SiteSetting', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SiteSetting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SiteSetting', 'url'=>array('admin')),
);
?>

<h1>View SiteSetting #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'email',
		'fax',
		'currency',
		'web_site',
		'phone_no',
		'mobile_no',
		'fb_link',
		'twittwe_link',
		'linkedin_link',
		'youtube_link',
		'logo',
		'add_date',
		'site_alais',
		'published',
		'status',
		'site_meta',
	),
)); ?>
