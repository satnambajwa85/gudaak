<?php
/* @var $this CareerController */
/* @var $model Career */

$this->breadcrumbs=array('Careers'=>array('adminView','id'=>$_REQUEST['id']),'Create',);
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
));
$this->menu=array(
	array('label'=>'List Career', 'url'=>array('index')),
	array('label'=>'Manage Career', 'url'=>array('admin')),
);


?>

<h1>Create Career</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'streams'=>$streams)); ?>