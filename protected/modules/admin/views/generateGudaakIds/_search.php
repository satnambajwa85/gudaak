<?php
/* @var $this GenerateGudaakIdsController */
/* @var $model GenerateGudaakIds */
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
		<?php echo $form->label($model,'gudaak_id'); ?>
		<?php echo $form->textField($model,'gudaak_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cities_id'); ?>
		<?php echo $form->textField($model,'cities_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'schools_id'); ?>
		<?php echo $form->textField($model,'schools_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activation'); ?>
		<?php echo $form->textField($model,'activation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->