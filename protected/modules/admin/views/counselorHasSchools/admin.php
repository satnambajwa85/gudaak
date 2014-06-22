<?php
$this->breadcrumbs=array(
	'Counselor Has Schools'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CounselorHasSchools', 'url'=>array('index')),
	array('label'=>'Create CounselorHasSchools', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('counselor-has-schools-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Counselor Has Schools</h1>

<?php echo CHtml::link('Back to Counselor list',array('/admin/Counselor/admin'),array('class'=>'pull-right btn btn-danger ui-slider'));?>
<?php 
if(isset($_REQUEST['counselor_id']))
	echo CHtml::link('Create',array('/admin/counselorHasSchools/create',array('counselor_id'=>$_REQUEST['counselor_id'])),array('class'=>'pull-right btn btn-s-md btn-success mr20'));
else
	echo CHtml::link('Create',array('/admin/counselorHasSchools/create'),array('class'=>'pull-right btn btn-s-md btn-success mr20'));
	?>
    

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'counselor-has-schools-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'counselor_id',
		'schools_id',
		'service_type',
		'add_date',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
