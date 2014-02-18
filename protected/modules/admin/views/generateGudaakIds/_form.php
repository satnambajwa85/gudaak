<?php
/* @var $this GenerateGudaakIdsController */
/* @var $model GenerateGudaakIds */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'generate-gudaak-ids-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'gudaak_id',array('value'=>'GDK')); ?>
	 
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cities_id'); ?>
		<?php echo $form->dropDownlist($model,'cities_id',CHtml::listData(Cities::model()->findAll(),'id','title'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'cities_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schools_id'); ?>
		<?php echo $form->dropDownlist($model,'schools_id',CHtml::listData(Schools::model()->findAll(),'id','name'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'schools_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'model'=>$model,
									'attribute'=>'add_date',
									'options'=>array('dateFormat'=>'yy-mm-dd','minDate'=>0),
									'htmlOptions'=>array('class'=>'form-control'),
									'value'=>date('Y-m-d', strtotime('+2 day', strtotime(date('Y-m-d')))),
									));?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>



	<div class="form-group">
		<?php echo $form->labelEx($model,'activation'); ?>
		<?php echo $form->radioButtonlist($model,'activation',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'activation'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->