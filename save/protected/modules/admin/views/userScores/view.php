<?php
$this->breadcrumbs=array(
	'User Scores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserScores', 'url'=>array('index')),
	array('label'=>'Create UserScores', 'url'=>array('create')),
	array('label'=>'Update UserScores', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserScores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserScores', 'url'=>array('admin')),
);
?>

<h1>View UserScores #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'score',
		'add_date',
		'published',
		'status',
		'career_categories_id',
		'user_profiles_id',
		'test_category',
	),
)); ?>
