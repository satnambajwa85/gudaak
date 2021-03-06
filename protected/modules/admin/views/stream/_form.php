<?php
/* @var $this StreamController */
/* @var $model Stream */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stream-form',
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
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
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
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'image'); ?>
		<?php if(isset($model->image)){ ?> 
		<?php echo $form->hiddenField($model,'oldImage',array('value'=>$model->image)); ?>
		<img width="100" height="100" src="<?php echo Yii::app()->request->baseUrl.'/uploads/stream/small/'.$model->image;?>" alt="image"/>
		<?php }?>
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
		<?php echo $form->labelEx($model,'activation'); ?>
		<?php echo $form->radioButtonlist($model,'activation',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'activation'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group">
		<?php
		echo $form->labelEx($model,'subjects'); ?>
		<?php 
		$subjects	=	Subjects::model()->findAllByAttributes(array('status'=>1));
		foreach($subjects as $subject){
		echo '<div style="width:10%;float:left;border:1px solid green;"><div>'.$form->CheckBox($model,'subjects['.$subject->id.']',array('checked'=>(in_array($subject->id,$subjectList))?'checked':''));
		echo $subject->title.'</div>';
		$subjects[$subject->id]	=	(in_array($subject->id,$subjectListType))?'compulsory':'optional';
		$valueRating=array('compulsory'=>'compulsory','optional'=>'optional');
		echo CHtml::radioButtonList('subjects['.$subject->id.']',$subjects[$subject->id],$valueRating,array('separator'=>'','labelOptions'=>array('class'=>'textarea_skill'), )).'</div>';
		}
		?>
		<?php echo $form->error($model,'subjects'); ?>
	</div>
	<div class="clear"></div>
    	 

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-s-md btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->