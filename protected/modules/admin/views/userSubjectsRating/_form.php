<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-subjects-rating-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rating'); ?>
		<?php echo $form->textField($model,'rating',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_profiles_id'); ?>
		<?php echo $form->textField($model,'user_profiles_id'); ?>
		<?php echo $form->error($model,'user_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subjects_id'); ?>
		<?php echo $form->textField($model,'subjects_id'); ?>
		<?php echo $form->error($model,'subjects_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->