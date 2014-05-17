<?php
$this->breadcrumbs=array(
	'Counselors',
);

$this->menu=array(
	array('label'=>'Create Counselor', 'url'=>array('create')),
	array('label'=>'Manage Counselor', 'url'=>array('admin')),
);
?>

<h1>Counselors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
