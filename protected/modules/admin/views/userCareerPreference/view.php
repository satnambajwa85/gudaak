<?php
$this->breadcrumbs=array(
	'User Career Preferences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserCareerPreference', 'url'=>array('index')),
	array('label'=>'Create UserCareerPreference', 'url'=>array('create')),
	array('label'=>'Update UserCareerPreference', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserCareerPreference', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserCareerPreference', 'url'=>array('admin')),
);
?>

<h1>View UserCareerPreference #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'add_date',
		'reccomended',
		'self',
		'default',
		'status',
		'modified_date',
		'updated_by',
		'comments',
		'user_profiles_id',
		'counsellor_id',
		'career_options_id',
	),
)); ?>
