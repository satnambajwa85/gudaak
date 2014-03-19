<?php
/* @var $this ImagesController */
/* @var $model Images */

$this->breadcrumbs=array(
	'Images'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Images', 'url'=>array('index')),
	array('label'=>'Create Images', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#images-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Images</h1>
<?php echo CHtml::link('Create',array('/admin/images/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'images-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
        	'name'=>'name',
        	'type'=>'html',
        	'value'=>'CHtml::image("uploads/images/small/$data->name", "", array("width"=>200))',
		),
		array(
        	'name'=>'path',
        	'type'=>'html',
        	'value'=>'"uploads/images/small/$data->name"',
		),
		
		//'path',
		'status',
		'add_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
