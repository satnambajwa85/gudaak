<?php
$this->breadcrumbs=array(
	'User Has Session Ans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserHasSessionAns', 'url'=>array('index')),
	array('label'=>'Create UserHasSessionAns', 'url'=>array('create')),
	array('label'=>'View UserHasSessionAns', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserHasSessionAns', 'url'=>array('admin')),
);
?>

<h1>Update UserHasSessionAns <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>