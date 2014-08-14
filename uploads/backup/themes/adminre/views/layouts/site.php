<!DOCTYPE html>
<!-- 
TEMPLATE NAME : Adminre - Responsive Admin Template build with Twitter Bootstrap 3.1.1
CURRENT VERSION : 1.0.0
AUTHOR : pampersdry
CONTACT : pampersdry@gmail.com

** A license must be purchased in order to legally use this template for your project **
** PLEASE SUPPORT ME. YOUR SUPPORT ENSURE CONTINUITY OF THIS PROJECT **
-->
<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta language="eng">

		<link rel="icon"  href="/favicon.ico">
 
        <title>Venturepact | Software Development as a Service</title>
        <meta name="description" content="Adminre admin dashboard">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">

       <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php //echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php //echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php //echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php //echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="<?php //echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon.png">-->
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- 3rd party plugin stylesheet : optional(per use) -->
       <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/css/selectize.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/css/jquery-ui.min.css">
        <!--/ Library stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/layout.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/uielement.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/custom_sa.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/selectize.bootstrap3.css">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->

        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/library/modernizr/js/modernizr.min.js"></script>
        
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery.min.js"></script>
        <script>
			
			$(document).ready(function(){
			    $("#show").click(function(){
				$(".showdiv").slideToggle(700);
			  });
			});
		</script> 

        
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->
    <body data-page="form-element">

             <!-- START Template Container -->
           	<section class="col-lg-12 logo-header">
                <!-- START row -->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <!-- Brand -->
                        <div class="text-center" style="margin-bottom:15px;  margin-top:15px;">
                            <?php echo CHtml::link('<span class="login-logo login-logo-inverse"></span>', array('index'));?>
                            
                            <!--<h5 class="semibold text-muted mt-10">Login to your account.</h5>-->
                        </div>
                    </div>
                </div>
                <!--/ END row -->
            </section>
            
            <?php echo $content;?>
        <!--/ END Template Container -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-ui-touch.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/core/js/core.min.js"></script>
        <!--/ Library script -->

        <!-- app init script -->
        <script type="text/javascript">
		//$.noConflict(true);
		//var $=$.noConflict(false);
		//var $=$.noConflict();
		//var $ = jQuery.noConflict(true);
		       (function($){
                try
				{
					$("html").Core({ "console": false });
				}
				catch(e1)
				{
				}
            })(jQuery);
        </script>
        <!--/ app init script -->

        <!-- 3rd party plugin script : optional(per use) -->
       <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/parsley/js/parsley.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/steps/js/jquery.steps.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/inputmask/js/inputmask.min.js"></script>

		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script>
		<!--<script src="http://brianreavis.github.io/selectize.js/js/selectize.js"></script>-->

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/validate.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/scroller.js"></script>
        

        <!--/ 3rd party plugin script -->
        <!--/ END JAVASCRIPT SECTION -->
		
		<!-- Ajax Dynamic Loading section Start -->
		
		<div id="ajaxLoadingDiv">
			<div id="ajaxLoader"></div>
		</div>
		<!-- Ajax Dynamic Loading section End -->

<!--UserSnap Feedback Script Added-->
<!--
<script type="text/javascript">
 (function() {
   var s = document.createElement("script");
   s.type = "text/javascript";
   s.async = true;
   s.src = '//api.usersnap.com/load/5495aaa2-974c-40e2-b740-5fd72b1a30be.js';
   var x = document.getElementsByTagName('head')[0];
   x.appendChild(s);
 })();
</script>
-->
<!--UserSnap Feedback Script Ends Here-->
		
		<script type="text/javascript">
		$( "#ajaxLoadingDiv" ).hide(); 
		$( document ).ajaxStart(function() {
 			$( "#ajaxLoadingDiv" ).show(); 
		});
		$( document ).ajaxStop(function() {
 			$( "#ajaxLoadingDiv" ).hide(); 
		});

		</script>
        <script type="text/javascript"> 
			(function () {		
			
			//$("#satnam").selectize();
			//$("#sandeep").selectize();
			
			
			
			})();
</script>
        
    </body>
</html>
