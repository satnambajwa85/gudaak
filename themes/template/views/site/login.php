<?php $this->pageTitle=Yii::app()->name . ' - Login';?>
<div class="spacer50"></div>
   <div class="col-md-10 col-md-offset-1 white" style="border-radius:5px;">
			<div>
					<?php if(Yii::app()->user->hasFlash('login')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('login'); ?></strong>
						</div>
							<div class="flash-error">
								
							</div>
					<?php endif; ?>	
					
			</div>
	
			
		<div style="margin: 51px auto;width: 39%;">
			<?php if(Yii::app()->user->hasFlash('login')):?>
						<div class="flash-error">
						<?php echo Yii::app()->user->getFlash('login');?>
						</div>
					 <?php endif; ?>
				<div class="pd29"></div>
				
					<?php $form=$this->beginWidget('CActiveForm', array(
																'id'=>'login-form',
																'enableClientValidation'=>true,
																'clientOptions'=>array(
																	'validateOnSubmit'=>true,
																),
															));?>
				<i class="icon-key orange pull-left"></i>
				<h4 class="form-signin-heading">Login your account</h4>
				<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email address','autofocus'=>true)); 
				echo $form->error($model,'email');?>
				<div class="pd4"></div>
				<?php echo $form->PasswordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); 
				echo $form->error($model,'password');?>
				<div class="pd4"></div>
				<?php echo CHtml::ajaxLink("Forget password?",CController::createUrl('site/forgetPassword'),array('update' => '#render'),array('class'=>'forget pull-left'));?>
				<?php echo CHtml::link('',array('/site/forgetPassword'));?>
				<div class="clearfix"></div>
				<div align="center" class="top-stats-icons">
				<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-warning login pull-right','style'=>'width:27%;'));?>
				</div>
				<?php $this->endWidget(); ?>
				
				
		</div>
			
			<div class="pd29"></div>
			<div class="pd29"></div>
	</div>