<?php
$this->breadcrumbs=array(
	'User Subjects Ratings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserSubjectsRating', 'url'=>array('index')),
	array('label'=>'Manage UserSubjectsRating', 'url'=>array('admin')),
);
?>

<h1>Create UserSubjectsRating</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>