<?php
$this->breadcrumbs=array(
	'User Session Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserSessionQuestions', 'url'=>array('index')),
	array('label'=>'Manage UserSessionQuestions', 'url'=>array('admin')),
);
?>

<h1>Create UserSessionQuestions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>