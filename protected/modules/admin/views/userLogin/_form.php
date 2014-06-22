<?php
/* @var $this UserLoginController */
/* @var $model UserLogin */
/* @var $form CActiveForm */

 
if(isset($_REQUEST['counselor_id']))
	echo CHtml::link("Counselor's School",array('/admin/counselorHasSchools/admin',array('counselor_id'=>$_REQUEST['counselor_id'])),array('class'=>'pull-right btn btn-s-md btn-success mr20'));
else
	echo CHtml::link("Counselor's School",array('/admin/counselorHasSchools/admin'),array('class'=>'pull-right btn btn-s-md btn-success mr20'));?>
    
    
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
		<?php echo $form->dropDownlist($model,'user_role_id',CHtml::listData(UserRole::model()->findAll('status=1'),'id','title'),array('class'=>'form-control')); ?>
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