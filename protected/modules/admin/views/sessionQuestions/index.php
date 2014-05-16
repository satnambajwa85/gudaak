<?php
$this->breadcrumbs=array(
	'Session Questions',
);

$this->menu=array(
	array('label'=>'Create SessionQuestions', 'url'=>array('create')),
	array('label'=>'Manage SessionQuestions', 'url'=>array('admin')),
);
?>

<h1>Session Questions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
