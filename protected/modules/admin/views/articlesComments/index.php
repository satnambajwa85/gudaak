<?php
/* @var $this ArticlesCommentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Articles Comments',
);

$this->menu=array(
	array('label'=>'Create ArticlesComments', 'url'=>array('create')),
	array('label'=>'Manage ArticlesComments', 'url'=>array('admin')),
);
?>

<h1>Articles Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
