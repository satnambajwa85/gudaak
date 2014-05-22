<?php
$this->breadcrumbs=array(
	'Counselor Has Schools'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CounselorHasSchools', 'url'=>array('index')),
	array('label'=>'Create CounselorHasSchools', 'url'=>array('create')),
	array('label'=>'Update CounselorHasSchools', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CounselorHasSchools', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CounselorHasSchools', 'url'=>array('admin')),
);
?>

<h1>View CounselorHasSchools #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'counselor_id',
		'schools_id',
		'service_type',
		'add_date',
		'status',
	),
)); ?>
