<?php
$this->breadcrumbs=array(
	'User Career Preferences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserCareerPreference', 'url'=>array('index')),
	array('label'=>'Manage UserCareerPreference', 'url'=>array('admin')),
);
?>

<h1>Create UserCareerPreference</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>