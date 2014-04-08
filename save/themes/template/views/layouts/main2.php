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
    <link href="<?php echo $path?>/css/main-style-sheet.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $path?>/js/html5shiv.js"></script>
      <script src="<?php echo $path?>/js/respond.min.js"></script>
    <![endif]-->

  </head>
<body id="main2">
	<div class="mt60">
  <!-- Main jumbotron for a primary marketing message or call to action -->
       	<div id="renderpartial" class="container">
	   <?php echo $content;?>
	   </div>
    <div id="footer_2" class="green-bg">
    	<div id="footer_cont">
        	<div class="footer_2">
            	<div class="footer_2left">
                	 
                    <ul class="li-white-text pdbottom">
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
                        <li><a href="javascript:void(0);">FAQs</a></li>
                        <li><a href="javascript:void(0);">|</a></li>
                        <li><?php echo CHtml::link('Contact',array('site/contact'))?></li>
                    </ul>
                </div>
                <div class="footer_2right ">
                    <p class="white-color">&copy; Gudaak.com</p>
                </div>
            </div>
        </div>
    </div>
	 

	 </div>

    <!-- Placed at the end of the document so the pages load faster -->
   <link href="<?php echo $path?>/css/bootstrap-switch.min.css" rel="stylesheet">
    <script src="<?php echo $path?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $path?>/js/bootbox.js"></script>
	<script src="<?php echo $path?>/js/bootstrap-switch.min.js"></script>
    <script src="<?php echo $path?>/js/index.js"></script>
    <script src="<?php echo $path?>/js/custom.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.scrollbox.js" type="text/javascript"></script>
<!-- sometime later, probably inside your on load event callback -->
  </body>
</html>
