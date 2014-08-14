<!DOCTYPE html>
<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta language="eng">

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/> 

        <title>Venturepact | Software Development as a Service</title>
        <meta name="description" content="Adminre admin dashboard">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
       
        <!--/ END META SECTION -->
        <!-- START STYLESHEETS -->
        <!-- Library stylesheet : mandatory -->
        
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/magnific-popup.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/css/selectize.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/css/jquery-ui.min.css">
        <!--/ Library stylesheet -->
        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/layout.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/uielement.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/custom_sa.css">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->
        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/library/modernizr/js/modernizr.min.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
		<style type="text/css">
			.errordialog{
				position:fixed; width:100%; border-bottom:1px solid black; background:lightyellow; left:0; top:0; padding: 3px 0; text-indent: 5px; font: normal 11px Verdana;z-index:99999;
		}
            
	</style>
    </head>
    <!--/ END Head -->
    <body data-page="form-wizard">
    	<div class="loader_outr" id="ajaxLoadingDiv">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/greenloader.gif" />
        </div>
      <header id="header" class="navbar navbar-fixed-top">
            <!-- START navbar header -->
            <div class="navbar-header">
                <!-- Brand -->
                <?php echo CHtml::link('<span class="template-logo"></span>', array('index'),array('class'=>"navbar-brand"));?>
                <!--/ Brand -->
            </div>
            <!--/ END navbar header -->

            <!-- START Toolbar -->
            <div class="navbar-toolbar clearfix">
                <!-- START Left nav -->
                <ul class="nav navbar-nav navbar-left">
                    <!-- Offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main hidden-lg hidden-md">
                        <a href="javascript:void(0);" data-toggle="offcanvas" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-left3"></i></span>
                            </span>
                        </a>
                    </li>
                   
                    <li class="navbar-main hidden-lg hidden-md">
                        <a href="javascript:void(0);" data-toggle="offcanvas" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-left3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas left -->

                    <!-- Message dropdown -->
                    <li class="dropdown custom">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bubbles2"></i></span>
                            </span>
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Messages</span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- Message list -->
                                <div class="media-list" id="chatmessages">
                                	
									 
										<div class="col-md-11" style="margin-left:3%; margin-top:39%;">
											<div class="alert alert-dismissable alert-danger">
												<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
												You have no message yet. Add a new job to get in touch with service providers. 
											</div>
										</div>
									 

                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Message dropdown -->

                    <!-- Notification dropdown -->
                    <li class="dropdown custom">
                        <a href="javascript:void(0);" class="dropdown-toggle padding_lr5" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bell"></i></span>
                            </span>
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title" id="notificationCount">Notifications (0)</span>
                                <span class="option text-right"></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- Message list -->
                                <div class="media-list">
                                	<div class="col-md-11" style="margin-left:3%; margin-top:39%;">
											<div class="alert alert-dismissable alert-danger">
												<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
												You have no notifications yet.
											</div>
										</div>
								</div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                   
                 
                </ul>
                <!--/ END Left nav -->

                <!-- START navbar form -->
                
                <!-- START navbar form -->

                <!-- START Right nav -->
                <ul class="nav navbar-nav navbar-right">
                   

                    <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                     <li class="dropdown profile">
                        <a href="<?php echo Yii::app()->createUrl('site/login'); ?>">
                            <span class="meta">
                                <span class="text hidden-xs hidden-sm">Already Signed Up?</span>
                            </span>
                        </a>
                       </li>
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="text hidden-xs hidden-sm">Need Help? Call Us</span>
                            </span>
                        </a>
                        <ul role="menu" class="dropdown-menu" style="min-width:180px">  
                            <li>
                            	


                        <div class="col-sm-12 pa5">
                            <div style="" class="media-object col-sm-3 pl0 pr0 ">
                                                        <img width="35px;" height="35px;" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/needhelp_img.jpg" class="img-circle" alt="Need Help">
                                                    </div>
                            
                            <div class="media-body col-sm-9 pl0 pr0" style="">
                                                        <span class="media-heading semibold">Saket</span><br>
                                                        <span class="media-meta ellipsis text-default f_s11 semibold">Client Success Team</span><br>
<!--                                                        <span class="media-meta ellipsis text-primary f_s11 semibold"  href="/index.php?r=site/login">Schedule a Call</span><br>-->

                                <script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script>
<div style="display:none;"><script id="hideScript">var hideButton = new timelyButton('vp', { buttonId: 'hideScript' });</script></div>
<a href="#" onclick="hideButton.start();">Schedule a Call</a>
                                
<!--                                <span class="media-meta ellipsis text-primary f_s11 semibold"  href="#" onclick="hideButton.start();">Book now</span><br>-->
                                
                                                        <span class="media-meta ellipsis text-default f_s11 semibold">or Call Us: 949.791.7659</span><br>
                                                    </div>
                            </div>
                            </li>
                            

                            <!--<li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>-->
                        </ul> 
                    </li>
                    <!--/ Offcanvas right -->
                     <!-- Profile dropdown -->
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
							<?php
							if(isset(Yii::app()->user->role))
							{
							$imag	=	(Yii::app()->user->role=='client')?((!empty($profile->image))?$profile->image:''):((!empty($profile->logo))?$profile->logo:'');
							}
							else
							{
								$imag	=	"";
							}
							if($imag=='')
								$imag	=	Yii::app()->baseUrl.'/uploads/client/small/avatar.png';?>
							
                            <span class="avatar">
								<img src="<?php echo (strpos($imag,'avatar.png'))?$imag:$imag;?>" class="img-circle" alt="" height= "35px" width="150px" />
							</span>
                            <span class="text hidden-xs hidden-sm"><?php echo ((isset($profile->first_name))?$profile->first_name:'').' Hello, '.((isset($profile->last_name))?$profile->last_name:' Guest');?></span>
                                <span class="arrow"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?php echo CHtml::link('<span class="icon"><i class="ico-user-plus2"></i></span>Register', array('/site/login'));?></li>
                           
                            <!--<li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>-->
                        </ul>
                    </li>
                    <!--/ Profile dropdown -->
                </ul>
                <!--/ END Right nav -->
            </div>
            <!--/ END Toolbar / link -->
        </header>
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
        <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <!-- START Template Navigation/Menu -->
                 <ul id="nav" class="topmenu">
                   <!-- <li class="menuheader">MAIN MENU</li>-->
                    <li style="position:fixed;">
                       <div style="color:#666;padding-top: 20px;padding-left: 23px;">
                            <span class="figure" style="font-size:14px; margin-right:5px;"><i class="ico-home2"></i></span>
                            <span class="text">Dashboard</span>
                           </div> 
                        
                    </li>
                   </ul>
                <!--/ END Template Navigation/Menu -->
            </section>
            <!--/ END Sidebar Container -->
        </aside>
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        
        <section id="main" >
            <!-- START Template Container -->
              <?php echo $content;?>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
         <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
                
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->
        <aside class="sidebar sidebar-right">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <!-- START Sidebar Profile -->
                <!-- START Panel -->
                <div class="panel">
                    <!-- thumbnail -->
                    <div class="thumbnail">
                        <!-- media -->
                        <div class="media">
                            <!-- meta -->
                            <span class="meta text-center">
                                <h5 class="semibold mb0">Erich Reyes</h5>
                                <p class="nm"><i class="ico-user7 mr5"></i>Administrator</p>
                            </span>
                            <!-- meta -->
                            <!-- indicator -->
                            <div class="indicator"><span class="spinner"></span></div>
                            <!--/ indicator -->
                            <img data-toggle="unveil" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/background/400x250/placeholder.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/image/background/400x250/background3.jpg" alt="Cover" width="100%">
                        </div>
                        <!--/ media -->
                    </div>
                    <!--/ thumbnail -->
                    <!-- panel body -->
                    <div class="panel-body" style="margin-top:-55px;z-index:2;">
                        <ul class="list-unstyled">
                            <li class="text-center">
                                <img class="img-circle" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar7.jpg" alt="" width="75px" height="75px">
                                <br>
                                <!-- dropdown -->
                                <div class="btn-group mt10">
                                    <button type="button" class="btn btn-default"><span class="hasnotification hasnotification-success mr5"></span>Online</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Away</a></li>
                                        <li><a href="#">Offline</a></li>
                                        <li><a href="#">Busy</a></li>
                                    </ul>
                                </div>
                                <!--/ dropdown -->
                            </li>
                        </ul>
                    </div>
                    <!--/ panel body -->
                </div>
                <!--/ END Panel -->
                <!--/ END Sidebar Profile -->

                <!-- START Sidebar contact -->
                <div class="media-list media-list-contact">
                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar1.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Autumn Barker</span>
                            <span class="media-meta ellipsis">Malaysia</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar2.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Giselle Horn</span>
                            <span class="media-meta ellipsis">Bolivia</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Austin Shields</span>
                            <span class="media-meta ellipsis">Timor-Leste</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Caryn Gibson</span>
                            <span class="media-meta ellipsis">Libya</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar3.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Nash Evans</span>
                            <span class="media-meta ellipsis">Honduras</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar4.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Josiah Johnson</span>
                            <span class="media-meta ellipsis">Belgium</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Philip Hewitt</span>
                            <span class="media-meta ellipsis">Bahrain</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar5.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Wilma Hunt</span>
                            <span class="media-meta ellipsis">Dominica</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar6.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Noah Gill</span>
                            <span class="media-meta ellipsis">Guatemala</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar8.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> David Fisher</span>
                            <span class="media-meta ellipsis">French Guiana</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar9.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Samantha Avery</span>
                            <span class="media-meta ellipsis">Jersey</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Madaline Medina</span>
                            <span class="media-meta ellipsis">Finland</span>
                        </span>
                    </a>
                </div>
                <!--/ END Sidebar contact -->
            </section>
            <!--/ END Sidebar Content -->
        </aside>
        <!--/ END Template Sidebar (right) -->

		<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Library script : mandatory -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-ui-touch.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/core/js/core.min.js"></script>
<!--/ Library script -->

<!-- 3rd party plugin script : optional(per use) -->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/steps/js/jquery.steps.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/inputmask/js/inputmask.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/scroller.js"></script>
<!--<script type="text/javascript" src="<?php //echo Yii::app()->theme->baseUrl; ?>/javascript/page.js"></script>-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/validate.js"></script>
<!--<script type="text/javascript" src="<?php //echo Yii::app()->theme->baseUrl; ?>/javascript/filepicker.js"></script>-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script>
<!--<script src="http://brianreavis.github.io/selectize.js/js/selectize.js"></script>-->


<script type="text/javascript">

function OpenFile(URL,height,width) 
{
	var File = window.open(URL,"","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width="+width+",height="+height+"");
}

function SaveToDisk(fileUrl, fileName) 
{
	var browser=getBrowser();
	console.log(browser);
	
	if(browser=="Safari")
	{
		try
		{
		var save = document.createElement('a');
        save.href = fileUrl;
        save.target = '_blank';
        save.download = fileName || fileUrl;
        var evt = document.createEvent('MouseEvents');
        //evt.initMouseEvent('click', true, true, window, 1, 0, 0, 0, 0,false, false, false, false, 0, null);
		evt.initEvent('click' ,true ,true);
        save.dispatchEvent(evt);
		var objectURL = window.URL.createObjectURL(fileName);
        (objectURL).revokeObjectURL(save.href);
		}
		catch(e)
		{
			console.log('safari not supporting save due to '+e);
		}
	}
	else
	{
		var hyperlink = document.createElement('a');
		hyperlink.href = fileUrl;
		hyperlink.target = '_blank';
		hyperlink.download = fileName || fileUrl;

		var mouseEvent = new MouseEvent('click', {
		view: window,
		bubbles: true,
		cancelable: true
		});

		hyperlink.dispatchEvent(mouseEvent);
		(window.URL || window.webkitURL).revokeObjectURL(hyperlink.href);
	}
}



(function($){
	
	
	$('.client_dashboard_scoller').enscroll({
		showOnHover: true,
		verticalTrackClass: 'track3',
		verticalHandleClass: 'handle3'
	}); 
	
	$('#scrollbox6').enscroll({
		showOnHover: true,
		verticalTrackClass: 'track3',
		verticalHandleClass: 'handle3'
	});
	$('#scrollbox7').enscroll({
		showOnHover: true,
		verticalTrackClass: 'track3',
		verticalHandleClass: 'handle3'
	});
	$('#scrollbox8').enscroll({
		showOnHover: true,
		verticalTrackClass: 'track3',
		verticalHandleClass: 'handle3'
	});
	})(jQuery);

var errordialog=function(msg, url, linenumber){
	var dialog=document.createElement("div")

	dialog.className="errordialog hide"
	dialog.innerHTML="<b style='color:red'>JavaScript Error: </b>" + msg +" at line number " + linenumber +". Please inform Venturepact."
	document.body.appendChild(dialog);
	return true;
}

$(document).ready(function(){

	//New code added to scroll the div on the top
	$("#main").scrollTop(0);
	
	//Code to say no data found for category of rfp
	$("#components li,#faq li a").click(function(e){
        $("[data-target^=#p_]").parent().parent().find("li").removeClass("active2")
		if(e.isDefaultPrevented())
			e.preventDefault()
		var el = $(this);
		//console.log("outer li " + el.html() + " /" +e.isDefaultPrevented() );
		$("#components li,#faq li").each(function(){
			$(this).removeClass("activeLink");
		});
		el.addClass("activeLink");
	});

	$("#rfps li").click(function(e){
			e.preventDefault();
			var el = $(this);
			//console.log("outer li " + el.html());
			$("#rfps li").each(function(){
				$(this).removeClass("active");
			});
			el.addClass("active");
			el.parent().parent().addClass("active");
		});
		/*$("#rfps li [id^=project] li").click(function(e){
			var el = $(this);
			//console.log("inner li " + el.html());
			$("#rfps li [id^=project] li").each(function(){
				$(this).removeClass("active");
			});
			$("#rfps li [id^=project] li").first().addClass("active");
		});*/

		$("[data-target^=#p_]").click(function(e){
            e.preventDefault();
            var el = $(this);
            var elclass= el.parent().attr("class") ;
            console.log(elclass);
            el.parent().parent().find("li").removeClass("active2");
            el.parent().addClass("active2");
            if(elclass=="")
                el.parent().addClass("active2");
        });
        $("[id^=p_] a").on('click',function(){
            $("[id^=p_] a").parent().removeClass("active2");
            $(this).parent().addClass("active2") ;

        });
        $("#rfps").delegate("li","click",function(){
            var len = $(this).find("ul li").length;
            var msg = "";

            if(len == 0)
                msg="<strong></strong> Currently, you have no jobs or projects at this stage.";
            else
                msg="<strong></strong> Please select a project and click on 'Project Info'.";

            var htm='<div class="col-md-12 pl10 pr10 pt10"><div class="alert alert-dismissable alert-info"> '+msg+'</div></div>';
            $("#content").html('').append(htm);
        });

});

function notificationRead(){
	$.ajax({
		type:'POST',
		url:"<?php echo CController::createUrl("/site/notifictaion");?>",
		success:function(data){
			$('.hasnotification').removeClass('hasnotification');
			$('#notificationCount').html('Notifications (0)');
			$('#notificationCountTop').hide();
		}
	});
	$( "#ajaxLoadingDiv" ).hide();
}

$( document ).ajaxStart(function() {
	$( "#ajaxLoadingDiv" ).show(); 
});
$( document ).ajaxStop(function() {
	$( "#ajaxLoadingDiv" ).hide(); 
});

function hideNotification()
{
	console.log("hiding ");
	setTimeout(function() {
		$(".errordialog").hide('blind', {}, 500);
		$(".signup_error_container").hide('blind', {}, 500);
	});
}
$(document).unload(function(){
	$( "#ajaxLoadingDiv" ).show();
});
$(document).ready(function(){
	$( "#ajaxLoadingDiv" ).hide(); 
});

function getBrowser()
{
var navigatorVersion = navigator.appVersion;
var navigatorAgent = navigator.userAgent;
var browserName = navigator.appName;
var fullVersionName = '' + parseFloat(navigator.appVersion);
var majorVersionName = parseInt(navigator.appVersion, 10);
var nameOffset, verOffset, ix;
 
// In Firefox, the true version is after "Firefox" 
if ((verOffset = navigatorAgent.indexOf("Firefox")) != -1) {
    browserName = "Firefox";
    fullVersionName = navigatorAgent.substring(verOffset + 8);
}
// In MSIE, the true version is after "MSIE" in userAgent
else if ((verOffset = navigatorAgent.indexOf("MSIE")) != -1) {
    browserName = "Microsoft Internet Explorer";
    fullVersionName = navigatorAgent.substring(verOffset + 5);
}
 
// In Chrome, the true version is after "Chrome" 
else if ((verOffset = navigatorAgent.indexOf("Chrome")) != -1) {
    browserName = "Chrome";
    fullVersionName = navigatorAgent.substring(verOffset + 7);
}
 
// In Opera, the true version is after "Opera" or after "Version"
else if ((verOffset = navigatorAgent.indexOf("Opera")) != -1) {
    browserName = "Opera";
    fullVersionName = navigatorAgent.substring(verOffset + 6);
    if ((verOffset = navigatorAgent.indexOf("Version")) != -1)
        fullVersionName = navigatorAgent.substring(verOffset + 8);
}
 
// In Safari, the true version is after "Safari" or after "Version" 
else if ((verOffset = navigatorAgent.indexOf("Safari")) != -1) {
    browserName = "Safari";
    fullVersionName = navigatorAgent.substring(verOffset + 7);
    if ((verOffset = navigatorAgent.indexOf("Version")) != -1)
        fullVersionName = navigatorAgent.substring(verOffset + 8);
}
 
// In most other browsers, "name/version" is at the end of userAgent 
else if ((nameOffset = navigatorAgent.lastIndexOf(' ') + 1) <
          (verOffset = navigatorAgent.lastIndexOf('/'))) {
    browserName = navigatorAgent.substring(nameOffset, verOffset);
    fullVersionName = navigatorAgent.substring(verOffset + 1);
    if (browserName.toLowerCase() == browserName.toUpperCase()) {
        browserName = navigator.appName;
    }
}
// trim the fullVersionName string at semicolon/space if present
if ((ix = fullVersionName.indexOf(";")) != -1)
    fullVersionName = fullVersionName.substring(0, ix);
if ((ix = fullVersionName.indexOf(" ")) != -1)
    fullVersionName = fullVersionName.substring(0, ix);
 
majorVersionName = parseInt('' + fullVersionName, 10);
if (isNaN(majorVersionName)) {
    fullVersionName = '' + parseFloat(navigator.appVersion);
    majorVersionName = parseInt(navigator.appVersion, 10);
}

return browserName;
}

</script>

<!--<script src="<?php //echo Yii::app()->theme->baseUrl; ?>/javascript/notification.js"></script>
--><script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/jquery.magnific-popup.min.js" ></script>
<script type="application/javascript">
$(document).ready(function(){
	$("#main").magnificPopup({
	delegate: ".magnific",
	type: "image",
	gallery: {
		enabled: true
	}
});
});

</script>
<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('9619-816-10-5151');/*]]>*/</script><noscript><a href="https://www.olark.com/site/9619-816-10-5151/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->


<script type="text/javascript" defer>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35066643-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<script type="text/javascript">

		(function($){
                try
				{
					//var $jq=$.noConflict();
					$("html").Core({ "console": false });
				}
				catch(e1)
				{
				alert(e1);
				}
            })(jQuery);
</script>
</body>
</html>
