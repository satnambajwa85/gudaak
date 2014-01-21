<?php
/* @var $this SiteSettingController */
/* @var $model SiteSetting */

$this->breadcrumbs=array(
	'Site Settings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SiteSetting', 'url'=>array('index')),
	array('label'=>'Create SiteSetting', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#site-setting-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Site Settings</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/siteSetting/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'site-setting-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'email',
		'fax',
		'currency',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
