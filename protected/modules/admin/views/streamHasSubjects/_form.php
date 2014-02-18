<?php
/* @var $this StreamHasSubjectsController */
/* @var $model StreamHasSubjects */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stream-has-subjects-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'stream_id'); ?>
			<?php echo $form->dropDownlist($model,'stream_id',CHtml::listData(Stream::model()->findAll(),'id','name'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'stream_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subjects_id'); ?>
		<?php echo $form->dropDownlist($model,'subjects_id',CHtml::listData(Subjects::model()->findAll(),'id','title'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'subjects_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_subjects'); ?>
		<?php echo $form->textField($model,'type_subjects',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'type_subjects'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->