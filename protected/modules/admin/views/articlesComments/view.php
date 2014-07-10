<?php
/* @var $this ArticlesCommentsController */
/* @var $model ArticlesComments */

$this->breadcrumbs=array(
	'Articles Comments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ArticlesComments', 'url'=>array('index')),
	array('label'=>'Create ArticlesComments', 'url'=>array('create')),
	array('label'=>'Update ArticlesComments', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArticlesComments', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArticlesComments', 'url'=>array('admin')),
);
?>

<h1>View ArticlesComments #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'comment',
		'other',
		'articles_id',
		'add_date',
		'status',
	),
)); ?>
