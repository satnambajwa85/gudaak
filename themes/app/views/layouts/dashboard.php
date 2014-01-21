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
	<div class="wrapper">
	<?php  $this->Widget('WidgetDashboardMenu'); ?>
	<section class="main-section">
		<div class="container">
			<div class="row color">
						<div class="col-md-8 pull-right">
							<ul class="nav nav-pills top-nav-left pull-left">
							  <li><i class="icon-microphone icon-top"></i><a href="#">Talk to Counsellor</a></li>
							  <li><i class="glyphicon glyphicon-list-alt icon-top"></i><a href="#">News and Updates</a></li>
							  <li><i class="glyphicon glyphicon-list-alt icon-top"></i><a href="#">Summary</a></li>
							 
							  
							</ul>
							<div class="top-stats-icons fr">
								<a href="<?php echo Yii::app()->session['setting']['fb_link'];?>" target="_blank">
									<i class="icon-facebook"></i>
								</a>
								<a href="<?php echo Yii::app()->session['setting']['twittwe_link'];?>" target="_blank">
									<i class="icon-twitter"></i>
								</a>
								<a href="<?php echo Yii::app()->session['setting']['linkedin_link'];?>" target="_blank">
									<i class="icon-linkedin"></i>
								</a>
					
								 
								
							</div>
						</div>
						 
				
			</div>
			<div class="row white">
				<div class="col-xs-12 col-sm-6 col-md-5 pull-left dashboard-logo white">
					<div class="dashboard-logo  pull-left">
						<img src="<?php echo $path;?>/images/dashboard-logo.png"/>
					</div>
					<div>
						<h1>Stream Explore</h1>
						<span>It is long established fact a reader will be It is long established fact a reader will be
								It is long established fact a reader will be 
						</span>
						
						<a href="#">Konw more about stream explore</a>
					</div>
				</div>
				<div class="row col-xs-12 col-sm-6 col-md-7 pull-right banner">
					<img src="<?php echo $path;?>/images/banner.png"/>
				</div>
				<div class="clearfix"></div>
				<?php echo $content;?>

		</div>
		</div>
	</section>
	</div>
	<footer id="footer" class="row color">
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
				<li><a class="pull-left" href="#about">Contacts</a></li>
				
				
			</ul>
		</div>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $path;?>/js/bootstrap.min.js"></script>
	<script type="text/javascript"  src="<?php echo $path;?>/js/script.js"></script>
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
