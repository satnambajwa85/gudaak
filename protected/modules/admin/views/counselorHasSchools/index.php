<?php
$this->breadcrumbs=array(
	'Counselor Has Schools',
);

$this->menu=array(
	array('label'=>'Create CounselorHasSchools', 'url'=>array('create')),
	array('label'=>'Manage CounselorHasSchools', 'url'=>array('admin')),
);
?>

<h1>Counselor Has Schools</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
