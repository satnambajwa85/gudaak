<?php $path	=	Yii::app()->theme->baseUrl;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
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

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav top">
            
            <li><a href="#about">What is Gudaak</a></li>
            <li><a href="#about">Why Gudaak</a></li>
            <li><a href="#about">How it works</a></li>
            <li>&nbsp;</li>
            <li>&nbsp;</li>
            <li><a href="#about">Assess</a></li>
            <li><a href="#about">Explore</a></li>
            <li><a href="#about">Approach</a></li>
            <li><button type="button" class="btn btn-warning">Join Us!</button></li>
		  </ul>
          
        </div><!--/.navbar-collapse -->
      </div>
    </div>
	<div class="clear"></div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
		<?php echo $content;?>
      </div>
    </div>
   
	<footer id="footer" class="row">
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
   <!-- <script src="js/jquery.js"></script>-->
   <link href="<?php echo $path?>/css/bootstrap-switch.min.css" rel="stylesheet">
    <script src="<?php echo $path?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $path?>/js/bootbox.js"></script>
	<script src="<?php echo $path?>/js/bootstrap-switch.min.js"></script>
    <script src="<?php echo $path?>/js/index.js"></script>
  </body>
</html>
