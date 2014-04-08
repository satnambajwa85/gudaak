<?php
$this->breadcrumbs=array(
	'Entrance Exams',
);

$this->menu=array(
	array('label'=>'Create EntranceExams', 'url'=>array('create')),
	array('label'=>'Manage EntranceExams', 'url'=>array('admin')),
);
?>

<h1>Entrance Exams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
