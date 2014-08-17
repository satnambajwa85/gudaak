<!-- Application stylesheet : mandatory -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/uielement.css">
<!--/ Application stylesheet -->

<section class="col-lg-12 bg-teal" style="height:5px;">
            <!-- START row -->
            
            <!--/ END row -->
        </section>

<section class="col-lg-12"> 
	<!-- START row -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3 class="title light text-grey5 mtb22">Start getting quality vetted leads... </h3>
		</div>
	</div>
	<!--/ END row -->
</section>

<section class="col-lg-12">
	<!-- START row -->
	<div class="row">
		<div class="col-md-4 col-lg-offset-4">
			<div class="col-sm-12">
				<div class="col-sm-12 text-center">
<!--					<h4 class="title light text-grey9 text-size16 mb20">If you prefer to write out the requirements, access our self service platform. It will take 5-10 minutes.</h4>-->
				</div>

				<!-- Social button -->
				<div class="col-sm-12">
					<a href="index.php?r=site/linkedin&lType=initiate&role=3" class="btn btn-social btn-block btn-linkedin">
						<i class="ico-linkedin2"></i>
						Sign Up with LinkedIn
					</a>
				</div>
				<!--/ Social button -->
                 
                <div class="col-sm-12 text-center mb15">
                            <h4 class="title text-grey9 text-size13 pt0">or</h4>           
    						<span class="text-muted ">Sign in with E-mail: </span>
                        </div>

<!--
				<div class="col-sm-12 text-center">
					<h6 class="title light text-grey9 text-size13 mb20">Don’t have a LinkedIn Account,
						<a href="javascript:void(0);" id="show" class="text-teal-new">Click here</a>
					</h6>
				</div>
-->

				<!-- Login form -->
				<div class="col-sm-12">
					<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form','action'=>Yii::app()->createUrl('/site/login'), 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('data-parsley-validate'=>"data-parsley-validate"))); ?>
					<div class="form-group mb10">
						<?php if(Yii::app()->user->hasFlash('loginError')):?>
						<script type="text/javascript">
							$(".showdiv").slideToggle(700);
						</script>
						<div class="alert alert-dismissable alert-danger">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<?php echo Yii::app()->user->getFlash('loginError'); ?>
						</div>
						<?php endif; ?>

						<div class="row">
							<div class="col-sm-6 mb5">
								<label class="control-label">Email <span class="text-danger">*</span>
								</label>
								<div class="has-icon pull-right">
									<?php echo $form->textField($model,'username',array('placeholder'=>"Username / email",'class'=>'form-control input-white','required'=>'required','data-parsley-type'=>"email")); ?>
									<i class="ico-user2  form-control-icon icon-top"></i>
								</div>
							</div>
							<div class="col-sm-6 mb5">
								<label class="control-label">Password <span class="text-danger">*</span>
								</label>
								<div class="has-icon pull-right">
									<?php echo $form->passwordField($model,'password',array('placeholder'=>"Password",'class'=>'form-control input-white','required'=>'required')); ?>
									<i class="ico-lock4 form-control-icon icon-top"></i>
									<input type="hidden" name="fromsupplier" value="yes" />
								</div>
							</div>
						</div>
					</div>
					<div class="form-group mb10">
						<div class="row">
							<div class="col-xs-6 text-left">
								<div class="checkbox custom-checkbox">
									<?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox")); ?>
									<label for="customcheckbox" class="text-grey9">&nbsp;&nbsp;Remember me</label>
								</div>
							</div>
							<div class="col-xs-6 text-right">
								<a href="javascript:void(0);" id="errorfPassLink" data-toggle="modal" data-target="#bs-modal-lost-password">Lost password?</a>
							</div>
						</div>
					</div>
					<div class="form-group mb10">
						<?php echo CHtml::submitButton( 'Sign In',array( 'class'=>'btn btn-block btn-success btn-social btn-signin w30 ml35','style'=>'padding:11px 0px !important;')); ?>
					</div>
					<p class="clearfix text-center mb50">
						<span class="text-muted">Don't have any account? <a href="#" data-target="#bs-modal" data-toggle="modal" class="semibold">Sign up to get started</a></span>
					</p>
					<?php $this->endWidget(); ?>
				</div>
				<!--/ Login form -->
			</div>
		</div>

		<!-- START modal Popup for signup  -->
		<div id="bs-modal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bgcolor-teal border-radius">
						<button data-dismiss="modal" class="close mt5" type="button">×</button>
						<div style="font-size:16px;" class="pull-left ico-user22 mr10 mt5"></div>
						<h4 class="semibold modal-title">Sign Up</h4>
					</div>
					<?php $form=$this->beginWidget('CActiveForm', array('id'=>'signup-supplier', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate'))); ?>
					<div class="modal-body">
						<div class="form-group mb10">
							<div class="col-md-12">
								<div class="alert alert-dismissable alert-danger signup_error_container">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
									<div id="signup_errors"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 mb5">
									<label class="control-label">First Name
										<span class="text-danger">*</span>
									</label>
									<div class="has-icon pull-right">
										<?php echo $form->textField($users,'display_name',array('placeholder'=>"First Name",'class'=>'form-control','required'=>'required','data-parsley-type'=>"alphanum",'data-parsley-minlength'=>"2"));?>

										<!--<i class="ico-checkmark form-control-icon icon-top"></i>-->
									</div>
								</div>
								<div class="col-sm-6 mb5">
									<label class="control-label">Last Name
										<span class="text-danger">*</span>
									</label>
									<div class="has-icon pull-right">
										<?php echo $form->textField($users,'role',array('placeholder'=>"Last Name",'class'=>'form-control','required'=>'required','data-parsley-type'=>"alphanum",'data-parsley-minlength'=>"2"));?>
										<!--<i class="ico-checkmark form-control-icon icon-top"></i>-->
									</div>
								</div>
							</div>
						</div>
						<div class="form-group mb10">
							<div class="row">
								<div class="col-sm-6 mb5">
									<label class="control-label">Email
										<span class="text-danger">*</span>
									</label>
									<div class="has-icon pull-right">
										<?php echo $form->textField($users,'username',array('placeholder'=>"Username / email",'class'=>'form-control','required'=>'required','data-parsley-type'=>"email",'id'=>'usernameL')); ?>
										<i class="ico-user2 form-control-icon"></i>
									</div>
								</div>
								<div class="col-sm-6 mb5">
									<label class="control-label">Password
										<span class="text-danger">*</span>
									</label>
									<div class="has-icon pull-right">
										<?php echo $form->passwordField($users,'password',array('placeholder'=>"Password",'class'=>'form-control','required'=>'required',"data-parsley-minlength"=>"6"));?>
										<i class="ico-lock4 form-control-icon"></i>
									</div>
								</div>
							</div>
						</div>
                        <div class="form-group mb10">
                            <div class="row">
                            <div class="col-sm-6 mb5"></div>
                            <div class="col-sm-6 mb5"></div>
                            </div>
                        </div>
						<p class="text-center text-grey9">By clicking on "Sign Up" below, you agree to the
							<a href="javascript:void(0);" data-toggle="modal" data-target="#bs-modal-lg">Terms &amp; Conditions</a>.</p>
					</div>
					<div class="modal-footer">
						<?php echo CHtml::submitButton( 'Sign Up',array( 'id'=>'signupButSat','class'=>'btn btn-success')); ?>
					</div>
					<?php $this->endWidget(); ?>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!--/ END modal -->

		<!-- START modal popup for forgot password-->
		<?php echo $this->renderPartial("_forgot_password",array("forgot"=>$forgot)); ?>
		<!--/ END modal -->
		<?php echo $this->renderPartial("_terms_n_conditions") ?>
		
		<!-- START modal -->

<!--/ END modal -->

		
</section>
<style type="text/css">
	.signup_error_container {
		display: none;
	}
</style>




<script type="text/javascript">
	var isErrorInForm = false;
	$(document).ready(function () {
		$('.signup_error_container').hide();
		var signupForm = $("#signup-supplier").parsley();
		$("#signup-supplier").on('submit', function (e) {
			console.log("submitting form");
			return false;
		});
		$("#signupButSat").on('click', function (e) {
			console.log("submitting signup form ");
			$("#signup-supplier").submit();
			var that = $("#signup-supplier");
			console.log(signupForm.isValid());
			if (!signupForm.isValid()) {
				console.log("Invalid form");
				return false;
			}
			else {
				$("#signupButSat").val("Please wait ..").attr("disabled");
				$('.signup_error_container').hide();

				$.ajax({
					type: 'POST',
					url: "<?php echo CController::createUrl('/site/supplier');?>",
					data: that.serialize(),
					success: function (data) {
						console.log("data recieved " + JSON.stringify(data));
						var htm = "";
						var parsedData = JSON.parse(data);
						var messageData = parsedData.Success;
						$('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
						if (parsedData.iserror) {
							messageData = parsedData.errors;
							$('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
							$("#signupButSat").removeAttr("disabled").val("Sign Up");
						}
						console.log("message data1 : " + messageData[0]);
						htm += messageData.msg + "<br />";


						$("#signup_errors").html(htm);
						$('.signup_error_container').show();

						if (!parsedData.iserror) {
							e.preventDefault();

							console.log("ready to redirect");

							setTimeout(redirectToURL, 5000);
							$("#signupButSat").removeAttr("disabled").val("Sign Up");
						} else {
							console.log("Not redirecting ");
						}

						return false;
					},
					error: function (a, b, c) {
						console.log("Server error ");
					}
				});
			}

		});
		


	});


	function redirectToURL() {
		var redirectURL = "<?php echo CController::createUrl('/site/supplier');?>";
		window.location.href = redirectURL;
	}
</script>
