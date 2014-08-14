<?php
/* @var $this CurrentStatusController */
/* @var $model CurrentStatus */

$this->breadcrumbs=array(
	'Current Statuses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CurrentStatus', 'url'=>array('index')),
	array('label'=>'Create CurrentStatus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#current-status-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Current Statuses</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'current-status-grid',
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
