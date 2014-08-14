<?php
/* @var $this ServicesController */
/* @var $model Services */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'services-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>245)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'tooltip'); ?>
		<?php echo $form->textField($model,'tooltip',array('size'=>60,'maxlength'=>245)); ?>
		<?php echo $form->error($model,'tooltip'); ?>
	</div>
    
    
   <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php  echo $form->radioButtonList($model,'status',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ')) ;?>	
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
        <?php echo $form->radioButtonList($model,'category',array('SD'=>'SD','ITS'=>'ITS','OS'=>'OS'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  '));?>	
		<?php echo $form->error($model,'category'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->