<?php
$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tickets', 'url'=>array('index')),
	array('label'=>'Create Tickets', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tickets-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tickets</h1>


<?php 
if(isset($_REQUEST['role']) && $_REQUEST['role']=='user')
	echo CHtml::link('Back to List',array('/admin/userProfiles/admin'),array('class'=>'pull-right btn btn-s-md btn-success mr20'));
	
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tickets-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'sender_id',
		'receiver_id',
		'title',
		'problem',
		'language',
		'solution',
		'status',
		'add_date',
		'modification_date',
		
		//'mode',
		/*
		'available',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
