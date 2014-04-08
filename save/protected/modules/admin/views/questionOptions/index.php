<?php
/* @var $this QuestionOptionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Question Options',
);

$this->menu=array(
	array('label'=>'Create QuestionOptions', 'url'=>array('create')),
	array('label'=>'Manage QuestionOptions', 'url'=>array('admin')),
);
?>

<h1>Question Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
