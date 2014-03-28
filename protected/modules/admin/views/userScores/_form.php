<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-scores-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'score'); ?>
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
		<?php echo $form->labelEx($model,'career_categories_id'); ?>
		<?php echo $form->textField($model,'career_categories_id'); ?>
		<?php echo $form->error($model,'career_categories_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_profiles_id'); ?>
		<?php echo $form->textField($model,'user_profiles_id'); ?>
		<?php echo $form->error($model,'user_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'test_category'); ?>
		<?php echo $form->textField($model,'test_category'); ?>
		<?php echo $form->error($model,'test_category'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->