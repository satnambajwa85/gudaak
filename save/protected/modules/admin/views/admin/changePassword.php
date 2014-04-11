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
						'id'=>'changePassword-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
					)); ?>
					<div class="span3">
						<?php echo $form->labelEx($model,'oldpassword'); ?>
						<?php echo $form->passwordField($model,'oldpassword',array('size'=>60,'maxlength'=>100)); ?>
						<?php echo $form->error($model,'oldpassword'); ?>
					</div>
					<div class="clearfix"></div>
					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'newpassword'); ?>
						<?php echo $form->passwordField($model,'newpassword',array('size'=>50,'maxlength'=>50)); ?>
						<?php echo $form->error($model,'newpassword'); ?>
					</div>
					<div class="clearfix"></div>
					<div class="span3 pull-left">
						<?php echo $form->labelEx($model,'confirmpass'); ?>
						<?php echo $form->passwordField($model,'confirmpass',array('size'=>50,'maxlength'=>50)); ?>
						<?php echo $form->error($model,'confirmpass'); ?>
					</div>
					 
					
				 
 
					<div class="clearfix"></div>
					<div class="span4 buttons">
						
						<?php echo CHtml::submitButton('Save',array('class'=>'btn btn-s-md btn-success')); ?>
					</div>



				<?php $this->endWidget(); ?>
				

        </aside>
    
</section>
<!-- left side menu start -->
