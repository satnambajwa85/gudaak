<?php $this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array('Login',);?>
<div class="spacer50"></div>
 <div class="col-md-10 col-md-offset-1 white" style="border-radius:5px;">
			
			
			<?php	echo '<div style="margin: 51px auto;width: 39%;">';	
					if(Yii::app()->user->hasFlash('login')):
						echo '<div class="flash-error">';
						echo Yii::app()->user->getFlash('login');
						echo '</div>';
					 endif; 
				echo '<div class="pd29"></div>';
				echo '<div id="">';
						$form=$this->beginWidget('CActiveForm', array(
																'id'=>'login-form',
																'enableClientValidation'=>true,
																'clientOptions'=>array(
																	'validateOnSubmit'=>true,
																),
															));
				echo '<i class="icon-key orange pull-left"></i>';
				echo '<h4 class="form-signin-heading">Login your account</h4>';
				echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email address','autofocus'=>true)); 
				echo $form->error($model,'email');
				echo '<div class="pd4"></div>';
				echo $form->PasswordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); 
				echo $form->error($model,'password');
				echo '<div class="pd4"></div>';
				echo CHtml::ajaxLink("Forget password?",CController::createUrl('site/forgetPassword'),array('update' => '#render'),array('class'=>'forget pull-left'));
				echo CHtml::link('',array('/site/forgetPassword'));
				//echo CHtml::ajaxLink("New user?",CController::createUrl('site/newUser'),array('update' => '#render'),array('class'=>'forget pull-right'));
				echo '<div class="clearfix"></div>';
				echo '<div align="center" class="top-stats-icons">';
				echo CHtml::submitButton('Login',array('class'=>'btn btn-warning login pull-right','style'=>'width:27%;'));
				echo '<div class="clearfix"></div>';
				//echo '<div class="or">or</div>';
				//echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('class'=>'btn btn-lg btn-primary fb'));
				echo '</div>';
				$this->endWidget(); 
				echo '</div>';
				//echo CHtml::link('Back to home',array('/site/forgetPassword'),array('class'=>'btn btn-info back-bt'));
				echo '</div>';?>
			<div class="pd29"></div>
			
			<div class="pd29"></div>
			<div class="pd29"></div>
	   </div>