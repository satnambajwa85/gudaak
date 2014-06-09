<?php $path	=	Yii::app()->theme->baseUrl;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo Yii::app()->session['setting']['site_meta']?>">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="ico/favicon.png">-->
    <title><?php echo CHtml::encode($this->pageTitle);?></title>
    <!-- Bootstrap core CSS -->
	<script src="<?php echo $path?>/js/bootbox.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $path?>/images/favicon.ico">
    <link href="<?php echo $path?>/css/main-style-sheet.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $path?>/js/html5shiv.js"></script>
      <script src="<?php echo $path?>/js/respond.min.js"></script>
    <![endif]-->
<?php $action	=	Yii::app()->controller->action->id;
	$css	='';
	if($action=='index4')
		$css	=	'main';
	if($action=='approach')
		$css	=	'index2';
	if($action=='explore')
		$css	=	'index2';
	if($action=='assess')
		$css	=	'index';
	if($action=='index')
		$css	=	'index';
	if($action=='schools'||$action=='students'||$action=='why'||$action=='what'||$action=='error'||$action=='articals')
		$css	=	'erternalPages';?>
</head>
<body id="<?php echo $css;?>" style="width:1347px; margin:0 auto; ">
	<div>
		<div id="">
			<div id="header_cont">
				<div class="header">
					<ul class="left_nav1">
	<li><?php echo CHtml::link('Why Gudaak',array('site/why'),array('class'=>''.(Yii::app()->controller->action->id=='why')?'white-text':''.''));?></li>
	<li><?php echo CHtml::link('What is Gudaak',array('site/what'),array('class'=>''.(Yii::app()->controller->action->id=='what')?'white-text':''.''))?></li>
					</ul>
					<ul class="center-logo">
	<li><?php echo CHtml::link('<img src="'. Yii::app()->theme->baseUrl.'/images/logo2.png" alt="logo" />',array('/'),array('class'=>'logo'));?></li>
					</ul>
					<ul class="right_nav">
	<li><?php echo CHtml::link('School',array('site/schools'),array('class'=>''.(Yii::app()->controller->action->id=='schools')?'white-text':''.''));?></li>
	<li><?php echo CHtml::link('Student/Parents',array('site/students'),array('class'=>''.(Yii::app()->controller->action->id=='students')?'white-text':''.''));?></li>
	<?php if(isset(Yii::app()->user->id) && isset(Yii::app()->user->userType) && (Yii::app()->user->userType=='upper11th' or Yii::app()->user->userType=='admin' or Yii::app()->user->userType=='below10th' or Yii::app()->user->userType=='school')){ ?>
	<li><?php if(Yii::app()->user->userType=='school'){ echo CHtml::link('&nbsp;<i class="glyphicon glyphicon-user"></i> Dashboard',array('school/'),array('class'=>'join_us'));?></li>
	<?php }else{ echo CHtml::link('&nbsp;<i class="glyphicon glyphicon-user"></i> Dashboard',array('user/'),array('class'=>'join_us'));?></li>
	<?php } ?>
	<li><?php echo CHtml::link('&nbsp;<i class="glyphicon glyphicon-off"></i> Logout',array('site/logout'),array('class'=>'join_us'));?></li>
	<?php } else{ ?>
	<li><?php echo CHtml::link('Join Us!','javaScript:void(0);',array('class'=>'join_us home-login-box'));?></li>
	<li><?php echo CHtml::link('Login','#',array('class'=>'join_us login-boot-box login_us'));?></li>
    <?php	} ?>       
    				</ul>
				</div>
			</div>
		</div>
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div id="renderpartial" class="site-container">
			<?php echo $content;?>
		</div>
		<div id="footer_2">
			<div style="float:left; width:100%; padding-left:32%; padding-top:5%;">
				<div class="bottomTool">
					<?php if($action=='assess'||$action=='explore'||$action=='approach'||$action=='index'){
						echo CHtml::link('',array('site/assess'),array('class'=>''.(Yii::app()->controller->action->id=='assess')?'assestActive':'assest1'.'','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Assess'));
						echo CHtml::link('',array('site/explore'),array('class'=>''.(Yii::app()->controller->action->id=='explore')?'assestActive3':'assest3'.'','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Explore'));
						echo CHtml::link('',array('site/approach'),array('class'=>''.(Yii::app()->controller->action->id=='approach')?'assestActive2':'assest2'.'','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Approach'));
					} ?>
				</div>
			</div>
			<div id="footer_cont">
				<div class="footer_2">
					<div class="footer_2left">
						<ul>
							<li><?php //echo CHtml::link('Articles',array('site/articles'))?></li>
                            <!--<li><a href="javascript:void(0);">|</a></li><li><?php echo CHtml::link('Contact',array('site/contact'))?></li>-->
						</ul>
					</div>
                	<div class="footer_2right">
                		<ul>
                    		<li><a href="<?php echo Yii::app()->session['setting']['fb_link'];?>" target="_blank" class="fb_icon"></a></li>
                    	    <li><a href="<?php echo Yii::app()->session['setting']['twittwe_link'];?>" target="_blank" class="tw_icon"></a></li>
                    	    <li><a href="<?php echo Yii::app()->session['setting']['linkedin_link'];?>" target="_blank" class="li_icon"></a></li>
                    	</ul>
                    	<p>&copy; Gudaak.com</p>
                	</div>
				</div>
			</div>
		</div>
	</div>
	<!-- set up the modal to start hidden and fade in and out -->
    <div id="myModal" class="modal fade">
    	<div class="modal-dialog">
        	<div class="modal-content border-layer">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
                            	<div class="hide-overflow2" style="top:-20px;z-index:0"></div>
								<div id="alert-confirm-gudaak-id " class=" col-md-12 login-box confirm-gudaak remove hide">
									<h2> Do you have Gudaak ID?</h2>
									
									<a id="gudaakIdYes" href="javaScript:void(0);" class="white-text btn btn-warning ">Yes</a>
									<a id="gudaakIdNo" data-dismiss="modal" data-trigger="expand" href="javaScript:void(0);" class="white-text btn btn-warning ">No</a>
								</div>
								<div id="confirm-gudaak-id" class="show">
                                
                                <div class="col-md-12  pull-right">
                                <?php $model=new Register; $form=$this->beginWidget('CActiveForm', array(
                                                            'id'=>'user-register',
                                                            'action'=>Yii::app()->createUrl('/site/UserRegister'),
                                                            'enableClientValidation'=>true,
                                                            'clientOptions'=>array('validateOnSubmit'=>true,)));?>
                                    <i class="glyphicon glyphicon-edit orange pull-left"></i>
                                    <h4 class="form-signin-heading ">Enroll !!!</h4>
									  
									<div class="col-md-6 input-mar pull-left">
                                    <?php echo $form->textField($model,'first_name',array('class'=>'form-control mar-b16','placeholder'=>'First Name','autofocus'=>true));
                                    echo $form->error($model,'first_name');?>
									</div>
									<div class="col-md-6 input-mar pull-left">
										<?php echo $form->textField($model,'last_name',array('class'=>'form-control mar-b16','placeholder'=>'Last Name','autofocus'=>true));
										echo $form->error($model,'last_name');?>
									</div>
									 <div class="col-md-6 input-mar pull-left ">
                                     <div class="col-md-9 pd0 pull-left">
                                    <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                                    'model'=>$model,
                                                                    'attribute'=>'date_of_birth',
                                                                    'options'=>array('dateFormat'=>'yy-mm-dd',
																					'yearRange'=>'1970:2014',
                                                                                    'changeMonth'=>'true',
                                                                                    'changeYear'=>'true',),
                                                                    'htmlOptions'=>array('class'=>'dob form-control mar-b16','style'=>'width:72%',
                                                                                        'placeholder'=>'DOB','autofocus'=>false),));?>	
																						 <?php echo $form->error($model,'date_of_birth');?>
									</div>
									<div class="fr dimension-box">
                                    <?php echo $form->checkBox($model,'gender',array('id'=>'dimension-switch'));?>
									</div>
									</div>
                                   <div class="clear"></div>
                                    <div class="col-md-6 input-mar pull-left">
                                    <?php echo $form->textField($model,'email',array('class'=>'form-control mar-b16','placeholder'=>'Email','autofocus'=>true));
                                    echo $form->error($model,'email');?>
									</div>
                                    <div class="col-md-6 input-mar pull-left">
                                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control mar-b16','placeholder'=>'Password','autofocus'=>true));
                                    echo $form->error($model,'password');?>
									</div>
                                    <div class="col-md-6 input-mar pull-left">
                                    <?php echo $form->passwordField($model,'confirmpass',array('class'=>'form-control mar-b16','placeholder'=>'confirm password','autofocus'=>true));
                                    echo $form->error($model,'confirmpass');?>
									</div>
                                    <div class="clear"></div>
                                    <div class="col-md-12">
                                    <?php echo CHtml::link('Register with <i class="posi-bt icon-facebook"></i>',array('site/facebook'),array('class'=>'btn btn-lg btn-primary fb1','style'=>'margin-left: 150px;'));?>
									</div>
                                    
                                    <div class="col-md-12">
									<div class="col-md-4 pull-left pd0">
										  <?php echo CHtml::link('Back','',array('class'=>'btn fl back-register-bt btn-info','data-dismiss'=>'modal'));?>
									</div>
                                    <div class="col-md-4 pull-right pd0">
									    <?php echo CHtml::submitButton('Register',array('class'=>'btn fr btn-warning login '));?>
									</div>
									</div>
								 
                                <?php $this->endWidget();?>
                            </div>
								</div>
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
 	<div id="login-boot-box" class="modal fade">
    	<div class="modal-dialog">
        	<div class="modal-content border-layer">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
                            	<div class="hide-overflow2" style="top:-20px;z-index:0"></div>
							
								<div  class="col-md-6 login-box pull-left col-md-offset-3 min-height-login">
                                    <div id="">
                                        <?php $login=new LoginForm;  
                                        $form=$this->beginWidget('CActiveForm', array(
                                                                        'id'=>'login-form2',
                                                                        'action'=>Yii::app()->createUrl('/site/login'),
                                                                        'enableClientValidation'=>true,
                                                                        'clientOptions'=>array('validateOnSubmit'=>true,)));?>
                                    <i class="icon-key orange pull-left"></i>
                                    <h4 class="form-signin-heading ">Login</h4>
                                    <?php echo $form->textField($login,'email',array('class'=>'form-control','placeholder'=>'Email address','autofocus'=>true));
                                    echo $form->error($login,'email');?>
                                    <div class="pd4"></div>
                                    <?php echo $form->PasswordField($login,'password',array('class'=>'form-control','placeholder'=>'Password'));
                                    echo $form->error($login,'password');?>
                                    <div class="pd4"></div>
                                    <?php echo CHtml::Link("Forgot password?",'javascript:void(0);',array('class'=>'forget2 pull-left','id'=>'forget2'));?>
                                     <?php echo CHtml::Link("New user?",'javascript:void(0);',array('class'=>'home-login-box pull-right','data-dismiss'=>'modal'));?>
                                    
                                    <div class="clearfix"></div>
                                    <div align="center" class="top-stats-icons ">
                                        <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-warning login'));?>
                                        <div class="clearfix"></div>
                                        <!--<div class="or">or</div>-->
                                        <?php //echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('class'=>'btn btn-lg btn-primary fb'));?>
                                        </div>
                                        <?php $this->endWidget(); ?>
                                        <?php $forgetPass=new ForgotpasswordForm;
                                            $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form2','action'=>Yii::app()->createUrl('/site/ForgetPassword'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,)));?> 
                                            <i class="icon-key orange pull-left"></i>
                                            <h4 class="form-signin-heading ">Get your forgot password</h4>
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
                                        <?php endif; ?>
                                        <div class="pd4"></div>
                                        <?php echo CHtml::Link("Back to login",'javascript:void(0);',array('class'=>' backto forget pull-left login-visible'));?>
                                        <div class="clearfix"></div>
                                        <div align="center" class="top-stats-icons">
                                            <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-warning login'));?>
                                            <div class="clearfix"></div>
                                            <!--<div class="or">or</div>-->
                                            <?php // echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('class'=>'btn btn-lg btn-primary fb'));?>
                                        </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                                    <?php echo CHtml::link('Back','',array('class'=>'btn btn-info back-bt','data-dismiss'=>'modal'));?>
                                </div>
                       		
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
	
 
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<link href="<?php echo $path?>/css/bootstrap.css" rel="stylesheet">
   <link href="<?php echo $path?>/css/bootstrap-switch.min.css" rel="stylesheet">
    <script src="<?php echo $path?>/js/bootstrap.min.js"></script>
	<script src="<?php echo $path?>/js/bootstrap-switch.min.js"></script>
    <script src="<?php echo $path?>/js/index.js"></script>
    <script src="<?php echo $path?>/js/custom.js"></script>
    <script src="<?php echo $path?>/js/custom2.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.scrollbox.js" type="text/javascript"></script>
<script type='text/javascript'>
(function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://widget.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({ c: '87b04e16-7b9c-4d0e-afbd-42f97c59e435', f: true }); done = true; } }; })();</script>
<!--Add the following script at the bottom of the web page-->
<!--<script type="text/javascript" src="https://mylivechat.com/chatinline.aspx?hccid=72556058"></script>-->
	<div id="popup_box">    <!-- OUR PopupBox DIV-->
			<img src="<?php echo Yii::app()->theme->
			baseUrl;?>/images/gudaak-pointer.png"/>
	</div>
  </body>
</html>
