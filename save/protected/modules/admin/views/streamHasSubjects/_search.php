<?php
/* @var $this StreamHasSubjectsController */
/* @var $model StreamHasSubjects */
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
		<?php echo $form->label($model,'stream_id'); ?>
		<?php echo $form->textField($model,'stream_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subjects_id'); ?>
		<?php echo $form->textField($model,'subjects_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_subjects'); ?>
		<?php echo $form->textField($model,'type_subjects',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->