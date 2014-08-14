<?php
/* @var $this ZonesHasDeveloperPriceController */
/* @var $model ZonesHasDeveloperPrice */

$this->breadcrumbs=array(
	'Zones Has Developer Prices'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ZonesHasDeveloperPrice', 'url'=>array('index')),
	array('label'=>'Create ZonesHasDeveloperPrice', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#zones-has-developer-price-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Zones Has Developer Prices</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zones-has-developer-price-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'id',
		'zones_id',
		'developer_types_id',
		'min_price',
		'max_price',
		'status',
		/*
		'add_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
