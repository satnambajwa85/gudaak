<?php
$this->breadcrumbs=array(
	'Counselors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Counselor', 'url'=>array('index')),
	array('label'=>'Create Counselor', 'url'=>array('create')),
	array('label'=>'Update Counselor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Counselor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Counselor', 'url'=>array('admin')),
);
?>

<h1>View Counselor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'image',
		'date_of_birth',
		'gender',
		'address',
		'postcode',
		'email',
		'work_email',
		'alternative_email',
		'official_email',
		'work_phone_no',
		'mobile_no',
		'contact_no',
		'alternative_mobile_no',
		'official_contact_no',
		'fax',
		'shot_description',
		'description',
		'about',
		'other_details',
		'resume',
		'activation',
		'status',
		'user_login_id',
	),
)); ?>
