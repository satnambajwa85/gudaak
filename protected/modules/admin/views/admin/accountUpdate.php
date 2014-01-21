<?php
$action	=	Yii::app()->controller->action->id;
$accActive ='';
$magActive ='';
if($action	==	'accountUpdate')
	$accActive ='current';
if($action	==	'changePassword')
	$magActive ='current';

		 
	
?>
       <div class="spacer15">
				<?php if(Yii::app()->user->hasFlash('updated')): ?>
					<div class="alert alert-success">
					  <button data-dismiss="alert" class="close" type="button">×</button>
					  <strong><?php echo Yii::app()->user->getFlash('updated'); ?></strong>
					</div>
						<div class="flash-error">
							
						</div>
				<?php endif; ?>	
				
			</div>
<!-- left side menu start -->
<section class="span4">
	<aside id="side_menu">
		<ul>	
			<li class="design "><?php echo CHtml::link('Update Profile Info',array('admin/accountUpdate'),array('class'=>$accActive));?></li>
			<li class="manage "><?php echo CHtml::link('Change Password',array('admin/changePassword'),array('class'=>$magActive));?></li>

			<div class="clr"></div>
		</ul>
		
		
	</aside>
</section>
<section class="span8 pull-left">
		<aside id="menu_right">
				<?php 
					$form=$this->beginWidget('CActiveForm', array(
						'id'=>'user-profiles-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
					)); ?>
					<div class="span3">
						<?php echo $form->labelEx($model,'display_name'); ?>
						<?php echo $form->textField($model,'display_name',array('size'=>60,'maxlength'=>100)); ?>
						<?php echo $form->error($model,'display_name'); ?>
					</div>
					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'first_name'); ?>
						<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
						<?php echo $form->error($model,'first_name'); ?>
					</div>
					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'last_name'); ?>
						<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
						<?php echo $form->error($model,'last_name'); ?>
					</div>
					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
					
					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'date_of_birth'); ?>
						<?php	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
													'model'=>$model,
													'attribute'=>'date_of_birth',
													'options'=>array('dateFormat'=>'yy-mm-dd',
																	'changeMonth'=>'true',
																	'changeYear'=>'true',
													),
													));?>
						<?php echo $form->error($model,'date_of_birth'); ?>
					</div>
					
					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'mobile_no'); ?>
						<?php echo $form->textField($model,'mobile_no',array('size'=>10,'maxlength'=>10)); ?>
						<?php echo $form->error($model,'mobile_no'); ?>
					</div>

					

					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'postcode'); ?>
						<?php echo $form->textField($model,'postcode',array('size'=>6,'maxlength'=>6)); ?>
						<?php echo $form->error($model,'postcode'); ?>
					</div>
					
					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'gender'); ?>
						<?php echo $form->radioButtonlist($model,'gender',array('Male'=>'Male','Female'=>'Female'),array('separator'=>'')); ?>
						<?php echo $form->error($model,'gender'); ?>
					</div>
					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'address'); ?>
						<?php echo $form->textArea($model,'address',array('size'=>60,'maxlength'=>600)); ?>
						<?php echo $form->error($model,'address'); ?>
					</div>
					<div class="clearfix"></div>
					<div class="span4 buttons">
						
						<?php echo CHtml::submitButton('update',array('class'=>'btn btn-s-md btn-success')); ?>
					</div>



				<?php $this->endWidget(); ?>
				

        </aside>
    
</section>
<!-- left side menu start -->
