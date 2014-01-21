<?php
/* @var $this QuestionOptionsController */
/* @var $model QuestionOptions */
/* @var $form CActiveForm */
?>

<div class="col-sm-6 form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-options-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="form-group">
	<?php echo $form->labelEx($model,'orient_categories_id'); ?>
			 <?php 	echo $form->dropDownList($model,'orient_categories_id',
								CHtml::listData(OrientCategories::model()->findAll(),'id','title'),
								array('ajax' => array('type'=>'POST',
									'url'=>CController::createUrl('DynamicCategories'), //url to call.
									'update'=>'#QuestionOptions_orient_items_id', //selector to update
									 
									
										)));?>
	<?php echo $form->error($model,'orient_categories_id'); ?>
		
	</div>
	<div class="form-group">
	<?php echo $form->labelEx($model,'orient_items_id'); ?>
			 <?php 	echo $form->dropDownList($model,'orient_items_id',
								CHtml::listData(OrientItems::model()->findAll(),'id','title'),
								array('ajax' => array('type'=>'POST',
									'url'=>CController::createUrl('DynamicSubCategories'), //url to call.
									'update'=>'#QuestionOptions_questions_id', //selector to update
									 
									
										)));?>
	<?php echo $form->error($model,'orient_items_id'); ?>
		
	</div>
 	<div class="form-group">
		<?php echo $form->labelEx($model,'questions_id'); ?>
		<?php echo $form->dropDownlist($model,'questions_id',CHtml::listData(Questions::model()->findAll(),'id','title'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'questions_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php $this->widget('application.extensions.ckeditor.CKEditor', array(
												'model'=>$model,
												'attribute'=>'description',
												'language'=>'en',
												'editorTemplate'=>'full',
												)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'interest_value'); ?>
		<?php echo $form->textField($model,'interest_value',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'interest_value'); ?>
	</div>

	<div class="form-group">
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
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'activation'); ?>
		<?php echo $form->radioButtonlist($model,'activation',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'activation'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-s-md btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->