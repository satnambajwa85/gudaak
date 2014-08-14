<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */

$this->breadcrumbs=array(
	'Client Projects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjects', 'url'=>array('index')),
	array('label'=>'Manage ClientProjects', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjects</h1>

<?php $this->renderPartial('_form',array('project'=>$project,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$list,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills)); //$this->renderPartial('_form', array('model'=>$model)); ?>