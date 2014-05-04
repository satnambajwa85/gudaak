<?php
$this->breadcrumbs=array(
	'User Subjects Ratings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserSubjectsRating', 'url'=>array('index')),
	array('label'=>'Create UserSubjectsRating', 'url'=>array('create')),
	array('label'=>'View UserSubjectsRating', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserSubjectsRating', 'url'=>array('admin')),
);
?>

<h1>Update UserSubjectsRating <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>