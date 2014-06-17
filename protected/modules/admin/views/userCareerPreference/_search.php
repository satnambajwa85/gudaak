<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reccomended'); ?>
		<?php echo $form->textField($model,'reccomended'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'self'); ?>
		<?php echo $form->textField($model,'self'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default'); ?>
		<?php echo $form->textField($model,'default'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_profiles_id'); ?>
		<?php echo $form->textField($model,'user_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'counsellor_id'); ?>
		<?php echo $form->textField($model,'counsellor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'career_options_id'); ?>
		<?php echo $form->textField($model,'career_options_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->