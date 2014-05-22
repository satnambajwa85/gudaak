<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'counselor-has-schools-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'counselor_id'); ?>
		<?php echo $form->textField($model,'counselor_id'); ?>
		<?php echo $form->error($model,'counselor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schools_id'); ?>
		<?php echo $form->textField($model,'schools_id'); ?>
		<?php echo $form->error($model,'schools_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type'); ?>
		<?php echo $form->error($model,'service_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
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