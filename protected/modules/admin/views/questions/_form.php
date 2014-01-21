<?php
/* @var $this QuestionsController */
/* @var $model Questions */
/* @var $form CActiveForm */
?>

<div class="col-sm-6 form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'questions-form',
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
									'update'=>'#Questions_orient_items_id', //selector to update
									 
									
										)));?>
	<?php echo $form->error($model,'orient_categories_id'); ?>
		
	</div>
 
	<div class="form-group">
		<?php echo $form->labelEx($model,'orient_items_id'); ?>
		<?php echo $form->dropDownlist($model,'orient_items_id',CHtml::listData(OrientItems::model()->findAll(),'id','title'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'orient_items_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'alias'); ?>
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
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'image'); ?>
		<?php if(isset($model->image)){ ?> 
		<?php echo $form->hiddenField($model,'oldImage',array('value'=>$model->image)); ?>
		<img width="100" height="100" src="<?php echo Yii::app()->request->baseUrl.'/uploads/questions/small/'.$model->image;?>" alt="image"/>
		<?php }?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->radioButtonlist($model,'published',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-s-md btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->