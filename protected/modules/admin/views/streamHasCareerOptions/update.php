<?php
/* @var $this StreamHasCareerOptionsController */
/* @var $model StreamHasCareerOptions */

$this->breadcrumbs=array(
	'Stream Has Career Options'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StreamHasCareerOptions', 'url'=>array('index')),
	array('label'=>'Create StreamHasCareerOptions', 'url'=>array('create')),
	array('label'=>'View StreamHasCareerOptions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StreamHasCareerOptions', 'url'=>array('admin')),
);
?>

<h1>Update StreamHasCareerOptions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>