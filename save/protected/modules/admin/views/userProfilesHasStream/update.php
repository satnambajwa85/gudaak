<?php
/* @var $this UserProfilesHasStreamController */
/* @var $model UserProfilesHasStream */

$this->breadcrumbs=array(
	'User Profiles Has Streams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserProfilesHasStream', 'url'=>array('index')),
	array('label'=>'Create UserProfilesHasStream', 'url'=>array('create')),
	array('label'=>'View UserProfilesHasStream', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserProfilesHasStream', 'url'=>array('admin')),
);
?>

<h1>Update UserProfilesHasStream <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>