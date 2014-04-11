<?php
/* @var $this StreamHasSubjectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stream Has Subjects',
);

$this->menu=array(
	array('label'=>'Create StreamHasSubjects', 'url'=>array('create')),
	array('label'=>'Manage StreamHasSubjects', 'url'=>array('admin')),
);
?>

<h1>Stream Has Subjects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
