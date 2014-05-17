<?php
$this->breadcrumbs=array(
	'Counselor Details'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CounselorDetails', 'url'=>array('index')),
	array('label'=>'Create CounselorDetails', 'url'=>array('create')),
	array('label'=>'Update CounselorDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CounselorDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CounselorDetails', 'url'=>array('admin')),
);
?>

<h1>View CounselorDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'add_date',
		'status',
		'counselling_id',
	),
)); ?>
