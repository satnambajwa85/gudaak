<?php
/* @var $this UserProfilesHasStreamController */
/* @var $model UserProfilesHasStream */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-profiles-has-stream-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_profiles_id'); ?>
		<?php echo $form->dropDownlist($model,'user_profiles_id',CHtml::listData(userProfiles::model()->findAll(),'id','display_name'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'user_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stream_id'); ?>
		<?php echo $form->dropDownlist($model,'stream_id',CHtml::listData(Stream::model()->findAll(),'id','name'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'stream_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
			<?php	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'model'=>$model,
									'attribute'=>'add_date',
									'options'=>array('dateFormat'=>'yy-mm-dd','minDate'=>0),
									'htmlOptions'=>array('class'=>'form-control'),
									'value'=>date('Y-m-d', strtotime('+2 day', strtotime(date('Y-m-d')))),
									));?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reccomended'); ?>
		<?php echo $form->radioButtonlist($model,'reccomended',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'reccomended'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'self'); ?>
		<?php echo $form->radioButtonlist($model,'self',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'self'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default'); ?>
	<?php echo $form->radioButtonlist($model,'default',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'default'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
	<?php echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

 

	<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
		<?php echo $form->error($model,'updated_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->