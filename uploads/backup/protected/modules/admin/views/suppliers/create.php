<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<h1>Create Suppliers</h1>
<?php	$list_data	=	array();
		$lists	    =	Users::model()->findAll();
		foreach($lists as $list){
			if(count($list->clientProfiles)==0&&count($list->suppliers)==0)
				$list_data[]	=	$list;
		}?>
<?php $this->renderPartial('_form', array('model'=>$model,'list_data'=>$list_data)); ?>