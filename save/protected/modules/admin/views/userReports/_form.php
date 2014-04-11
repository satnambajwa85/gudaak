<?php
/* @var $this UserReportsController */
/* @var $model UserReports */
/* @var $form CActiveForm */
?>

<div class="col-sm-6 form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-reports-form',
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
		<?php echo $form->dropDownlist($model,'user_profiles_id',CHtml::listData(UserProfiles::model()->findAll(),'id','email'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'user_profiles_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'orient_items_id'); ?>
		<?php echo $form->textField($model,'orient_items_id'); ?>
		<?php echo $form->error($model,'orient_items_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'score'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'interest'); ?>
		<?php echo $form->textField($model,'interest',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'interest'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'model'=>$model,
									'attribute'=>'add_date',
									'options'=>array('dateFormat'=>'yy-mm-dd',
													'changeMonth'=>'true',
													'changeYear'=>'true',
									),
									));?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'activation'); ?>
		<?php echo $form->radioButtonlist($model,'activation',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'activation'); ?>
	</div>

	

	
	<div class="form-group buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-s-md btn-success')); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->