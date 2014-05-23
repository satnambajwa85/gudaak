<?php
$this->breadcrumbs=array(
	'User Session Questions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserSessionQuestions', 'url'=>array('index')),
	array('label'=>'Create UserSessionQuestions', 'url'=>array('create')),
	array('label'=>'View UserSessionQuestions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserSessionQuestions', 'url'=>array('admin')),
);
?>

<h1>Update UserSessionQuestions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>