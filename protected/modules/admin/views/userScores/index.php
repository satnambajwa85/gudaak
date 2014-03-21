<?php
$this->breadcrumbs=array(
	'User Scores',
);

$this->menu=array(
	array('label'=>'Create UserScores', 'url'=>array('create')),
	array('label'=>'Manage UserScores', 'url'=>array('admin')),
);
?>

<h1>User Scores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
