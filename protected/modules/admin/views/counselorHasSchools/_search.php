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
		<?php echo $form->label($model,'counselor_id'); ?>
		<?php echo $form->textField($model,'counselor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'schools_id'); ?>
		<?php echo $form->textField($model,'schools_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
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