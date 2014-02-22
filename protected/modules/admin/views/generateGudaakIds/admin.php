<?php
/* @var $this GenerateGudaakIdsController */
/* @var $model GenerateGudaakIds */

$this->breadcrumbs=array(
	'Generate Gudaak Ids'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GenerateGudaakIds', 'url'=>array('index')),
	array('label'=>'Create GenerateGudaakIds', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#generate-gudaak-ids-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Generate Gudaak Ids</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/GenerateGudaakIds/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'generate-gudaak-ids-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'gudaak_id',
		array(
            'name'=>'Cities',
            'value'=>'$data->cities->title'
        ),
		array(
            'name'=>'Schools',
            'value'=>'$data->schools->name'
        ),
		array(
            'name'=>'User Role Id',
            'value'=>'$data->userRole->title'
        ),
		'add_date',
		'activation',
		/*
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
