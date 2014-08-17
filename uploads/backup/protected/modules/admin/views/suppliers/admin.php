<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers</h1>
<?php  $this->Widget('WidgetPageSize'); ?>
<div class="search-form" style="display:none;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$suppStatus = array(
							'0'=>'Deactivate',
                            '1'=>'Profile Submitted',
							'2'=>'Approved',
							'3'=>'Signed/Verified');

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-grid',
	'dataProvider'=>$model->customSearch(),
	
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
			'type'=>'raw',
			'value'=>'CHtml::link($data->id,array("/admin/suppliers/view","id"=>$data->id))',
		),
     	array(
			'name'=>'users_id',
			'type'=>'raw',
			'value'=>'CHtml::link($data->users_id,array("/admin/users/view","id"=>$data->users_id))',
		),
		'name',
        
        array(
			
			'header'=>'Languages Serving',
			'value'=>'$data->getSkills()',
			'name'=>'langUse',
		),
        array(
			'type'=>'raw',
			'header'=>'Current Services',
			'value'=>'$data->getServices(1)',
			'name'=>'services',
		),
		array(
	
			'header'=>'Tagged Services',
			'value'=>'$data->getServices(0)',
			'name'=>'langTag',
        ),
       
         array(
			'type'=>'raw',
			'header'=>'Hourly Rate',
			'value'=>'$data->min_max()',
			'name'=>'price_tier_id',
					),
         array(
			'type'=>'raw',
			'name'=>'cities_id',
			'header'=>'Location',
			'value'=>'$data->cities->name',
		),
        'pricing_details',       
		array(
			'type'=>'raw',
			'name'=>'status',
			'value'=>'($data->status==0)?"Deactivate":(($data->status==1)?"Profile Submitted ":(($data->status==2)?"Approve":"Signed/Verified") )',
			'filter'=>CHtml::activeDropDownList($model, 'status',$suppStatus,array('empty'=>'Select Status')),
		),
		  'first_name',	
        'last_name',
       /* array(
			'type'=>'raw',
			'header'=>'Full Name',
			'value'=>'$data->first_name." ".$data->last_name',
			'filter'=>CHtml::activeDropDownList($model, 'first_name',
        Chtml::listData(Suppliers::model()->findAll(), 'id', 'first_name'),
        array('empty'=>'Select Supplier')),
		
		),*/
 	//    'first_name',
     	//'last_name',
		//'status',
		/*
		'logo',
		'email',
		'phone_number',
		'tagline',
		'short_description',
		'details',
		'modification_date',
		'skype_id',
		'website',
		'foundation_year',
		'location',
		'about_company',
		'number_of_employee',
		'team_background',
		'rough_estimate',
		'open_source_links',
		'consultation_description',
		'total_available_employees',
		'standard_pitch',
		'standard_service_agreement',
		'accept_new_project_date',
		'Is_available_for_consultancy',
		'consultation_price',
		'response_time',
		'add_date',
		'cities_id',
		*/
		array(
			'class'=>'CButtonColumn',
			'buttons'=>array(
							 
							'delete'=>array(
										'visible'=>'false',
								),
							),
		),
	),
)); ?>
