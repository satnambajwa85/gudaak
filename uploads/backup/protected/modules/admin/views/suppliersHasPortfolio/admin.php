<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $model SuppliersHasPortfolio */

$this->breadcrumbs=array(
	'Suppliers Has Portfolios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolio', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolio', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-has-portfolio-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Has Portfolios</h1>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php  $this->Widget('WidgetPageSize'); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-has-portfolio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'supName',
			'type'=>'raw',
			'value'=>'CHtml::link($data->suppliers->name,array("suppliers/view","id"=>$data->suppliers_id))',
		),
		'client_name',
		'project_name',
			array(
			'name'=>'project_link',
			'type'=>'raw',
			'value'=>'CHtml::link($data->project_link,"http://".$data->project_link)',
		),
		//'project_link',
		array(
			'name'=>'industry_id',
			'type'=>'raw',
			'value'=>' $data->industry->name',
		),
		 'estimate_price',
		/*
		'description',
		'cover',
		'year_done',
		'service_id',
		
		'estimate_timelines',
		'languages_used',
		'add_date',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
