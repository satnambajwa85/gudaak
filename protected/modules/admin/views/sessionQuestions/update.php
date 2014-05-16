<?php
$this->breadcrumbs=array(
	'Session Questions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SessionQuestions', 'url'=>array('index')),
	array('label'=>'Create SessionQuestions', 'url'=>array('create')),
	array('label'=>'View SessionQuestions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SessionQuestions', 'url'=>array('admin')),
);
?>

<h1>Update SessionQuestions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>