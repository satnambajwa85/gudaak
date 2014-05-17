<?php
$this->breadcrumbs=array(
	'Category Specializations',
);

$this->menu=array(
	array('label'=>'Create CategorySpecialization', 'url'=>array('create')),
	array('label'=>'Manage CategorySpecialization', 'url'=>array('admin')),
);
?>

<h1>Category Specializations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
