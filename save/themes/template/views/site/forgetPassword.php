<?php $this->pageTitle=Yii::app()->name . ' - Get your forget password.';?>
<div class="spacer50"></div>
<div class="col-md-10 col-md-offset-1">
			 
	<!-- set up the modal to start hidden and fade in and out -->
<div>
	<div class="modal-dialog">
		<div class="modal-content border-layer">
		<!-- dialog body -->
	<div class="modal-body">
		<?php echo CHtml::link('<div class="site-logo"></div>',array('site/'));?>

		<div class="row white ">

			<div class="col-md-12 pd13 ">
			<div class="hide-overflow2" style="top:-20px;z-index:0"></div>
			<?php if(Yii::app()->user->hasFlash('new_password_message')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('new_password_message'); ?></strong>
						</div>
							<div class="flash-error">
								
							</div>
					<?php endif; ?>	
				<div  class="col-md-6 login-box pull-left">
					<div id="">
							<?php $login = new LoginForm; $form=$this->beginWidget('CActiveForm', array(
																	'id'=>'forget-form',
																		'enableClientValidation'=>true,
																	'clientOptions'=>array(
																			'validateOnSubmit'=>true,
																			
																		)
																));?> 
						<i class="icon-key orange pull-left"></i>
						<h4 class="form-signin-heading ">Login your profile</h4>
						<?php echo $form->textField($login,'email',array('class'=>'form-control','placeholder'=>'Email address','autofocus'=>true));
						echo $form->error($login,'email');?>
						<div class="pd4"></div>
						<?php echo $form->PasswordField($login,'password',array('class'=>'form-control','placeholder'=>'Password'));
						echo $form->error($login,'password');?>
						<div class="pd4"></div>
						<?php echo CHtml::Link("Forget password?",'javascript:void(0);',array('class'=>'forget pull-left','id'=>'forget'));
						;?>
						<?php echo CHtml::ajaxLink("New user?",CController::createUrl('site/newUser'),array('update' => '#render'),array('class'=>'forget pull-right'));?>
						<div class="clearfix"></div>
						<div align="center" class="top-stats-icons">
						<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-warning login'));?>
						<div class="clearfix"></div>
						<div class="or">or</div>
						<?php echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('class'=>'btn btn-lg btn-primary fb'));?>
						</div>
						<?php $this->endWidget(); ?>
						<?php 	$forgetPass=new ForgotpasswordForm; 
								$form=$this->beginWidget('CActiveForm', array(
																	'id'=>'login-form',
																	'action'=>Yii::app()->createUrl('/site/ForgetPassword'),
																	'enableClientValidation'=>true,
																	'clientOptions'=>array(
																			'validateOnSubmit'=>true,
																			
																		)
																));?> 
						<i class="icon-key orange pull-left"></i>
						<h4 class="form-signin-heading ">Get your forget password</h4>
						<?php echo $form->textField($forgetPass,'email',array('class'=>'form-control','placeholder'=>'Email address','autofocus'=>true));
						echo $form->error($forgetPass,'email');?>
						<div class="pd4"></div>
						<div class="reg_text" align="center"> 
							<?php if(CCaptcha::checkRequirements()): $this->widget('CCaptcha');?>
						</div>
						<div class="hint">
							<?php echo $form->textField($forgetPass,'verifyCode',array('class'=>'form-control'));
								echo $form->error($forgetPass,'verifyCode');?>
						</div>
						<?php 	endif; ?>
						<div class="pd4"></div>
						 
						<div class="clearfix"></div>
						<div align="center" class="top-stats-icons">
						<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-warning login'));?>
						<div class="clearfix"></div>
						<div class="or">or</div>
						<?php echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('disabled'=>'disabled','class'=>'btn btn-lg btn-primary fb'));?>
						</div>
						<?php $this->endWidget(); ?>
				</div>

				<?php echo CHtml::link('Back to home',array('site/'),array('class'=>'btn btn-info back-bt','data-dismiss'=>'modal'));?>
				</div>
			 <div class="col-md-6  pull-right">	
			<?php 
				$register=new Register; $form=$this->beginWidget('CActiveForm', array(
														'id'=>'user-register',
														'action'=>Yii::app()->createUrl('/site/UserRegister'),
													    'enableClientValidation'=>true,
														'clientOptions'=>array(
																'validateOnSubmit'=>true,
																
															)
														));?>
			  
				<i class="glyphicon glyphicon-edit orange pull-left"></i>
				<h4 class="form-signin-heading ">Enroll your future!!!</h4>
				<?php echo $form->textField($register,'first_name',array('id'=>'disabledInput','disabled'=>'disabled','class'=>'form-control','placeholder'=>'First Name','autofocus'=>true));
				echo $form->error($register,'first_name');?>
				
				<div class="pd4"></div>
				<?php echo $form->textField($register,'last_name',array('id'=>'disabledInput','disabled'=>'disabled','class'=>'form-control','placeholder'=>'Last Name','autofocus'=>true));
				echo $form->error($register,'last_name');
				?>
				<div class="pd4"></div>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
																'model'=>$register,
																'attribute'=>'date_of_birth',
																'options'=>array('dateFormat'=>'yy-mm-dd',
																				'changeMonth'=>'true',
																				'changeYear'=>'true',),
																'htmlOptions'=>array('id'=>'disabledInput','disabled'=>'disabled','class'=>'dob form-control pull-left',
																					'placeholder'=>'DOB','autofocus'=>true),
																
																));
				
				?>
 

			 
				
				<?php echo $form->checkBox($register,'gender',array('id'=>'disabledInput','disabled'=>'disabled','id'=>'dimension-switch'));?>
				<!--<input type="checkbox" id="dimension-switch" checked>-->
				<div class="clearfix"></div>
				<?php echo $form->error($register,'date_of_birth');?>
				<div class="pd4"></div>
				<?php echo $form->textField($register,'email',array('id'=>'disabledInput','disabled'=>'disabled','class'=>'form-control','placeholder'=>'Email','autofocus'=>true));
				echo $form->error($register,'email');
				?>
				<div class="pd4"></div>
				<?php echo $form->textField($register,'mobile_no',array('id'=>'disabledInput','disabled'=>'disabled','class'=>'form-control','placeholder'=>'Mobile','autofocus'=>true));
				echo $form->error($register,'mobile_no');
				?>
				<div class="pd4"></div>
					 <?php echo $form->dropDownList($register,'class',array('10'=>'10th','11'=>'11th','12'=>'12th'),array('id'=>'disabledInput','disabled'=>'disabled','class'=>'form-control','placeholder'=>'Mobile','autofocus'=>true));
				echo $form->error($register,'class');?>
				<div class="pd4"></div
				<?php			
				echo $form->textField($register,'gudaak_id',array('id'=>'disabledInput','disabled'=>'disabled','class'=>'form-control','placeholder'=>'Gudaak ID','autofocus'=>true));
				echo $form->error($register,'gudaak_id');
				?>
				<div class="pd4"></div>
				<?php echo $form->passwordField($register,'password',array('id'=>'disabledInput','disabled'=>'disabled','class'=>'form-control','placeholder'=>'Password','autofocus'=>true));
				echo $form->error($register,'password');
				?>
				<div class="pd4"></div>
				<?php echo $form->passwordField($register,'confirmpass',array('id'=>'disabledInput','disabled'=>'disabled','class'=>'form-control','placeholder'=>'confirmpass','autofocus'=>true));
				echo $form->error($register,'confirmpass');
				?>
				<div class="pd4"></div>
				
				<div align="center">
				<?php echo CHtml::submitButton('Register',array('id'=>'disabledInput','disabled'=>'disabled','class'=>'btn btn-warning login mt'));?>
				</div>
			  <?php $this->endWidget();?>
			</div>
			</div>
	   </div>
	   
			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
</div>  
</div>