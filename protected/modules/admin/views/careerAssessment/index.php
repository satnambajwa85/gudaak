<?php
$this->breadcrumbs=array(
	'Career Assessments',
);

$this->menu=array(
	array('label'=>'Create CareerAssessment', 'url'=>array('create')),
	array('label'=>'Manage CareerAssessment', 'url'=>array('admin')),
);
?>

<h1>Career Assessments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
