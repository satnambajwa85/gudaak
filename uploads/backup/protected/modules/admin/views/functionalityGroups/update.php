<?php
/* @var $this FunctionalityGroupsController */
/* @var $model FunctionalityGroups */

$this->breadcrumbs=array(
	'Functionality Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FunctionalityGroups', 'url'=>array('index')),
	array('label'=>'Create FunctionalityGroups', 'url'=>array('create')),
	array('label'=>'View FunctionalityGroups', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FunctionalityGroups', 'url'=>array('admin')),
);
?>

<h1>Update FunctionalityGroups <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>