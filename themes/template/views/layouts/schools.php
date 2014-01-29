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
    <link href="<?php echo $path;?>/css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $path;?>/js/html5shiv.js"></script>
      <script src="<?php echo $path;?>/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
					      <!-- Static navbar -->
		 <section class="navbar navbar-default mr0 backskyblue ">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		         
		        </div>
		        <div class="pd0 navbar-collapse collapse">
					<!-- Logo -->
		          	<div class="logo2 col-md-2">
						<?php echo CHtml::link('<img alt="" src="'.$path.'/images/logo.png">',array('/site'));?>
					</div><!-- Logo -->
					<!-- start Navigation -->
					<div class="col-md-10  pull-left">
						<div class="col-md-12 fl pd0">
							<div class="col-md-4 pd0 pull-left">
								<h1 class="crumb-title">School Admin-Student Details</h1>
							</div>
							<div class="pd0 col-md-8 pull-left top-nav-section">
								<ul class="nav pull-left ">
									<li>
										<i class="pull-left icon-microphone icon-top"></i>
											<a class="pull-left" href="#">Student Details</a>
											
									</li>
									<li>
										<i class="pull-left icon-microphone icon-top"></i>
										<?php echo CHtml::link('School profile',array('school/profile'),array('class'=>'pull-left'));?>
										
											
									</li>
								</ul>
								<div class="pd0 pull-left col-md-6 ">
											<div class="pd0 col-md-12 pull-left">
												<div class="welcome-school  col-md-9">
														<?php echo CHtml::link('<img src="/gudaak/uploads/user/small/1389866774.jpg" alt="Lucky Singh">',array('school/'),array('class'=>'userImage pull-left'));?>
											
												
													<span>Welcome</span>
													<h3>Lucky</h3>
												</div>
												
											 
												<div class="pd0 br-left col-md-3  pull-left">
																	
												<?php echo CHtml::link('Logout',array('site/logout'),array('class'=>'schoo-bt-color btn pull-right'));?>
												</div>
											
											</div>
											
								</div>
							</div>
						</div>
					</div>
				   <!-- end Navigation -->
		         
				 
		        </div><!--/.nav-collapse -->
		 
		</section>
	
	<section class="school-dashboard">	 	
		<div class="row back-bg mr0">		 
				<?php echo $content;?>
		</div>	 
	</section>
	 
	<footer id="footer" class="row color mr0">
		 <div class="container">
	
			 <ul class="footer nav navbar-nav">
            
				<li><a class="pull-left" href="#about">Home</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">About</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Services</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Experts</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Tour</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Assessment Test</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Take Test</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">FAQ's</a><i class="pull-right border-l">|</i></li>
				<li><?php echo CHtml::link('Contacts',array('site/contact'),array('class'=>'pull-left'));?></li>
				
				
			</ul>
		</div>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $path;?>/js/bootstrap.min.js"></script>
	<script type="text/javascript"  src="<?php echo $path;?>/js/custom.js"></script>
	<script type="text/javascript"  src="<?php echo $path;?>/js/jcarousels.js"></script>
	 <!-- jquery jcarousel -->
<script type="text/javascript">

	jQuery(document).ready(function() {
			jQuery('#mycarousel').jcarousel();
	});
	
	jQuery(document).ready(function() {
			jQuery('#mycarouseltwo').jcarousel();
	});
	
</script>

	<!-- end Scripts -->
  </body>
</html>
