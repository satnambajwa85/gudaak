<?php
/* @var $this ErrorLogsController */
/* @var $model ErrorLogs */

$this->breadcrumbs=array(
	'Error Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ErrorLogs', 'url'=>array('index')),
	array('label'=>'Create ErrorLogs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#error-logs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Error Logs</h1>

 <?php  $this->Widget('WidgetPageSize'); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'error-logs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'user_type',
		//'user_id',
		array(
			'type'=>'raw',
			'name'=>'user_id',
			'value'=>'($data->user_id==000)?$data->user_id:CHtml::link($data->user_id,array("/admin/users/view","id"=>$data->user_id),array("target"=>"_blank"))',
			'header'=>'UserID',
		),
		'user_name',
		'error_code',
		'message',
		'request_url',
		//'query_string',
			array(
				'name'=>'file_name',
			 	'value'=>'substr($data->file_name,15,strlen($data->file_name))',
			 ),
		'line_number',
		//'error_type',
		'time',
		//'reference_url',
		//'ipaddress',
		//'browser',
		array(
			'class'=>'CButtonColumn',
							'buttons'=>array(
	'delete'=>array(
					'visible'=>'false',
					),
                    'view'=>array(
						'visible'=>'true',
					),	
					'update'=>array(
							'visible'=>'false',
					),
				),
		),
	),
)); ?>
