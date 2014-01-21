<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array('Contact Us',);
?>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>
<div class="col-md-10 col-md-offset-1 forget-container ">
			<div class="col-md-12 pd13" id="render">
			 	<?php $form=$this->beginWidget('CActiveForm', array('id'=>'contact-form',
																	'htmlOptions'=>array('class'=>'col-md-4'),
																	'enableClientValidation'=>true,
																	'clientOptions'=>array(
																		'validateOnSubmit'=>true,
																	),
																)); ?>
			  
				
				<h4 class="form-signin-heading mr0">Contact Us</h4>
				<?php echo $form->labelEx($model,'name'); ?>
				<?php echo $form->textField($model,'name',array('class'=>'form-control'));
				echo $form->error($model,'name');?>
				<div class="pd4"></div>
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('class'=>'form-control'));
				echo $form->error($model,'email');
				?>
				<div class="pd4"></div>
				<?php echo $form->labelEx($model,'subject'); ?>
				<?php echo $form->textField($model,'subject',array('class'=>'form-control'));
				echo $form->error($model,'subject');
				?>
				<div class="pd4"></div>
				<?php echo $form->labelEx($model,'body'); ?>	
				<?php echo $form->textArea($model,'body',array('class'=>'form-control'));
				echo $form->error($model,'body');
				?>
				 
					<?php echo $form->labelEx($model,'verifyCode'); ?>
					<div>
					<?php $this->widget('CCaptcha'); ?>
					<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
					</div>
					<div class="hint">Please enter the letters as they are shown in the image above.
					<br/>Letters are not case-sensitive.</div>
					<?php echo $form->error($model,'verifyCode'); ?>
			 
				<?php endif; ?>
				
				<div class="pd4"></div>
				
				<div align="center">
				<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-warning login mt'));?>
				</div>
			  <?php $this->endWidget();?>
			 
				
			</div>
	   </div>
	   
 
 