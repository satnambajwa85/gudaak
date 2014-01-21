<?php
/* @var $this AffiliationsController */
/* @var $model Affiliations */

$this->breadcrumbs=array(
	'Affiliations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Affiliations', 'url'=>array('index')),
	array('label'=>'Create Affiliations', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#affiliations-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Affiliations</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/affiliations/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'affiliations-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'logo',
		'status',
		'activation',
		/*
		'add_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
