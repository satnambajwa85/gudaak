<?php
/* @var $this SuppliersProjectsProposalsController */
/* @var $model SuppliersProjectsProposals */

$this->breadcrumbs=array(
	'Suppliers Projects Proposals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersProjectsProposals', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjectsProposals', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-projects-proposals-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Projects Proposals</h1>
<?php  $this->Widget('WidgetPageSize'); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-projects-proposals-grid',
	'dataProvider'=>$model->search(),
 	'filter'=>$model,
	'columns'=>array(
		'id',
		//'suppliers_id',array("target"=>"_blank") 
		array(            
            'name'=>'Supplier Company ',
            'type'=>'raw',
            'value'=>'CHtml::link($data->suppliers->name,array("/admin/suppliers/view","id"=>$data->suppliers_id),array("target"=>"_blank"))',
            //'value'=>'$data->suppliers->name',
             'filter'=>CHtml::activeDropDownList($model, 'suppliers_id',
        CHtml::listData(Suppliers::model()->findAll('status=3'),'id', 'name'),
        array('empty'=>'Select Team')),

			  ),
		//'client_projects_id',
		array(            
            'name'=>'Project',
            'type'=>'raw',
            //'value'=>'$data->clientProjects->name',
            'value'=>'CHtml::link($data->clientProjects->name,array("/admin/clientProjects/view","id"=>$data->client_projects_id),array("target"=>"_blank"))',
			'filter'=>CHtml::activeDropDownList($model, 'client_projects_id',
        Chtml::listData(ClientProjects::model()->findAll("state=2"), 'id', 'name'),
        array('empty'=>'Select Project')),
               ),
		'pitch',
			
		'estimated_cost',
		'time_estimation',
		'note',
		/*
	'status',
		'add_date',
		'comments',
		'others',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
