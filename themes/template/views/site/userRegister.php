<div class="col-md-6 col-md-offset-3 white border-layer mr-top116">
			<?php echo CHtml::link('<div class="site-logo"></div>',array('site/'));?>
			<div class="col-md-12 pd13 mt50 fl">
			<div class="hide-overflow"></div>
				<div  class="col-md-5 login-box pull-left ">
					<div id="">
								<?php $login=new LoginForm;  $form=$this->beginWidget('CActiveForm', array(
																	'id'=>'login-form',
																	'action'=>Yii::app()->createUrl('/site/login'),
																	'enableClientValidation'=>true,
																		'clientOptions'=>array(
																			'validateOnSubmit'=>true,
																		),
																));?> 
						<i class="icon-key orange pull-left"></i>
						<h4 class="form-signin-heading ">Login your profile</h4>
						<?php echo $form->textField($login,'email',array('class'=>'form-control','placeholder'=>'Email address','autofocus'=>true));
						echo $form->error($login,'email');?>
						<div class="pd4"></div>
						<?php echo $form->PasswordField($login,'password',array('class'=>'form-control','placeholder'=>'Password'));
						echo $form->error($login,'password');?>
						<div class="pd4"></div>
						<?php echo CHtml::ajaxLink("Forget password?",CController::createUrl('site/forgetPassword'),array('update' => '#render'),array('class'=>'forget pull-left'));
						echo CHtml::link('',array('/site/forgetPassword'));?>
						<?php echo CHtml::ajaxLink("New user?",CController::createUrl('site/newUser'),array('update' => '#render'),array('class'=>'forget pull-right'));?>
						<div class="clearfix"></div>
						<div align="center" class="top-stats-icons">
						<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-warning login'));?>
						<div class="clearfix"></div>
						<div class="or">or</div>
						<?php echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('class'=>'btn btn-lg btn-primary fb'));?>
						</div>
						<?php $this->endWidget(); ?>
				</div>
				<?php echo CHtml::link('Back to home',array('/site'),array('class'=>'btn btn-info back-bt'));?>
				</div>
			 <div class="col-md-6 visibale-area pull-right">	
			<?php 
				$form=$this->beginWidget('CActiveForm', array(
														'id'=>'user-register',
															'enableClientValidation'=>true,
															'clientOptions'=>array(
																'validateOnSubmit'=>true,
															),
														));?>
			  
				<i class="glyphicon glyphicon-edit orange pull-left"></i>
				<h4 class="form-signin-heading ">Enroll your future!!!</h4>
				<?php echo $form->textField($model,'first_name',array('class'=>'form-control','placeholder'=>'First Name','autofocus'=>true));
				echo $form->error($model,'first_name');?>
				
				<div class="pd4"></div>
				<?php echo $form->textField($model,'last_name',array('class'=>'form-control','placeholder'=>'Last Name','autofocus'=>true));
				echo $form->error($model,'last_name');
				?>
				<div class="pd4"></div>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
																'model'=>$model,
																'attribute'=>'date_of_birth',
																'options'=>array('dateFormat'=>'yy-mm-dd',
																				'changeMonth'=>'true',
																				'changeYear'=>'true',),
																'htmlOptions'=>array('class'=>'dob form-control pull-left',
																					'placeholder'=>'DOB','autofocus'=>true),
																
																));
				
				?>
 

			 
				<!--<i class="glyphicon glyphicon-calendar orange dob-icon">-->
				<?php echo $form->checkBox($model,'gender',array('id'=>'dimension-switch'));?>
				<!--<input type="checkbox" id="dimension-switch" checked>-->
				<div class="clearfix"></div>
				<?php echo $form->error($model,'date_of_birth');?>
				<div class="pd4"></div>
				<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email','autofocus'=>true));
				echo $form->error($model,'email');
				?>
				<div class="pd4"></div>
				<?php echo $form->textField($model,'mobile_no',array('class'=>'form-control','placeholder'=>'Mobile','autofocus'=>true));
				echo $form->error($model,'mobile_no');
				?>
				<div class="pd4"></div>
				<?php echo $form->textField($model,'gudaak_id',array('class'=>'form-control','placeholder'=>'Gudaak ID','autofocus'=>true));
				echo $form->error($model,'gudaak_id');
				?>
				<div class="pd4"></div>
				<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password','autofocus'=>true));
				echo $form->error($model,'password');
				?>
				<div class="pd4"></div>
				<?php echo $form->passwordField($model,'confirmpass',array('class'=>'form-control','placeholder'=>'confirmpass','autofocus'=>true));
				echo $form->error($model,'confirmpass');
				?>
				<div class="pd4"></div>
				
				<div align="center">
				<?php echo CHtml::submitButton('Register',array('class'=>'btn btn-warning login mt'));?>
				</div>
			  <?php $this->endWidget();?>
			</div>
				
			</div>
	   </div>
	   