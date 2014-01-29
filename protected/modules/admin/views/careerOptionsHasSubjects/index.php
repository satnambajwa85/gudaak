<?php
/* @var $this CareerOptionsHasSubjectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Career Options Has Subjects',
);

$this->menu=array(
	array('label'=>'Create CareerOptionsHasSubjects', 'url'=>array('create')),
	array('label'=>'Manage CareerOptionsHasSubjects', 'url'=>array('admin')),
);
?>

<h1>Career Options Has Subjects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
