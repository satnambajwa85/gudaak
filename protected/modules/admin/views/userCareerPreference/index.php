<?php
$this->breadcrumbs=array(
	'User Career Preferences',
);

$this->menu=array(
	array('label'=>'Create UserCareerPreference', 'url'=>array('create')),
	array('label'=>'Manage UserCareerPreference', 'url'=>array('admin')),
);
?>

<h1>User Career Preferences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
