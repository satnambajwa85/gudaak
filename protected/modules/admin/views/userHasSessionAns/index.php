<?php
$this->breadcrumbs=array(
	'User Has Session Ans',
);

$this->menu=array(
	array('label'=>'Create UserHasSessionAns', 'url'=>array('create')),
	array('label'=>'Manage UserHasSessionAns', 'url'=>array('admin')),
);
?>

<h1>User Has Session Ans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
