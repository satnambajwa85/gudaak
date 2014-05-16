<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-has-session-ans-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_question_id'); ?>
		<?php echo $form->textField($model,'session_question_id'); ?>
		<?php echo $form->error($model,'session_question_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answers'); ?>
		<?php echo $form->textField($model,'answers',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'answers'); ?>
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