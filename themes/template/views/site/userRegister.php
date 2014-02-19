<?php $this->pageTitle=Yii::app()->name . ' - Register';?>
<div class="clear"></div>
<div class="col-md-6 mt60 mb58 col-md-offset-3 white border-layer mr-top116">
			
			<?php echo CHtml::link('<div class="site-logo"></div>',array('site/'));?>
			<div class="col-md-12 white  pd13  ">
			<div class="hide-overflow"></div>
					<?php if(Yii::app()->user->hasFlash('create')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('create'); ?></strong>
						</div>
							<div class="flash-error">
								
							</div>
					<?php endif; ?>	
					<?php if(Yii::app()->user->hasFlash('error')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('error'); ?></strong>
						</div>
							<div class="flash-error">
								
							</div>
					<?php endif; ?>	
				<div  class="col-md-6 login-box pull-left ">
					<div id="">
					<?php 	$login=new LoginForm; $form=$this->beginWidget('CActiveForm', array(
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
						<a href="javascript:void(0);" id="forget" class="forget pull-left">Forget password?</a>
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
																	'id'=>'forget-form',
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
						<?php echo CHtml::Link("Back to login",'javascript:void(0);',array('class'=>'forget pull-left login-visible'));
						;?>
						<div class="clearfix"></div>
						<div align="center" class="top-stats-icons">
						<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-warning login'));?>
						<div class="clearfix"></div>
						<div class="or">or</div>
						<?php echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('class'=>'btn btn-lg btn-primary fb'));?>
						</div>
						<?php $this->endWidget(); ?>
				</div>
				<?php echo CHtml::link('Back to home',array('/site'),array('class'=>'btn btn-info back-bt2'));?>
				</div>
			 <div class="col-md-6 visibale-area pull-right">	
				 <?php  $form=$this->beginWidget('CActiveForm', array(
                                                            'id'=>'user-register',
                                                             'enableClientValidation'=>true,
                                                            'clientOptions'=>array('validateOnSubmit'=>true,)));?>
                                    <i class="glyphicon glyphicon-edit orange pull-left"></i>
                                    <h4 class="form-signin-heading ">Enroll your future!!!</h4>
									   <?php 	echo $form->textField($model,'gudaak_id',
								
								array('class'=>'form-control','placeholder'=>'Gudaak ID','ajax' => array('type'=>'POST',
									'url'=>CController::createUrl('site/AutoCompleteLookup'), //url to call.
									'success'=>'function(data){afterResponse(data)}',
									//'update'=>'#Register_class',
									
									
										)));?>
								 
                                    <?php /*echo CHtml::ajaxLink('Check User', CHtml::normalizeUrl(array('site/CheckUser')), array('data'=>'js:jQuery(this).parents("form").serialize()+"&isAjaxRequest=1"','success'=>'function(data){$("#searchResult").html(data);$("#searchResult").fadeIn();return false;}'),array('id'=>'ajaxSubmit','class'=>'btn btn-primary pull-right','name'=>'ajaxSubmit'));echo '<div class="span4 pull-right alert alert-info" id="searchResult" style="display:none;"></div>';*/
                                    
									//echo $form->textField($model,'gudaak_id',array('class'=>'form-control','placeholder'=>'Gudaak ID','autofocus'=>true));
                                    echo $form->error($model,'gudaak_id');?>
									  <div class="pd4"></div>
                                    <?php echo $form->textField($model,'first_name',array('class'=>'form-control','placeholder'=>'First Name','autofocus'=>true));
                                    echo $form->error($model,'first_name');?>
                                    <div class="pd4"></div>
                                    <?php echo $form->textField($model,'last_name',array('class'=>'form-control','placeholder'=>'Last Name','autofocus'=>true));
                                    echo $form->error($model,'last_name');?>
                                    <div class="pd4"></div>
                                    <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                                    'model'=>$model,
                                                                    'attribute'=>'date_of_birth',
                                                                    'options'=>array('dateFormat'=>'yy-mm-dd',
                                                                                    'changeMonth'=>'true',
                                                                                    'changeYear'=>'true',),
                                                                    'htmlOptions'=>array('class'=>'dob form-control pull-left',
                                                                                        'placeholder'=>'DOB','autofocus'=>true),));?>
                                    <?php echo $form->checkBox($model,'gender',array('id'=>'dimension-switch'));?>
                                    <!--<input type="checkbox" id="dimension-switch" checked>-->
                                    <div class="clearfix"></div>
                                    <?php echo $form->error($model,'date_of_birth');?>
                                    <div class="pd4"></div>
                                    <?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email','autofocus'=>true));
                                    echo $form->error($model,'email');?>
                                    <div class="pd4"></div>
                                    <?php echo $form->textField($model,'mobile_no',array('class'=>'form-control','placeholder'=>'Mobile','autofocus'=>true));
                                    echo $form->error($model,'mobile_no');?>
                                    <div class="pd4"></div>
									<?php echo $form->dropDownlist($model,'class',array('empty'=>'Please Select'),array('id'=>'class_register','class'=>'form-control'));
									echo $form->error($model,'class');?>
                                    <div class="pd4"></div>
									<?php echo $form->dropDownlist($model,'medium',CHtml::listData(UserAcademicMedium::model()->findAll(),'id','title'),array('empty'=>'Please Select','class'=>'form-control'));
									echo $form->error($model,'medium');?>
                                    <div class="pd4"></div>
                                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password','autofocus'=>true));
                                    echo $form->error($model,'password');?>
                                    <div class="pd4"></div>
                                    <?php echo $form->passwordField($model,'confirmpass',array('class'=>'form-control','placeholder'=>'confirmpass','autofocus'=>true));
                                    echo $form->error($model,'confirmpass');?>
                                    <div class="pd4"></div>
                                    <div align="center"><?php echo CHtml::submitButton('Register',array('class'=>'btn btn-warning login mt'));?></div>
                                <?php $this->endWidget();?>
				
			</div>
				
			</div>
	   </div>
<script type='text/javascript'>
function afterResponse($data){
	var $response	=	jQuery.parseJSON($data);
	console.log($response.status);
	if($response.status==1)
	{
		$('#class_register').html($response.data);
		
	}
	else
		alert($response.data);	
}
</script>