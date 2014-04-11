<?php
$this->breadcrumbs=array(
	'User Scores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserScores', 'url'=>array('index')),
	array('label'=>'Manage UserScores', 'url'=>array('admin')),
);
?>

<h1>Create UserScores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>