<?php
/* @var $this DeveloperTypesController */
/* @var $model DeveloperTypes */

$this->breadcrumbs=array(
	'Developer Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DeveloperTypes', 'url'=>array('index')),
	array('label'=>'Create DeveloperTypes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#developer-types-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Developer Types</h1>
<?php  $this->Widget('WidgetPageSize'); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'developer-types-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
