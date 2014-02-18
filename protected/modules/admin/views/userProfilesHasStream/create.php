<?php
/* @var $this UserProfilesHasStreamController */
/* @var $model UserProfilesHasStream */

$this->breadcrumbs=array(
	'User Profiles Has Streams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserProfilesHasStream', 'url'=>array('index')),
	array('label'=>'Manage UserProfilesHasStream', 'url'=>array('admin')),
);
?>

<h1>Create UserProfilesHasStream</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>