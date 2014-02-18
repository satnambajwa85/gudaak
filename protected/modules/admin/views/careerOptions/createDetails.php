<?php
/* @var $this CareerDetailsController */
/* @var $model CareerDetails */

$this->breadcrumbs=array(
	'Career Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CareerDetails', 'url'=>array('index')),
	array('label'=>'Manage CareerDetails', 'url'=>array('admin')),
);
?>

<h1>Create CareerDetails</h1>

<?php
/* @var $this CareerDetailsController */
/* @var $model CareerDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'career-details-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'career_options_id'); ?>
		<?php 
		$option	=	CareerOptions::model()->findByPk($id);
		echo $option->title;
		$model->career_options_id	=	$id;
		echo $form->hiddenField($model,'career_options_id');?>
		<?php echo $form->error($model,'career_options_id'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->dropDownList($model,'title',array('Overview'=>'Overview','Neature Of Work'=>'Neature Of Work','The Payoff'=>'The Payoff','Skills/Traits'=>'Skills/Traits','Getting There'=>'Getting There','Opportunities'=>'Opportunities','Major Institutes'=>'Major Institutes','Pros And Cons'=>'Pros And Cons','Hall Of Fame'=>'Hall Of Fame','Misconceptions'=>'Misconceptions'));?>
		<?php echo $form->error($model,'title'); ?>
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
		<img width="100" height="100" src="<?php echo Yii::app()->request->baseUrl.'/uploads/careerDetails/small/'.$model->image;?>" alt="image"/>
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

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->