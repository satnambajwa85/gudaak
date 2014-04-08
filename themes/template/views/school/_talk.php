<?php
/* @var $this TicketsController */
/* @var $model Tickets */
/* @var $form CActiveForm */
?>

<div class="profile_tab1_left">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'tickets-form','enableAjaxValidation'=>false,)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>'big_index form-control')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'problem'); ?>
		<?php echo $form->textArea($model,'problem',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'problem'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save',array('class'=>'mt30 btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->