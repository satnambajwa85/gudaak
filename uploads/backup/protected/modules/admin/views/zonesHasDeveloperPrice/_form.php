<?php
/* @var $this ZonesHasDeveloperPriceController */
/* @var $model ZonesHasDeveloperPrice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zones-has-developer-price-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'zones_id'); ?>
		<?php 
			    $list_data	=	array();
				$lists	    =	Zones::model()->findAll();
				foreach($lists as $list)
				{
	         		$list_data[]	=	$list;
				}
				$listData = CHtml::listData($list_data,'id','name');
				echo $form->dropDownList($model,'zones_id',$listData,array('empty'=>'Select a Zone'));
		 ?>
		<?php echo $form->error($model,'zones_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'developer_types_id'); ?>
		<?php 
			    $list_data	=	array();
				$lists	    =	developerTypes::model()->findAll();
				foreach($lists as $list)
				{
	         		$list_data[]	=	$list;
				}
				$listData = CHtml::listData($list_data,'id','name');
				echo $form->dropDownList($model,'developer_types_id',$listData,array('empty'=>'Select a Developer Type'));
		 ?>
		<?php echo $form->error($model,'developer_types_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_price'); ?>
		<?php echo $form->textField($model,'min_price',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'min_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_price'); ?>
		<?php echo $form->textField($model,'max_price',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'max_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonList($model,'status',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  '));?>	
		<?php echo $form->error($model,'status'); ?>
	</div>

	<!-- <div class="row">
		<?php //echo $form->labelEx($model,'add_date'); ?>
		<?php //echo $form->textField($model,'add_date'); ?>
		<?php //echo $form->error($model,'add_date'); ?>
	</div>  -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->