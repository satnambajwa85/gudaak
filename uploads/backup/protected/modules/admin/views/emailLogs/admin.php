<?php
/* @var $this EmailLogsController */
/* @var $model EmailLogs */

$this->breadcrumbs=array(
	'Email Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EmailLogs', 'url'=>array('index')),
	array('label'=>'Create EmailLogs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#email-logs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Email Logs</h1>
 


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php  $this->Widget('WidgetPageSize'); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'email-logs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'reciver',
		'user_id',
		'templete',
		'esubject',
		'time',
		//'body',
		/*
		
		'status',
		'other_info',
		*/
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
