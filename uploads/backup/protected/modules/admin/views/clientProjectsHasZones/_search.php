<?php
/* @var $this ClientProjectsHasZonesController */
/* @var $model ClientProjectsHasZones */
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
		<?php echo $form->label($model,'client_projects_id'); ?>
		<?php echo $form->textField($model,'client_projects_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zones_id'); ?>
		<?php echo $form->textField($model,'zones_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->