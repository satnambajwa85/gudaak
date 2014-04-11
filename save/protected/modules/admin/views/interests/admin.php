<?php
/* @var $this InterestsController */
/* @var $model Interests */

$this->breadcrumbs=array(
	'Interests'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Interests', 'url'=>array('index')),
	array('label'=>'Create Interests', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#interests-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Interests</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/interests/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'interests-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'add_date',
		'published',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
