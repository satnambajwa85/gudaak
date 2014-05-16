<?php
$this->breadcrumbs=array(
	'User Has Session Ans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserHasSessionAns', 'url'=>array('index')),
	array('label'=>'Manage UserHasSessionAns', 'url'=>array('admin')),
);
?>

<h1>Create UserHasSessionAns</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>