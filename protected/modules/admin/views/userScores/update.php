<?php
$this->breadcrumbs=array(
	'User Scores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserScores', 'url'=>array('index')),
	array('label'=>'Create UserScores', 'url'=>array('create')),
	array('label'=>'View UserScores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserScores', 'url'=>array('admin')),
);
?>

<h1>Update UserScores <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>