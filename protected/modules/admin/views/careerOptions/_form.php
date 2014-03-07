<?php
/* @var $this CareerOptionsController */
/* @var $model CareerOptions */
/* @var $form CActiveForm */


?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'career-options-form',
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
	<?php echo $form->labelEx($model,'career_categories_id'); ?>
			 <?php 	echo $form->dropDownList($model,'career_categories_id',
								CHtml::listData(CareerCategories::model()->findAll(),'id','title'),
								array('ajax' => array('type'=>'POST',
									'url'=>CController::createUrl('DynamicCareer'), //url to call.
									'update'=>'#CareerOptions_career_id',
									
									
										)));?>
	<?php echo $form->error($model,'career_categories_id'); ?>
		
	</div>
	 
	<div class="form-group">
		<?php echo $form->labelEx($model,'career_id'); ?>
		<?php echo $form->dropDownlist($model,'career_id',CHtml::listData(Career::model()->findAll(),'id','title'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'career_id'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
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
		<img width="100" height="100" src="<?php echo Yii::app()->request->baseUrl.'/uploads/career_options/small/'.$model->image;?>" alt="image"/>
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
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->radioButtonlist($model,'published',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'published'); ?>
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
		echo $subject->title.'</div><div>';
		$valueRating=array('compulsory'=>'compulsory','optional'=>'optional');
		$subjects[$subject->id]	=	(in_array($subject->id,$subjectList))?'compulsory':'optional';
		echo CHtml::radioButtonList('subjects['.$subject->id.']',$subjects[$subject->id],$valueRating,array('separator'=>'','labelOptions'=>array('class'=>'textarea_skill'), ));
		
		
		echo'</div></div>';
		}
		?>
		<?php echo $form->error($model,'subjects'); ?>
	</div>
    <div class="clear"></div>
    
    <div class="form-group">
		<?php
		echo $form->labelEx($model,'streams'); ?>
		<?php 
		$streamL	=	Stream::model()->findAllByAttributes(array('status'=>1));
		foreach($streamL as $stream){
		echo '<div style="width:10%;float:left;border:1px solid green;"><div>'.$form->CheckBox($model,'streams['.$stream->id.']',array('checked'=>(in_array($stream->id,$streams))?'checked':''));
		echo $stream->name.'</div><div>';
		echo'</div></div>';
		}
		?>
		<?php echo $form->error($model,'streams'); ?>
	</div>
    <div class="clear"></div>
    <div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->