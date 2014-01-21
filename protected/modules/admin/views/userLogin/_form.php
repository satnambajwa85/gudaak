<?php
/* @var $this UserLoginController */
/* @var $model UserLogin */
/* @var $form CActiveForm */
?>

<div class="span4 form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_role_id'); ?>
		<?php echo $form->dropDownlist($model,'user_role_id',CHtml::listData(UserRole::model()->findAll(),'id','title'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'user_role_id'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	

	<div class="form-group">
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

	<div class="form-group">
		<?php echo $form->labelEx($model,'last_login'); ?>
		<?php	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'model'=>$model,
									'attribute'=>'last_login',
									'options'=>array('dateFormat'=>'yy-mm-dd','minDate'=>0),
									'htmlOptions'=>array('class'=>'form-control'),
									'value'=>date('Y-m-d', strtotime('+2 day', strtotime(date('Y-m-d')))),
									));?>
		<?php echo $form->error($model,'last_login'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'login_status'); ?>
		<?php echo $form->radioButtonlist($model,'login_status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'login_status'); ?>
	</div>

	<div class="clear">
		<?php echo $form->labelEx($model,'block'); ?>
		<?php echo $form->radioButtonlist($model,'block',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'block'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->