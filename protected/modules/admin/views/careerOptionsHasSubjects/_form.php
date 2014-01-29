<?php
/* @var $this CareerOptionsHasSubjectsController */
/* @var $model CareerOptionsHasSubjects */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'career-options-has-subjects-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'career_options_id'); ?>
		<?php echo $form->dropDownlist($model,'career_options_id',CHtml::listData(CareerOptions::model()->findAll(),'id','title'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'career_options_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subjects_id'); ?>
		<?php echo $form->dropDownlist($model,'subjects_id',CHtml::listData(Subjects::model()->findAll(),'id','title'),array('class'=>'form-control', 'multiple' => 'multiple')); ?>
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->