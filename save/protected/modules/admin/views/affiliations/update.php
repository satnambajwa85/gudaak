<?php
/* @var $this AffiliationsController */
/* @var $model Affiliations */

$this->breadcrumbs=array(
	'Affiliations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Affiliations', 'url'=>array('index')),
	array('label'=>'Create Affiliations', 'url'=>array('create')),
	array('label'=>'View Affiliations', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Affiliations', 'url'=>array('admin')),
);
?>

<h1>Update Affiliations <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>