<?php
/* @var $this ArticlesCommentsController */
/* @var $model ArticlesComments */

$this->breadcrumbs=array(
	'Articles Comments'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArticlesComments', 'url'=>array('index')),
	array('label'=>'Create ArticlesComments', 'url'=>array('create')),
	array('label'=>'View ArticlesComments', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticlesComments', 'url'=>array('admin')),
);
?>

<h1>Update ArticlesComments <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>