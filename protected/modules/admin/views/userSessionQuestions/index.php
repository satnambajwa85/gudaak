<?php
$this->breadcrumbs=array(
	'User Session Questions',
);

$this->menu=array(
	array('label'=>'Create UserSessionQuestions', 'url'=>array('create')),
	array('label'=>'Manage UserSessionQuestions', 'url'=>array('admin')),
);
?>

<h1>User Session Questions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
