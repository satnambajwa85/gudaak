<?php
/* @var $this SchoolsController */
/* @var $model Schools */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schools-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	 <div class="form-group">
	 		<?php echo $form->hiddenField($model,'cities_id',array('value'=>$id)); ?>
 </div>
 
	<div class="form-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'name'); ?>
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
		<?php echo $form->labelEx($model,'display_name'); ?>
		<?php echo $form->textField($model,'display_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'display_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'mobile_no'); ?>
		<?php echo $form->textField($model,'mobile_no',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'mobile_no'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'postcode'); ?>
		<?php echo $form->textField($model,'postcode',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'postcode'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'activation'); ?>
		<?php echo $form->textField($model,'activation'); ?>
		<?php echo $form->error($model,'activation'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'telephone_no'); ?>
		<?php echo $form->textField($model,'telephone_no',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telephone_no'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'images'); ?>
		<?php echo $form->fileField($model,'images',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'images'); ?>
		<?php if(isset($model->images)){ ?> 
		<?php echo $form->hiddenField($model,'oldImage',array('value'=>$model->images)); ?>
		<img width="100" height="100" src="<?php echo Yii::app()->request->baseUrl.'/uploads/schools/small/'.$model->images;?>" alt="image"/>
		<?php }?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'website'); ?>
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