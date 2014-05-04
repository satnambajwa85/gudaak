<?php
$this->breadcrumbs=array(
	'User Subjects Ratings',
);

$this->menu=array(
	array('label'=>'Create UserSubjectsRating', 'url'=>array('create')),
	array('label'=>'Manage UserSubjectsRating', 'url'=>array('admin')),
);
?>

<h1>User Subjects Ratings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
