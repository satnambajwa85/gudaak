<?php
/* @var $this StatesController */
/* @var $model States */

$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List States', 'url'=>array('index')),
	array('label'=>'Create States', 'url'=>array('create')),
	array('label'=>'View States', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage States', 'url'=>array('admin')),
);
?>

<h1>Update Countries <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>