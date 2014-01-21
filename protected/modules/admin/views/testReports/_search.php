<?php
/* @var $this TestReportsController */
/* @var $model TestReports */
/* @var $form CActiveForm */
?>

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
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activation'); ?>
		<?php echo $form->textField($model,'activation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_profiles_id'); ?>
		<?php echo $form->textField($model,'user_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'questions_id'); ?>
		<?php echo $form->textField($model,'questions_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_options_id'); ?>
		<?php echo $form->textField($model,'question_options_id'); ?>
	</div>

	 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->