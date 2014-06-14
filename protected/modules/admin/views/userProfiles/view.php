<?php
/* @var $this UserProfilesController */
/* @var $model UserProfiles */

$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserProfiles', 'url'=>array('index')),
	array('label'=>'Create UserProfiles', 'url'=>array('create')),
	array('label'=>'Update UserProfiles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserProfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserProfiles', 'url'=>array('admin')),
);
?>

<h1>View UserProfiles #<?php echo $model->id; ?></h1>
<?php echo CHtml::link('Back to User list',array('/admin/userProfiles/admin'),array('class'=>'pull-right btn btn-danger ui-slider'));?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'display_name',
		'first_name',
		'last_name',
		'class',
		 'gudaak_id',
		'email',
		'gender',
		'date_of_birth',
		'image',
		'mobile_no',
		'address',
		'postcode',
		'user_info',
		'add_date',
		'semd_mail',
		'status',
		'user_login_id',
		 
	),
)); ?>
