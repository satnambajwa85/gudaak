<?php
$this->breadcrumbs=array(
	'User Profiles Has Streams',
);

$this->menu=array(
	array('label'=>'Create UserProfilesHasStream', 'url'=>array('create')),
	array('label'=>'Manage UserProfilesHasStream', 'url'=>array('admin')),
);
?>

<h1>User Profiles Has Streams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
