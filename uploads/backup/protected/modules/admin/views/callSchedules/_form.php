<?php
/* @var $this CallSchedulesController */
/* @var $model CallSchedules */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'call-schedules-form',
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
		<?php 
			    $list_data	=	array();
				$lists	    =	clientProjects::model()->findAll();
				foreach($lists as $list)
				{
	         		$list_data[]	=	$list;
				}
				$listData = CHtml::listData($list_data,'id','name');
				echo $form->dropDownList($model,'client_projects_id',$listData,array('empty'=>'Select a Project'));
		 ?>
		<?php echo $form->error($model,'client_projects_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_phone'); ?>
		<?php echo $form->textField($model,'client_phone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'client_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'call_time'); ?>
		<?php echo $form->textField($model,'call_time'); ?>
		<?php echo $form->error($model,'call_time'); ?>
	</div>

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'add_date'); ?>
		<?php //echo $form->textField($model,'add_date'); ?>
		<?php //echo $form->error($model,'add_date'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->