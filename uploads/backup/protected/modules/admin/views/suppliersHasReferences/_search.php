<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */
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
		<?php echo $form->label($model,'client_first_name'); ?>
		<?php echo $form->textField($model,'client_first_name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_id'); ?>
		<?php echo $form->textField($model,'client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_last_name'); ?>
		<?php echo $form->textField($model,'client_last_name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_email'); ?>
		<?php echo $form->textField($model,'client_email',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_engagement'); ?>
		<?php echo $form->textField($model,'year_engagement',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'industry_id'); ?>
		<?php echo $form->textField($model,'industry_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suppliers_id'); ?>
		<?php echo $form->textField($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q1_communication_rating'); ?>
		<?php echo $form->textField($model,'q1_communication_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q2_skill_rating'); ?>
		<?php echo $form->textField($model,'q2_skill_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q3_timelines_ratings'); ?>
		<?php echo $form->textField($model,'q3_timelines_ratings'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q4_independence_rating'); ?>
		<?php echo $form->textField($model,'q4_independence_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provider_do_well'); ?>
		<?php echo $form->textArea($model,'provider_do_well',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provider_improve'); ?>
		<?php echo $form->textArea($model,'provider_improve',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'problems_during_development'); ?>
		<?php echo $form->textArea($model,'problems_during_development',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_project_description'); ?>
		<?php echo $form->textArea($model,'client_project_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->