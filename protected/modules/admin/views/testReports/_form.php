<?php
/* @var $this TestReportsController */
/* @var $model TestReports */
/* @var $form CActiveForm */
?>

<div class="col-sm-6 form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-reports-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_profiles_id'); ?>
		<?php echo $form->dropDownlist($model,'user_profiles_id',CHtml::listData(UserProfiles::model()->findAll(),'id','email'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'user_profiles_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'questions_id'); ?>
		<?php echo $form->dropDownlist($model,'questions_id',CHtml::listData(Questions::model()->findAll(),'id','title'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'questions_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'question_options_id'); ?>
		<?php echo $form->dropDownlist($model,'question_options_id',CHtml::listData(QuestionOptions::model()->findAll(),'id','name'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'question_options_id'); ?>
	</div>

	 

	<div class="form-group">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'activation'); ?>
		<?php echo $form->radioButtonlist($model,'activation',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'activation'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-s-md btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->