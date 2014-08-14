<?php
/* @var $this AdminLogsController */
/* @var $model AdminLogs */

$this->breadcrumbs=array(
	'Admin Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AdminLogs', 'url'=>array('index')),
	array('label'=>'Create AdminLogs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#admin-logs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Admin Logs</h1>
<!-- search-form -->

<?php  $this->Widget('WidgetPageSize'); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-logs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		//'username',
		'ipaddress',
		'logtime',
		'controller',
		 'action',
		array(
				'name'=>'details',
			 	'value'=>'substr($data->details,0,60)',
			 ),
		'action_param',
		//'browser',
		//'request_url',
		//'query_string',
		//'refer_url',
		 
		array(
			'class'=>'CButtonColumn',
							'buttons'=>array(
	'delete'=>array(
							'visible'=>'false',
					),
                    	'view'=>array(
							'visible'=>'true',
					),	'update'=>array(
							'visible'=>'false',
					),
				),
		),
	),
)); ?>
