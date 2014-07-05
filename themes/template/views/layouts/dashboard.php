<?php $path	=	Yii::app()->theme->baseUrl;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo Yii::app()->session['setting']['site_meta']?>">
    <meta name="author" content="">
    <title><?php echo CHtml::encode($this->pageTitle);?></title>
    <!-- Bootstrap core CSS -->
	<link href="<?php echo $path;?>/css/dashboard.css" rel="stylesheet">
	<link href="<?php echo $path;?>/css/style.css" rel="stylesheet">
	<link href="<?php echo $path;?>/css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $path;?>/js/html5shiv.js"></script>
      <script src="<?php echo $path;?>/js/respond.min.js"></script>
    <![endif]-->
<?php Yii::app()->clientScript->registerScript('myHideEffect','$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',CClientScript::POS_READY);
Yii::app()->clientScript->registerScript('myHideEffect2','$(".flash-error").animate({opacity: 1.0}, 3000).fadeOut("slow");',CClientScript::POS_READY);?>
</head>
<body style="width:1347px; margin:0 auto;" onunload="window.opener.reload();">
<?php 
if(isset($_REQUEST['fb']) && $_REQUEST['fb']==1)
echo '<script type="text/javascript">
		window.opener.location.reload(true);
		window.close();		
	</script>';?>

    <div class="wrapper">
	<?php  $this->Widget('WidgetDashboardMenu'); ?>
	<section class="main-section">
		<div class="left-main">
			<div class="w100 fl color">
						<div class="white-text mt10 fl">
						<?php echo $this->pageTitle;?>
                        </div>
						<div class="pull-right dashbord-top-nav ">
							<ul class="nav  top-nav-left pull-left">
							  <li><i class="icon-microphone icon-top talk-icon"></i><?php echo CHtml::link('Talk to Counsellor',array('user/talk'));?></li>
							  <li><i class="news-icon"></i><?php echo CHtml::link('Notifications',array('user/newsUpdates'));?></li>
							  <li><i class="summary-icon"></i><?php echo CHtml::link('Summary',array('user/summary'));?></li>
							</ul>
							<div class="top-stats-icons fr social-icon-links mr12">
								<a href="<?php echo Yii::app()->session['setting']['fb_link'];?>" target="_blank">
									<i class="icon-facebook"></i>
								</a>								
							</div>
						</div>
						 
				
			</div>
			<div class="white mr0">
				 
				<?php echo $content;?>

		</div>
		</div>
	</section>
	</div>
	<footer id="footer" class="row color mr0">
		 <div class="container">
	
			 <ul class="dashboard-footer nav navbar-nav">
            
				<li><?php echo CHtml::link('Home',array('site/'),array('class'=>'pull-left'));?><i class="pull-right border-l">|</i></li>
				<li><?php echo CHtml::link('About',array('/site/about'),array('class'=>'pull-left'));?><i class="pull-right border-l">|</i></li>
				<!--<li><a class="pull-left" href="#about">Services</a><i class="pull-right border-l">|</i></li>
				<li><a class="pull-left" href="#about">Experts</a><i class="pull-right border-l">|</i></li>-->
				<li><?php echo CHtml::link('Tour',array('user/tour'),array('class'=>'pull-left'));?><i class="pull-right border-l">|</i></li>
				<!--<li><a class="pull-left" href="#about">Assessment Test</a><i class="pull-right border-l">|</i></li>-->
				<li><?php echo CHtml::link('Take Test',array('user/tests'),array('class'=>'pull-left'));?><i class="pull-right border-l">|</i></li>
				<!--<li><a class="pull-left" href="#about">FAQ's</a><i class="pull-right border-l">|</i></li>-->
				<li><?php echo CHtml::link('Contacts',array('site/contact'),array('class'=>'pull-left'));?></li>
				
				
			</ul>
		</div>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo $path;?>/js/bootstrap.min.js"></script>
	<script src="<?php echo $path;?>/js/profle-pop-up.js"></script>
	<script src="<?php echo $path;?>/js/jquery-ui-1.10.3.custom.js"></script>
	<script type="text/javascript"  src="<?php echo $path;?>/js/dashboard-custom.js"></script>
	<script type="text/javascript"  src="<?php echo $path;?>/js/rating.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.scrollbox.js" type="text/javascript"></script>
	
<script src="<?php echo $path;?>/js/jquery-ui-1.10.3.custom.js"></script>
<!-- jquery jcarousel --> 

<!-- end Scripts --> 
<script type="text/javascript">
 var url	=	'<?php echo Yii::app()->createUrl('/user/userProfileUpdate');?>';
 var test	=	'<?php echo Yii::app()->createUrl('user/test');?>';
<?php if(Yii::app()->user->hasFlash('redirect')): ?>
alert("<?php echo Yii::app()->user->getFlash('redirect'); ?>");
<?php endif; ?>	

</script>

<?php  $this->Widget('WidgetUserProfile'); ?>
<script>
function RefreshParent() {
	if (window.opener != null && !window.opener.closed) {
		window.opener.location.reload();
	}
}
window.onbeforeunload = RefreshParent;

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-51104088-1', 'gudaak.com');
ga('send', 'pageview');
</script>
  </body>

</html>
