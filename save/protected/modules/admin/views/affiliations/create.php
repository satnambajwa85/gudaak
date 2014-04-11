<?php
/* @var $this AffiliationsController */
/* @var $model Affiliations */

$this->breadcrumbs=array(
	'Affiliations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Affiliations', 'url'=>array('index')),
	array('label'=>'Manage Affiliations', 'url'=>array('admin')),
);
?>

<h1>Create Affiliations</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>