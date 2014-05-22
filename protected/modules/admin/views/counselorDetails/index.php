<?php
$this->breadcrumbs=array(
	'Counselor Details',
);

$this->menu=array(
	array('label'=>'Create CounselorDetails', 'url'=>array('create')),
	array('label'=>'Manage CounselorDetails', 'url'=>array('admin')),
);
?>

<h1>Counselor Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
