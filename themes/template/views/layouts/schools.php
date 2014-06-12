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
    <link href="<?php echo $path;?>/css/dashboard.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $path;?>/js/html5shiv.js"></script>
      <script src="<?php echo $path;?>/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<?php  $this->Widget('WidgetSchoolMenu'); ?>
	<section class="school-dashboard">	 	
		<div class="row back-bg mr0 fix-height-school-div">		 
				<?php echo $content;?>
		</div>	 
	</section>
	 
	<footer id="footer" class="row color mr0">
		 <div class="container">
	
			<!-- <ul class="footer nav navbar-nav">
            
				<li><a class="pull-left" href="#about">Home</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">About</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Services</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Experts</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Tour</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Assessment Test</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Take Test</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">FAQ's</a><i class="pull-right border-l">|</i></li>
				<li><?php echo CHtml::Ajaxlink('Contacts',array('site/contact'),array('class'=>'pull-left'));?></li>
				
				
			</ul>-->
		</div>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $path;?>/js/bootstrap.min.js"></script>
	<script type="text/javascript"  src="<?php echo $path;?>/js/rating.js"></script>
	<script type="text/javascript"  src="<?php echo $path;?>/js/school-custom.js"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-51104088-1', 'gudaak.com');
ga('send', 'pageview');
</script>
	<!-- end Scripts -->
  </body>
</html>
