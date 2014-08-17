<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
	array('label'=>'View Suppliers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<h1>Update Suppliers <?php echo $model->id; ?></h1>
<?php	$list_data	=	array();
		$lists	    =	Users::model()->findAll();
		foreach($lists as $list){
			$list_data[]	=	$list;
		}?>
<?php $this->renderPartial('_form', array('model'=>$model,'list_data'=>$list_data,'supplierTeam'=>$supplierTeam,'supplierTeam1'=>$supplierTeam1,'selecetedServices'=>$selecetedServices,'selecetedIndustries'=>$selecetedIndustries)); ?>
