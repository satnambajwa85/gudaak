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
	if($action=='index4'){
		$css	=	'main';
	}
	if($action=='index3'){
		$css	=	'index2';
	}
	if($action=='index2'){
		$css	=	'index2';
	}	
	if($action=='index'){
		$css	=	'index';
	}	
	if($action=='schools'||$action=='students'||$action=='why'||$action=='what'||$action=='error'){
		$css	=	'erternalPages';
	}
	

?>
  </head>
<body id="<?php echo $css;?>">
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
                         <?php if((Yii::app()->user->id) && (Yii::app()->user->userType=='user' or Yii::app()->user->userType=='admin' or Yii::app()->user->userType=='school' )){ ?>
					 <li>
						<?php if(Yii::app()->user->userType=='school'){?>
						<?php echo CHtml::link('&nbsp;<i class="glyphicon glyphicon-user"></i> Dashboard',array('school/'),array('class'=>'join_us'));?></li>
                    <?php }else{ ?>
						<?php echo CHtml::link('&nbsp;<i class="glyphicon glyphicon-user"></i> Dashboard',array('user/'),array('class'=>'join_us'));?></li>
                    <?php } ?>
					<li><?php echo CHtml::link('&nbsp;<i class="glyphicon glyphicon-off"></i> Logout',array('site/logout'),array('class'=>'join_us'));?></li>
							<?php } else{ ?>
					<li><?php echo CHtml::link('Join Us!','javaScript:void(0);',array('class'=>'join_us home-login-box'));?></li>
					<li><?php echo CHtml::link('Login','#',array('class'=>'join_us home-login-box login_us'));?></li>
						<?php	} ?>       
			 
					
					</ul>
					</div>
				</div>
			</div>
		 
		   <!-- Static navbar -->
		<!-- <div class="navbar navbar-default">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		         
		        </div>
		        <div class="navbar-collapse collapse">
		         

		          
				 
		        </div>
		  </div>-->
   
    <!-- Main jumbotron for a primary marketing message or call to action -->
       	<div id="renderpartial" class="site-container">
	   <?php echo $content;?>
	   </div>
    <div id="footer_2">
    	<div id="footer_cont">
        	<div class="footer_2">
            	<div class="footer_2left">
                	<span>
                    <?php if($action=='index'||$action=='index2'||$action=='index3'){ ?>
                    
                    	<?php echo CHtml::link('',array('site/index'),array('class'=>''.(Yii::app()->controller->action->id=='index')?'assestActive':'assest1'.'','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Assess'));?>
						<?php echo CHtml::link('<i class="icon-globe"></i>',array('site/index2'),array('class'=>''.(Yii::app()->controller->action->id=='index2')?'assest2Active':'assest2'.'','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Explore'));?>
						<?php echo CHtml::link('B',array('site/index3'),array('class'=>''.(Yii::app()->controller->action->id=='index3')?'assest3Active cup':'assest3 cup'.'','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Approach'));?>
						
                        <?php } ?>
                    </span>
                    <ul>
                        <li><?php echo CHtml::link('Home',array('site/'))?></li>
						<li><a href="javascript:void(0);">|</a></li>
						<li><?php echo CHtml::link('About',array('site/about'))?></li>
                       <li><a href="javascript:void(0);">|</a></li>
                        <li><a href="javascript:void(0);">Service</a></li>
                        <li><a href="javascript:void(0);">|</a></li>
                        <li><a href="javascript:void(0);">Experts</a></li>
                        <li><a href="javascript:void(0);">|</a></li>
                        <li><a href="javascript:void(0);">Tour </a></li>
                        <li><a href="javascript:void(0);">|</a></li>
                        <li><a href="javascript:void(0);">Assessment Test</a></li>
                        <li><a href="javascript:void(0);">|</a></li>
                        <li><a href="javascript:void(0);">Take a test</a></li>
                        <li><a href="javascript:void(0);">|</a></li>
                        <li><?php echo CHtml::Ajaxlink('FAQs','javascript:void(0);');?>
                        </li>
                        <li><a href="javascript:void(0);">|</a></li>
                        <li><?php echo CHtml::link('Contact',array('site/contact'))?></li>
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
<?php if(empty(Yii::app()->user->id)) { ?>
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
                                <div  class="col-md-6 login-box pull-left">
                                    <div id="">
                                        <?php $login=new LoginForm;  
                                        $form=$this->beginWidget('CActiveForm', array(
                                                                        'id'=>'login-form',
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
                                    <?php echo CHtml::Link("Forgot password?",'javascript:void(0);',array('class'=>'forget pull-left','id'=>'forget'));?>
                                    
                                    <div class="clearfix"></div>
                                    <div align="center" class="top-stats-icons mt50">
                                        <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-warning login'));?>
                                        <div class="clearfix"></div>
                                        <!--<div class="or">or</div>-->
                                        <?php //echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('class'=>'btn btn-lg btn-primary fb'));?>
                                        </div>
                                        <?php $this->endWidget(); ?>
                                        <?php $forgetPass=new ForgotpasswordForm;
                                            $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form','action'=>Yii::app()->createUrl('/site/ForgetPassword'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,)));?> 
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
                                        <?php endif; ?>
                                        <div class="pd4"></div>
                                        <?php echo CHtml::Link("Back to login",'javascript:void(0);',array('class'=>'forget pull-left login-visible'));?>
                                        <div class="clearfix"></div>
                                        <div align="center" class="top-stats-icons">
                                            <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-warning login'));?>
                                            <div class="clearfix"></div>
                                            <div class="or">or</div>
                                            <?php echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('class'=>'btn btn-lg btn-primary fb'));?>
                                        </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                                    <?php echo CHtml::link('Back to home','',array('class'=>'btn btn-info back-bt','data-dismiss'=>'modal'));?>
                                </div>
                                <div class="col-md-6  pull-right">
                                <?php $model=new Register; $form=$this->beginWidget('CActiveForm', array(
                                                            'id'=>'user-register',
                                                            'action'=>Yii::app()->createUrl('/site/UserRegister'),
                                                            'enableClientValidation'=>true,
                                                            'clientOptions'=>array('validateOnSubmit'=>true,)));?>
                                    <i class="glyphicon glyphicon-edit orange pull-left"></i>
                                    <h4 class="form-signin-heading ">Enroll your future!!!</h4>
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
                                    <?php echo $form->dropDownList($model,'class',array('10'=>'10th','11'=>'11th','12'=>'12th'),array('class'=>'form-control','placeholder'=>'Mobile','autofocus'=>true));
                                    echo $form->error($model,'class');?>
                                    <div class="pd4"></div>
                                    <?php /*echo CHtml::ajaxLink('Check User', CHtml::normalizeUrl(array('site/CheckUser')), array('data'=>'js:jQuery(this).parents("form").serialize()+"&isAjaxRequest=1"','success'=>'function(data){$("#searchResult").html(data);$("#searchResult").fadeIn();return false;}'),array('id'=>'ajaxSubmit','class'=>'btn btn-primary pull-right','name'=>'ajaxSubmit'));echo '<div class="span4 pull-right alert alert-info" id="searchResult" style="display:none;"></div>';*/
                                    echo $form->textField($model,'gudaak_id',array('class'=>'form-control','placeholder'=>'Gudaak ID','autofocus'=>true));
                                    echo $form->error($model,'gudaak_id');?>
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
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
	
<?php } else{ ?>
<?php } ?>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<link href="<?php echo $path?>/css/bootstrap.css" rel="stylesheet">
   <link href="<?php echo $path?>/css/bootstrap-switch.min.css" rel="stylesheet">
    <script src="<?php echo $path?>/js/bootstrap.min.js"></script>
	<script src="<?php echo $path?>/js/bootstrap-switch.min.js"></script>
    <script src="<?php echo $path?>/js/index.js"></script>
    <script src="<?php echo $path?>/js/custom.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.scrollbox.js" type="text/javascript"></script>
<!-- sometime later, probably inside your on load event callback -->
<!--<script type='text/javascript'>
(function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://widget.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({ c: 'd8b20beb-a91e-4b1c-afad-56b496250b24', f: true }); done = true; } }; })();
</script>-->

<script type='text/javascript'>(function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://widget.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({ c: '87b04e16-7b9c-4d0e-afbd-42f97c59e435', f: true }); done = true; } }; })();</script>

<!--Add the following script at the bottom of the web page-->
<!--<script type="text/javascript" src="https://mylivechat.com/chatinline.aspx?hccid=72556058"></script>-->

  </body>
</html>
