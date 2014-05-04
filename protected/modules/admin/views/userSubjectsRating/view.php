<?php
$this->breadcrumbs=array(
	'User Subjects Ratings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserSubjectsRating', 'url'=>array('index')),
	array('label'=>'Create UserSubjectsRating', 'url'=>array('create')),
	array('label'=>'Update UserSubjectsRating', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserSubjectsRating', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserSubjectsRating', 'url'=>array('admin')),
);
?>

<h1>View UserSubjectsRating #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rating',
		'add_date',
		'published',
		'status',
		'user_profiles_id',
		'subjects_id',
	),
)); ?>
