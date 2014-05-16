<?php
$this->breadcrumbs=array(
	'Session Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SessionQuestions', 'url'=>array('index')),
	array('label'=>'Manage SessionQuestions', 'url'=>array('admin')),
);
?>

<h1>Create SessionQuestions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>