<?php
	$this->pageTitle=Yii::app()->name . ' - Change Password';
$this->breadcrumbs=array(
	'Error',
);
?>
<!-- left side menu start -->
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
<div class="cold-md-12 changePassword pill-left">
	 <div class="col-md-3  col-md-offset-4 pull-left">	
			<?php 
				$form=$this->beginWidget('CActiveForm', array(
														'id'=>'user-register',
													    'enableClientValidation'=>true,
														'clientOptions'=>array(
																'validateOnSubmit'=>true,
																
															)
														));?>
			  
				<i class="icon-key orange pull-left"></i>
				<h4 class="form-signin-heading ">Change your Password!</h4>
				<?php echo $form->passwordField($model,'oldpassword',array('class'=>'form-control','placeholder'=>'Your Old Password','autofocus'=>true));
				echo $form->error($model,'oldpassword');?>
				<div class="pd4"></div>
				<?php echo $form->passwordField($model,'newpassword',array('class'=>'form-control','placeholder'=>'Enter New Password','autofocus'=>true));
				echo $form->error($model,'newpassword');?>
				<div class="pd4"></div>
				<?php echo $form->passwordField($model,'confirmpass',array('class'=>'form-control','placeholder'=>'Confirm Password','autofocus'=>true));
				echo $form->error($model,'confirmpass');?>
				<div class="pd4"></div>
				 
				
				
				<div align="center">
				<?php echo CHtml::submitButton('Update',array('class'=>'btn btn-warning login mt'));?>
				</div>
			  <?php $this->endWidget();?>
			</div>
</div>