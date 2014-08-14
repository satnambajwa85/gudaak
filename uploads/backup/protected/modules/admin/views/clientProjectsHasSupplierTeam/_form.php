<?php
/* @var $this ClientProjectsHasSupplierTeamController */
/* @var $model ClientProjectsHasSupplierTeam */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-projects-has-supplier-team-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'client_projects_id'); ?>
		<?php echo $form->textField($model,'client_projects_id'); ?>
		<?php echo $form->error($model,'client_projects_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supplier_team_id'); ?>
		<?php echo $form->textField($model,'supplier_team_id'); ?>
		<?php echo $form->error($model,'supplier_team_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->