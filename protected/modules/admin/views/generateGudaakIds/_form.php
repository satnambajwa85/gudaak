<?php
/* @var $this GenerateGudaakIdsController */
/* @var $model GenerateGudaakIds */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'generate-gudaak-ids-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gudaak_id'); ?>
		<?php echo $form->textField($model,'gudaak_id'); ?>
		<?php echo $form->error($model,'gudaak_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cities_id'); ?>
		<?php echo $form->textField($model,'cities_id'); ?>
		<?php echo $form->error($model,'cities_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schools_id'); ?>
		<?php echo $form->textField($model,'schools_id'); ?>
		<?php echo $form->error($model,'schools_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activation'); ?>
		<?php echo $form->textField($model,'activation'); ?>
		<?php echo $form->error($model,'activation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->