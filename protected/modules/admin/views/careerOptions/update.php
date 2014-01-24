<?php
/* @var $this CareerOptionsController */
/* @var $model CareerOptions */

$this->breadcrumbs=array(
	'Career Options'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CareerOptions', 'url'=>array('index')),
	array('label'=>'Create CareerOptions', 'url'=>array('create')),
	array('label'=>'View CareerOptions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CareerOptions', 'url'=>array('admin')),
);
?>

<h1>Update CareerOptions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>