<?php
$this->breadcrumbs=array(
	'User Career Preferences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserCareerPreference', 'url'=>array('index')),
	array('label'=>'Create UserCareerPreference', 'url'=>array('create')),
	array('label'=>'View UserCareerPreference', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserCareerPreference', 'url'=>array('admin')),
);
?>

<h1>Update UserCareerPreference <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>