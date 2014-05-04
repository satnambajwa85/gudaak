<?php
$this->breadcrumbs=array(
	'Career Assessments'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CareerAssessment', 'url'=>array('index')),
	array('label'=>'Create CareerAssessment', 'url'=>array('create')),
	array('label'=>'Update CareerAssessment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CareerAssessment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CareerAssessment', 'url'=>array('admin')),
);
?>

<h1>View CareerAssessment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'score_start',
		'title',
		'image',
		'description',
		'descr',
		'add_date',
		'published',
		'status',
		'value',
		'score_end',
		'career_categories_id',
	),
)); ?>
