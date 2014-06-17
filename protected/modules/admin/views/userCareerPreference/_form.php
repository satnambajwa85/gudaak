<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-career-preference-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reccomended'); ?>
		<?php echo $form->textField($model,'reccomended'); ?>
		<?php echo $form->error($model,'reccomended'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'self'); ?>
		<?php echo $form->textField($model,'self'); ?>
		<?php echo $form->error($model,'self'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default'); ?>
		<?php echo $form->textField($model,'default'); ?>
		<?php echo $form->error($model,'default'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
		<?php echo $form->error($model,'modified_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
		<?php echo $form->error($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_profiles_id'); ?>
		<?php echo $form->textField($model,'user_profiles_id'); ?>
		<?php echo $form->error($model,'user_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'counsellor_id'); ?>
		<?php echo $form->textField($model,'counsellor_id'); ?>
		<?php echo $form->error($model,'counsellor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'career_options_id'); ?>
		<?php echo $form->textField($model,'career_options_id'); ?>
		<?php echo $form->error($model,'career_options_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->