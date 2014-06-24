<?php
/* @var $this UserProfilesController */
/* @var $model UserProfiles */

$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserProfiles', 'url'=>array('index')),
	array('label'=>'Create UserProfiles', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-profiles-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Profiles</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/userProfiles/create'),array('class'=>'pull-right btn btn-s-md btn-success')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-profiles-grid',
	'itemsCssClass'=>'table table-bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'display_name',
		'first_name',
		'last_name',
		array(
			'type'=>'raw',
			'name'=>'user_name',
            'value'=>'$data->userLogin->username',
        ),		
		array(
			'type'=>'raw',
			'name'=>'class',
            'value'=>'($data->user_class_id!=0)?$data->userClass->title:"NA"',
			'filter'=>CHtml::dropDownList('UserProfiles[user_class_id]','$this->user_class_id',
                array(
					''=>'Select Class',
                    '0'=>'NA',
					'1'=>'8th',
                    '2'=>'9th',
                    '3'=>'10th',
					'4'=>'11th',
					'5'=>'12th',
                )
            ),
        ),
		//'add_date',
		array(
			'type'=>'raw',
			'name'=>'schools_name',
            'value'=>'(isset($data->generateGudaakIds->schools->name))?$data->generateGudaakIds->schools->name:"NA"',
        ),
		array(
			'type'=>'raw',
			'name'=>'last_login',
            'value'=>'$data->userLogin->last_login',
        ),
		/*
		'gudaak_id',
		'email',
		'gender',
		'date_of_birth',
		'image',
		'mobile_no',
		'address',
		'postcode',
		'user_info',
		'semd_mail',
		'status',
		'user_login_id',
		'cities_id',*/
		array(
			'type'=>'raw',
			'name'=>'ticket',
            'value'=>'CHtml::link("ticket",array("/admin/tickets/admin","sender_id"=>$data->id,"role"=>"user"))',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
