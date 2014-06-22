<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'counselor-has-schools-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'counselor_id'); ?>
		<?php echo $form->textField($model,'counselor_id'); ?>
		<?php echo $form->error($model,'counselor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schools_id'); ?>
		<?php 
		$listData = CHtml::listData(Schools::model()->findAll(),'id', 'name');
		echo $form->dropDownList($model,'schools_id',$listData,array('empty'=>'Select one or many','multiple'=>true,'size'=>'5'));?>
		<?php echo $form->error($model,'schools_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->