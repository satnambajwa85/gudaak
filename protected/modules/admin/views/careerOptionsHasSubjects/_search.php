<?php
/* @var $this CareerOptionsHasSubjectsController */
/* @var $model CareerOptionsHasSubjects */
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
		<?php echo $form->label($model,'career_options_id'); ?>
		<?php echo $form->textField($model,'career_options_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subjects_id'); ?>
		<?php echo $form->textField($model,'subjects_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->