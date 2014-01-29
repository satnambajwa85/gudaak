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
    <link href="<?php echo $path?>/css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $path?>/js/html5shiv.js"></script>
      <script src="<?php echo $path?>/js/respond.min.js"></script>
    <![endif]-->
  </head>
<?php $action	=	Yii::app()->controller->action->id;
if($action	==	'forgetPassword'||'userRegister'){
$activeClass='back-bg';
}
if($action	==	'index'||'about'){
$activeClass='no-back-bg';
}
?>
<body class="<?php echo $activeClass;?>">
	<div class="container">

		      <!-- Static navbar -->
		 <div class="navbar navbar-default">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		         
		        </div>
		        <div class="navbar-collapse collapse">
		          <ul class="nav navbar-nav top-nav-bar">
		            <li><?php echo Chtml::ajaxLink('What is Gudaak',array('site/WhatIsGudaak'),array('update'=>'#renderpartial'))?><li>
					</li>
		            <li><?php echo Chtml::ajaxLink('Why Gudaak',array('site/WhyGudaak'),array('update'=>'#renderpartial'))?></li>
		            <li><?php //echo CHtml::link('<i class="icon-circle big-circle"></i>',array('site/'),array('style'=>'color:#fff;left: 142px;position: absolute;top: -66px;background:none repeat scroll 0 0 rgba(0, 0, 0, 0);'))?></li>
					 <div align="center">
						<?php echo CHtml::link('<div class="top-logo"></div>',array('site/'));?>
				   </div>
				   </ul>
				   <ul class="pull-right navigation-bt">
						 <?php if((Yii::app()->user->id) && (Yii::app()->user->userType=='user' or Yii::app()->user->userType=='admin' )){ ?>
						<li><?php	echo CHtml::link('&nbsp;<i class="glyphicon glyphicon-user"></i>&nbsp;Dashboard',array('user/'),array('class'=>'btn-talk white-text btn btn-warning'));?></li>
						<li><?php	echo CHtml::link('&nbsp;<i class="glyphicon glyphicon-off "></i>&nbsp;Logout',array('site/logout'),array('class'=>'btn-talk white-text btn btn-warning'));?></li>
						
							<?php } else{ ?>
						<li>
							<?php echo CHtml::link('Join Us!','#',array('class'=>'btn-talk white-text btn btn-warning home-login-box'));?>
										 
						</li>
						<li><?php echo CHtml::link('<i class="poorimg-top glyphicon glyphicon-comment"></i><i class="glyphicon glyphicon-comment"></i>Lets Talk!','#',array('class'=>'btn-talk white-text btn btn-warning'));?>
						</li>
						<?php	} ?>
				  </ul>
		          <ul class="nav navbar-nav navbar-right">
					<li><a href="#">School</a></li>
					 <li><a href="#">Student/Parents</a></li>
		          </ul>
				 
		        </div><!--/.nav-collapse -->
		  </div>
    </div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="slides">
     	<?php echo $content;?>
    </div>
	<div class="clear"></div>
	<footer id="footer">
		<div class="clear"></div>
		 <div class="container">
			 <div class="hot-link-icon">
				<ul>
					<li><?php echo CHtml::link('<i class="glyphicon glyphicon-cloud-upload"></i>',array(''),array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Assess'));?></li>
					<li><?php echo CHtml::link('<i class="glyphicon glyphicon-globe"></i>',array(''),array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Explore'));?></li>
					<li><?php echo CHtml::link('<i class="glyphicon glyphicon-glass"></i>',array(''),array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Approach'));?></li>
				
				</ul> 
				<ul class="pull-right">
					<li><a href="<?php echo Yii::app()->session['setting']['fb_link'];?>" target="_blank"><i class="icon-facebook"></i></a></li>
					<li><a href="<?php echo Yii::app()->session['setting']['twittwe_link'];?>" target="_blank"><i class="icon-twitter"></i></a></li>
					<li><a href="<?php echo Yii::app()->session['setting']['linkedin_link'];?>" target="_blank"><i class="icon-linkedin"></i></a></li>
					
				
				</ul>
			 </div>
			 <div class="clear"></div>
			
			 <ul class="footer nav navbar-nav">
            
				<li><?php echo CHtml::link('Home',array('site/'),array('class'=>'pull-left'))?><i class="pull-right border-l">|</i>
				</li>
				<li><?php echo CHtml::link('about',array('site/about'),array('class'=>'pull-left'));?><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Services</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Experts</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Tour</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Assessment Test</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Take Test</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">FAQ's</a><i class="pull-right border-l">|</i></li>
				<li><?php echo CHtml::link('Contacts',array('site/contact'),array('class'=>'pull-left'));?></li>
				
				
			</ul>
			<span class="pull-right">&copy;&nbsp;<?php echo CHtml::link(''.Yii::app()->session['setting']['title'].'',array('/site'))?></span>
		</div>
    </footer>

   
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
								<?php $login=new LoginForm;  $form=$this->beginWidget('CActiveForm', array(
																	'id'=>'login-form',
																	'action'=>Yii::app()->createUrl('/site/login'),
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
						<?php echo CHtml::Link("Forget password?",CController::createUrl('site/forgetPassword'),array('class'=>'forget pull-left'));
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
				</div>

				<?php echo CHtml::link('Back to home','',array('class'=>'btn btn-info back-bt','data-dismiss'=>'modal'));?>
				</div>
			 <div class="col-md-6  pull-right">	
			<?php 
				$model=new Register; $form=$this->beginWidget('CActiveForm', array(
														'id'=>'user-register',
														'action'=>Yii::app()->createUrl('/site/UserRegister'),
													    'enableClientValidation'=>true,
														'clientOptions'=>array(
																'validateOnSubmit'=>true,
																
															)
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
				<?php 
					/*echo CHtml::ajaxLink('Check User', CHtml::normalizeUrl(array('site/CheckUser')), 
							 array(
							   'data'=>'js:jQuery(this).parents("form").serialize()+"&isAjaxRequest=1"',               
							   'success'=>
										  'function(data){
												$("#searchResult").html(data);
												$("#searchResult").fadeIn();
												return false;
										   }'    
						 
							 ), 
							 array(
								'id'=>'ajaxSubmit',
								'class'=>'btn btn-primary pull-right',
								'name'=>'ajaxSubmit'
							 )); 

						echo '<div class="span4 pull-right alert alert-info" id="searchResult" style="display:none;"></div>';*/
				
				echo $form->textField($model,'gudaak_id',array('class'=>'form-control','placeholder'=>'Gudaak ID','autofocus'=>true));
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
	   
			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
</div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <link href="<?php echo $path?>/css/bootstrap-switch.min.css" rel="stylesheet">
    <script src="<?php echo $path?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $path?>/js/bootbox.js"></script>
	<script src="<?php echo $path?>/js/bootstrap-switch.min.js"></script>
    <script src="<?php echo $path?>/js/index.js"></script>
    <script src="<?php echo $path?>/js/custom.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.scrollbox.js" type="text/javascript"></script>
<!-- sometime later, probably inside your on load event callback -->
<script>

</script>
<?php echo Yii::app()->request->pathInfo;?>
  </body>
</html>
