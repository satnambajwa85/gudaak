<?php
/* @var $this SchoolsController */
/* @var $model Schools */

$this->breadcrumbs=array(
	'Schools'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Schools', 'url'=>array('index')),
	array('label'=>'Create Schools', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#schools-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Schools</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/schools/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schools-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		//'description',
		'display_name',
		'email',
		'mobile_no',
		/*
		'fax',
		'address',
		'address2',
		'postcode',
		'activation',
		'telephone_no',
		'images',
		'website',
		'modification_date',
		'add_date',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
