<!DOCTYPE html>
<html lang="en">
<head>
    <title>Venturepact | Software Development as a Service</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="VenturePact: Find Top Software Development Firms" />
    <meta property="og:type" content="Article" />
    <meta property="og:url" content="http://venturepact.com/" />
    <meta property="og:image" content="http://venturepact.com/fb_post_small.jpg" />
    <meta property="og:description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team." />
    <meta property="og:site_name" content="VenturePact" />
    <meta name="keywords" content="custom software development, website design development, graphics website designe mobile apps development" />
    <meta name="distribution" content="global" />

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

<!-- Bootstrap core CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/css/settings.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/google-code-prettify/prettify.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.2" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/css/color/blue.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/type/fontello.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/type/picons.css" rel="stylesheet">
<!-- CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/css/index.css" type="text/css" rel="stylesheet"/> 
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="style/js/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/main/css/simpletextrotator.css" />
</head>
<body class="onepage full-layout">
<div id="home" class="body-wrapper">
  <div class="yamm navbar basic default">
    <div class="navbar-header">
      <div class="container">
        <div class="basic-wrapper"> <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a>
		<?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/main/style/images/logo@2x.png" data-at2x="'.Yii::app()->theme->baseUrl.'/main/style/images/logo@2x.png" alt="venturepact_logo" />', array('index'),array('class'=>'navbar-brand logo_rm'));?></div>
        
		<div class="collapse navbar-collapse">          
			<ul class="nav navbar-nav">
				<li><a href="#section_1"></a></li>
				<li><a href="#section_2">Why</a></li>
				<li><a href="#section_3">How it works</a></li>
				<li><a href="#section_4">Services</a></li>
				<li><a href="#section_5">Our service providers</a></li>			 			
			</ul>
			<ul class="nav navbar-nav pull-right mr">
				<li class="signin"><?php echo CHtml::link('<span class="">Sign In</span>', array('/site/login'));?></li>
				<li class="developers"><a href="<?php echo $this->createUrl("site/supplier");?>"><span class="">For Developers</span></a></li> 			
			</ul>
        </div>
		
      </div>
    </div>
    <!--/.nav-collapse --> 
  </div>
  <!--/.navbar -->
  <div class="offset"></div>
  <!--<section id="intro"  class="wraper bg-raw  fbscroll_item">-->
  		<section id="section_1"  class="wraper bg-raw  fbscroll_item">
			<div class="text_heading" style="margin-top:0%; margin-bottom:0%;">
<!--
				<h1 class="demo1" style="font-size:30">Building software for your <span class="color:red">Business?</span></h1>
				<h4 style="">Discover, compare & engage with pre-screened & trusted software development firms.</h4>
-->

                <h1 class="demo1" style="font-size:30">Software Development <span style="color:#17A78B">as a Service</span></h1>
				<h4 style="">Find premium software firms to develop your product or scale your team.</h4>

				<div class="button_position">
				  
					<?php echo(Yii::app()->user->name!='Guest')? CHtml::link('<span class="btn btn-large btn-green btn-padd align_margin">Get Started</span>', array('/site/login')): CHtml::link('<span class="btn btn-large btn-green btn-padd align_margin">Get Started</span>', array('/site/newProject'));?>
                    <a href="#section_8"><span class="btn btn-border-light btn-padd learn_more_btn align_margin">Learn More</span></a>
                </div>
                
				<!--<h4 style="">
                Get Vetted Proposals&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Read Past Client Reviews&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                100% free For You
                </h4>-->
                <div class="row">
                    <!--<div class="col-sm-4 col" style="margin-bottom:0px;">
                        <h4 style="font-size:14px"><i style="color: #17A78B;" class="icon-check-1"></i>&nbsp;&nbsp;Get Vetted Proposals</h4>
                    </div>
                    <div class="col-sm-4 col" style="margin-bottom:0px;">
                    	<h4 style="font-size:14px"><i style="color: #17A78B;" class="icon-star-empty"></i>&nbsp;&nbsp;Read Past Client Reviews</h4>
                    </div>  -->                                    
                    <div class="col-sm-4 col" style=""></div>
                    <div class="col-sm-2 col freefor_you">
                    	<h4 style="font-size:14px; position:relative; top:-15px; left:-10px;"><i style="color: #17A78B;" class="icon-cc-nc"></i>&nbsp;&nbsp;100% Free For You</h4>
                    </div>
                    <div class="col-sm-6 col" style=""></div>                
                </div>

            </div>
      
      
      <!--<div class="text_heading">
      	<h4 class="demo1"><span class="rotate">Chat in real time, Chat in real time, Chat in real time</span></h4>
      </div>-->
      
      
				<article class="cont">

				 <div class="slide-main cbp-so-scroller">
				  
				  <div id="sequence">
				   <ul class="sequence-canvas"  >
						<li>
							  <!--<h1 class="slider_main_header">A product site <br> that <span>inspires</span> you</h1>-->
							 <div class="info" >
							  <img class="slider_main_image" src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/slider-bg3_final.png" alt="img">
							 </div>
							  
							<!-- <div class="slider_p3 text_heading">-->
<!--							 <h4 class="demo1 popup_outer"><span style="color:#6BCCB4;font-weight: bold;">GET&nbsp</span>:&nbsp;&nbsp;&nbsp;  Client <span style="color:#6BCCB4;font-weight: bold;">ratings & reviews</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Validated <span style="color:#6BCCB4;font-weight: bold;">portfolios</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Vetted <span style="color:#6BCCB4;font-weight: bold;">quotes & timelines</span></h4>-->
                                 
<!--                              <div class="popup_arrow" > <img class="slider_main_image" src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/arrow.png" alt="img"></div>-->
							 <!--<img class="slider_arrow" src="<?php //echo Yii::app()->theme->baseUrl; ?>/main/img/arrow1.png" alt="img">-->
							<!--</div>-->
<!--							<div class="slider_p2">
							 <img class="slider_arrow" src="style/images/art/slide_2_2.png" alt="img">
                             <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
							</div>
							<div class="slider_p3">
							 
							 <p>Sed do eiusmod tempor incididunt </p> 
                             <img class="slider_arrow" src="style/images/art/slide_2_4.png" alt="img">
							</div>
-->
						</li>
						
				   </ul>
				  </div>
				 </div>
				</article>
				<div class="polosochka"></div>
		</section>
  <!-- /.fullwidthbanner-container -->
   
        <div id="section_8">
        	<div  class="light-wrapper">
        <div class="container inner">
        <div class="section-title text-center">
        <h2>Our Client  Network</h2>
        <span class="icon"><i class="icon-picons-users-2"></i></span> </div>

        
            <div class="owl-clients carousel-th">
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo4.jpg" alt="athena_health"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo5.jpg" alt="finansbank"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo16.jpg" alt="espn"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo17.jpg" alt="bmw"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo1.jpg" alt="adidas"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo2.jpg" alt="yale_university"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo9.jpg" alt="flipcart"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo6.jpg" alt="ashoka"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo7.jpg" alt="alcatel_lucent"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo13.jpg" alt="bonobos"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo10.jpg" alt="lawdingo"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo12.jpg" alt="seratis"></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/logo11.jpg" alt="firefly"></div>
            </div>
            
        </div>
        </div>
        </div>
        <div id="section_2" class="dark-wrapper">
        <div class="container inner">
        <div class="section-title text-center">
        <h2>Why</h2>
        <span class="icon"><i class="icon-picons-preferences"></i></span> </div>
        <div class="row text-center col-services-2">
        <div class="col-sm-3 col">
        <div class="item bm20"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/img1.png" class="small_img" alt="top_tier_service_providers"></div>
        <h5 class="upper colored">Top tier service providers</h5>
        <p>Each provider is extensively evaluated for quality and track record.</p>
        </div>
        <div class="col-sm-3 col">
        <div class="item bm20"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/img2.png" class="small_img" alt="vetted_proposals"></div>
        <h5 class="upper colored">Vetted proposals</h5>
        <p>Each proposal includes client reviews, portfolios & is vetted for fair pricing.</p>
        </div>
        <div class="col-sm-3 col">
        <div class="item bm20"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/img3.png" class="small_img" alt="intelligent_matching"></div>
        <h5 class="upper colored">Intelligent matching</h5>
        <p>Only meet providers with demonstrated expertise in your specifc domain.</p>
        </div>
        <div class="col-sm-3 col">
        <div class="item bm20"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/img4.png" class="small_img" alt="premium_concierge"></div>
        <h5 class="upper colored">Premium concierge</h5>
        <p>We vet each proposal to ensure fairness and help you negotiate the best deals.</p>
        </div>
        </div>
        </div>
        </div>
  
  
  <div  class="parallax testimonials">
    <div class="container inner text-center">
      <div class="section-title text-center bm20">
        <h2>What Our Customers Think</h2>
        <span class="icon"><i class="icon-picons-quote"></i></span> </div>
      <div id="testimonials" class="tab-container">
        <div class="panel-container">

          <div id="tst1"> VenturePact connected our company with the right web design and web development team. The quality of the work combined with the price was an exceptional value.<span class="author">Kevin Conrad, Gracious Fade</span> </div>

          <div id="tst2"> I love the personal communication and not having to fill out a job description or research whether the companies are legit. It's so nice to simply explain my situation to a person directly, and then get hooked up with reliable companies.<span class="author">Peter LoBlu, AHMaschinenservice</span> </div>

          <div id="tst3">VenturePact made it easy for me to select the most relevant software development firm for my needs. I had a great experience as the team was highly responsive and they felt as good as an in house team. 
<span class="author">Vanessa Carter, Lend for America</span> </div>

        </div>
        <ul class="etabs">
          <li class="tab"><a href="#tst1">1</a></li>
          <li class="tab"><a href="#tst2">2</a></li>
          <li class="tab"><a href="#tst3">3</a></li>
        </ul>
      </div>
    </div>
    <!-- /.container --> 
  </div>
  
  
  <div id="section_3" class="light-wrapper">
    <div class="container inner">
      <div class="section-title text-center bm20">
        <h2>How it works</h2>
        <span class="icon"><i class="icon-picons-list-check"></i></span> </div>
      <div class="thin text-center">
<!--        <p class="lead">1. Define the scope   &#160;&#160;&#160 2. Receive vetted proposals  &#160;&#160;&#160  3. Meet with providers &#160;&#160;&#160   4. Start building!</p>-->
      </div>
      <div class="divide30"></div>
      <div class="steps"> <span class="timeline-border"></span>
        <div class="step even">
          <div class="icon-border"> <i class="icon-picons-article"></i> </div>
          <h5 class="upper">Define the Scope</h5>
          <p>Use our self service platform or schedule a 15 min call to outline your requirements.</p>
        </div>
        <div class="step">
          <div class="icon-border"> <i class="icon-picons-abacus"></i> </div>
          <h5 class="upper">Compare Proposals</h5>
          <p>Get vetted proposals including budgets, timelines, references and portfolios.</p>
        </div>
          <div class="step even">
          <div class="icon-border"> <i class="icon-picons-answer"></i> </div>
          <h5 class="upper">Meet Providers</h5>
          <p>Before deciding, easily communicate with the service providers to clarify terms and features.</p>
        </div>
        <div class="step">
          <div class="icon-border"> <i class="icon-picons-thumbs-up"></i> </div>
          <h5 class="upper">Finalize the Terms</h5>
          <p>Once decided, we help you negotiate service terms & faciliate escrow payments.</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="color-wrapper">
    <div class="container inner text-center">
      <div class="thin">
<!--        <p class="lead">If you like what you see, request quotes.</p>-->
        <?php echo CHtml::link('Get Started', array('/site/newProject'),array('class'=>'btn bm0'));?>
       </div>
    </div>
  </div>
  
  <div id="section_4" class="light-wrapper">
    <div class="container inner">
      <div class="section-title text-center">
        <h2>Services</h2>
        <span class="icon"><i class="icon-picons-preferences"></i></span> </div>
      <div class="col-services">
        <div class="row">
          <div class="col-sm-4">
            <div class="icon"> <i class="icon-picons-mobile-ring icn"></i> </div>
            <!-- /.icon -->
            <div class="text">
              <h5 class="upper">Mobile applications</h5>
<!--              <span>No. of accredited service providers: <span style="font-weight:bold"> 100+</span></span>-->
              <span>Technologies served: <span style="font-weight:bold">iOS, Android, Symbian, Blackberry (6 more)</span></span>
            </div>
            <!-- /.text --> 
          </div>
          <!-- /.col-sm-4 -->
          <div class="col-sm-4">
            <div class="icon"> <i class="icon-picons-laptop-web icn"></i> </div>
            <!-- /.icon -->
            <div class="text">
              <h5 class="upper">Web applications</h5>
<!--              <span>No. of accredited service providers: <span style="font-weight:bold">120+</span></span></span><br>-->
              <span>Technologies served: <span style="font-weight:bold">Ruby, php, Python, Java (32 more)</span></span>
              </div>
            <!-- /.text --> 
          </div>
          <!-- /.col-sm-4 -->
          <div class="col-sm-4">
            <div class="icon"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logos/g_glass.png" alt="google_glass"> </div>
            <!-- /.icon -->
            <div class="text">
              <h5 class="upper">Wearables & Internet of things </h5>
<!--              <span>No. of accredited service providers: <span style="font-weight:bold">30+</span></span></span><br>-->
              <span>Technologies served: <span style="font-weight:bold">Google Glass, Galaxy Watch, iBeacon (12 more)</span></span>
              </div>
            <!-- /.text --> 
          </div>
          <!-- /.col-sm-4 --> 
        </div>
        <!-- /.row -->
        <div class="divide30"></div>
        <div class="row">
          <div class="col-sm-4">
            <div class="icon"> <i class="icon-picons-laptop-statistics icn"></i> </div>
            <!-- /.icon -->
            <div class="text">
               <h5 class="upper">Business applications</h5>
<!--              <span>No. of accredited service providers: <span style="font-weight:bold">50+</span></span></span><br>-->
              <span>Platforms served: <span style="font-weight:bold">SAP, Oracle (16 more)</span></span>
              </div>
            <!-- /.text --> 
          </div>
          <!-- /.col-sm-4 -->
          <div class="col-sm-4">
            <div class="icon"> <i class="icon-picons-image icn"></i> </div>
            <!-- /.icon -->
            <div class="text">
              <h5 class="upper">UI/UX Design</h5>
<!--              <span>No. of accredited design firms: <span style="font-weight:bold">50+</span></span></span><br>-->
              <span>Design categories: <span style="font-weight:bold">SaaS UI/UX, Mobile UI/UX, Mobile & Web Ad design</span></span>
              </div>
            <!-- /.text --> 
          </div>
          <!-- /.col-sm-4 -->
          <div class="col-sm-4">
            <div class="icon"> <i class="icon-picons-database icn"></i> </div>
            <!-- /.icon -->
            <div class="text">
              <h5 class="upper">Big data & data visualization</h5>
<!--              <span>No. of accredited service providers: <span style="font-weight:bold">30+</span></span></span><br>-->
              <span>Technologies served: <span style="font-weight:bold">Hadoop, MapReduce, R (11 more)</span></span>
              </div>
            <!-- /.text --> 
          </div>
          <!-- /.col-sm-4 --> 
            
        </div>
        <!-- /.row --> 
      </div>
      <!-- /.services --> 
<!--
        <div class="text-center">
            <p></p><p></p><p></p><p></p><p></p><p></p>
        <h5 class="author pull-right">and many more..</h5>       </div>
-->
    </div>
  </div>
  
  <div class="dark-wrapper">
    <div class="container inner">
      <div class="section-title text-center bm20">
        <h2>Trending on our blog</h2>
        <span class="icon"><i class="icon-picons-pencil"></i></span> </div>
<!--
      <div class="thin text-center">
        <p class="lead">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Aenean lacinia bibendum consectetur. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vestibulum id ligula porta felis euismod semper.</p>
      </div>
-->
      <div class="divide30"></div>
      <div class="latest-blog-wrapper">
        <div class="latest-blog">
          <div class="post">
            <figure class="icon-overlay medium icn-link w_size100 bm20"><a href="http://blog.venturepact.com/?p=10"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/blog1.jpg" alt="how_fab_has_no_engineers_in_the_us" /></a></figure>
            <div class="post-content w_size100">
              <h3 class="post-title"><a target="_blank" href="http://blog.venturepact.com/?p=10">How Fab has no engineers in the US?</a></h3>
              <div class="meta"><span class="date">13 June, 2014</span></div>
              <p> A.k.a How to outsource successfully?<br> Fab has over 15 million members and processes over $250 million in online transactions -  all without a single engineer in their NY headquarters. So how do they do it?</p>
            </div>
          </div>
          <div class="post">
            <figure class="icon-overlay medium icn-link w_size100 bm20"><a href="http://blog.venturepact.com/?p=38"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/blog2.jpg" alt="beware_of_tech_racism" /></a></figure>
            <div class="post-content w_size100">
              <h3 class="post-title"><a target="_blank" href="http://blog.venturepact.com/?p=38">Beware of Tech Racism</a></h3>
              <div class="meta"><span class="date">16 June, 2014</span></div>
              <p>The first speaker at a tech conference comes up and says that you should never hire your friends. Its the worst thing he did, it caused problems because its hard to be their boss and you’ll treat them differently from other employees.</p>
            </div>
          </div>
<!--
          <div class="post">
            <figure class="icon-overlay medium icn-link"><a href="blog-post.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/b3.jpg" alt="img" /></a></figure>
            <div class="post-content">
              <h3 class="post-title"><a href="blog-post.html">Tristique Purus Pharetra</a></h3>
              <div class="meta"><span class="date">14 Mar, 2013</span></div>
              <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet fermentum.</p>
            </div>
          </div>
          <div class="post">
            <figure class="icon-overlay medium icn-link"><a href="blog-post.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/b4.jpg" alt="img" /></a></figure>
            <div class="post-content">
              <h3 class="post-title"><a href="blog-post.html">Inceptos Porta Nibh</a></h3>
              <div class="meta"><span class="date">23 Dec, 2013</span></span></div>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Curabitur blandit tempus porttitor. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
            </div>
          </div>
-->
        </div>
      </div>
    </div>
  </div>
  
  <div id="section_5" class="black-wrapper">
    <div class="container inner">
      <div class="section-title text-center">
        <h2>Our Service Providers</h2>
        <span class="icon"><i class="icon-picons-diamond"></i></span> </div>
      <div class="owl-portfolio owlcarousel carousel-th">
        <div class="item">
          <figure class=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/logo_1.jpg" alt="burnside_digital" /></figure>
          <div class="image-caption">
            <h3> Burnside Digital</a></h3>
            <span class="meta">Clients: <strong>ESPN, Intel, ChartLogic, Scripps Networks</strong> </span> </div>
            
        </div>
        <!-- /.item -->
        
        <!-- /.item -->
        <div class="item">
          <figure class=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/logo_3.jpg" alt="tmob_tech" /></figure>
          <div class="image-caption">
            <h3>Tmob Tech</h3>
            <span class="meta">Clients:<strong> Vodafone, PNB Paribas, Shell, AtlasJet</strong> </span> </div>
        </div>
        <!-- /.item -->
        <div class="item">
          <figure class=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/logo_4.jpg" alt="nyc_devshop" /></figure>
          <div class="image-caption">
            <h3>NYC Devshop</h3>
            <span class="meta">Clients:<strong> TechDay, Centscere, AdvisorConnect, Shadoobie </strong></span> </div>
        </div>
        <!-- /.item -->
        <div class="item">
          <figure class=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/logo_5.jpg" alt="nano_web_group" /></figure>
          <div class="image-caption">
            <h3>Nano Web Group</h3>
            <span class="meta">Clients:<strong> Michael Todd, Rehabilitations International, Michael F. & Co</strong> </span> </div>
        </div>
        <!-- /.item -->
        <div class="item">
          <figure class=""> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/logo_2.jpg" alt="mavenhive_technologies" /></figure>
          <div class="image-caption">
            <h3>MAVENHIVE TECHNOLOGIES</h3>
            <span class="meta">Clients:<strong> Flipkart, Grasshopper, Ashoka, BarkLoundly </strong></span> </div>
        </div>
        <!-- /.item -->
          
          
         <!-- /.item -->
        <div class="item">
          <figure class=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/logo_6.jpg" alt="freerunning_technologies" /></figure>
          <div class="image-caption">
            <h3>Freerunning Technologies</h3>
            <span class="meta">Clients:<strong>Bonobos, StickerMule  </strong></span> </div>
        </div>
        <!-- /.item -->
        
         <!-- /.item -->
        <div class="item">
          <figure class=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/logo_7.jpg" alt="monitise_create" /></figure>
          <div class="image-caption">
            <h3>Monitise Create</h3>
            <span class="meta">Clients:<strong>Premier Inn, RBS, Samsung </strong></span> </div>
        </div>
        <!-- /.item -->
        
         <!-- /.item -->
        <div class="item">
          <figure class=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/logo_8.jpg" alt="mentormate" /></figure>
          <div class="image-caption">
            <h3>Mentormate</h3>
            <span class="meta">Clients:<strong>MeMeds, DoApp, Crick</strong></span> </div>
        </div>
        <!-- /.item -->

        
        <!-- /.item --> 
      </div>
      <!-- /.owlcarousel -->
      <div class="divide50"></div>
      <div class="text-center"> <a class="btn btn-border-light" href="/index.php?r=site/login">Meet these and hundreds more..</a> </div>
    </div>
  </div>
  
  <div id="section_7" class="dark-wrapper">
  	
    <div class="container inner">
   		<div class="section-title text-center bm20">
        	<h2>As Seen In</h2>
        	<span class="icon"><i class="icon-picons-news"></i></span> 
      	</div>
      	<div class="owl-clients carousel-th">
            <div class="item pt24 text-center" ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/ic11.png" alt="the_economic_times"></div>
            <div class="item pt12 text-center"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/ic12.png" alt="philadelphia_magazine"></div>
            <div class="item text-center"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/ic13.png" alt="technically_philli"></div>
            <!--<div class="item"><img src="<?php //echo Yii::app()->theme->baseUrl; ?>/main/style/images/art/ic14.png" alt="img"></div>  -->
      	</div>
    </div>
  </div>
  

  
  <footer class="black-wrapper">
    <div class="container inner">
      <div class="row">
        <div class="col-sm-4">
          <div class="widget"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logo.png" data-at2x="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logo@2x.png" alt="venturepact_logo" />
            <div class="divide20"></div>
            <p>VenturePact is an online marketplace that connects businesses with pre-screened software development firms.</p>
            <p>The marketplace provides a transparent platform where companies can get customized pitches, see a firm’s ratings, inspect a verified portfolio, get their standard FAQs answered and make secure payments.</p>
            <div class="divide5"></div>
            <ul class="social">
              <li><a href="https://twitter.com/VenturePact" target="_blank"><i class="icon-s-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/VenturePact" target="_blank"><i class="icon-s-facebook"></i></a></li>
              <li><a href="http://www.linkedin.com/company/venturepact" target="_blank"><i class="icon-s-linkedin"></i></a></li>
              <li><a href="http://plus.google.com/+Venturepact/about" target="_blank"><i class="icon-s-gplus"></i></a></li>
            </ul>
          </div>
          <!-- /.widget --> 
        </div>
        <!-- /col -->
        
        <div class="col-sm-4">
          <div class="widget">
            <h3 class="section-title widget-title upper">Popular Posts</h3>
            <ul class="post-list">
              <li>
                <h6><a href="http://venturepact.tumblr.com/post/88497385098/how-fab-has-no-engineers-in-the-us">How Fab has no engineers in the US?</a></h6>
                <em>13th June 2014</em> </li>
              <li>
                <h6><a href="http://venturepact.tumblr.com/post/89139600133/beware-of-tech-racism">Beware of Tech Racism</a></h6>
                <em>16th June 2014</em> </li>
<!--
              <li>
                <h6><a href="blog-post.html">Pellentesque ornare sem lacinia quam</a></h6>
                <em>15th Aug 2012</em> </li>
-->
            </ul>
            <!-- /.post-list --> 
          </div>
          <!-- /.widget --> 
        </div>
        <!-- /col -->
        
        <div class="col-sm-4">
          <div class="widget">
            <h3 class="section-title widget-title upper">Get In Touch</h3>
            <p>Our offices are located in New York City & Philadelphia. Please contact us to setup an in-person meeting or a telephone call.</p>
            <div class="divide10"></div>
            <div class="contact-info"> <i class="icon-location"></i> New York: WeWork, Fulton St. <br/>
                                       <i class="icon-location"></i> Philadelphia: 834 Chestnut Street, Center City. <br/>
              <i class="icon-phone"></i>+1 949-791-7659<br />
              <i class="icon-mail"></i> <a href="mailto:questions@venturepact.com">Questions@VenturePact.com</a> </div>
          </div>
        </div>
        <!-- /col -->
        
        
        <!-- /col --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- .container -->
    
    <div class="sub-footer">
      <div class="container">
        <p class="pull-left">© 2014 Venturepact. All rights reserved.</p>
         <ul class="footer-menu pull-right">
          <li><?php echo CHtml::link('Home', array('/site/index'));?></li>
          <li><?php echo CHtml::link('About', array('/site/about'),array( 'target'=>'_blank'));?></li>
          <li><?php echo CHtml::link('FAQ', array('/site/faq'),array( 'target'=>'_blank'));?></li>
          <li><a target="_blank" href="http://blog.venturepact.com/">Blog</a></li>
          <li><?php echo CHtml::link('Contact', array('/site/contact'),array( 'target'=>'_blank'));?></li>        </ul>
      </div>
    </div>
  </footer>
  <!-- /footer --> 
  
</div>
<!-- /.body-wrapper --> 
<!-- Bootstrap core JavaScript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.min.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/bootstrap.min.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/twitter-bootstrap-hover-dropdown.min.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.themepunch.plugins.min.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.themepunch.revolution.min.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.fancybox.pack.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.2"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.0"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.isotope.min.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.easytabs.min.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/owl.carousel.min.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.fitvids.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.sticky.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/google-code-prettify/prettify.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.slickforms.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/retina.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/scripts.js"></script>

<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- JS -->
<!-- Jquery and Jquery migrate (for older plugins) -->
<!-- Jquery and Jquery migrate (for older plugins) -->
<!-- Jquery Portfolio gallery dependencies -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/jQuery.Opie.PortfolioGallery.min.js"></script>
<!-- Sequence plugin + dependencies -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/classie.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/modernizr.custom.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/jquery.sequence-min.js"></script>
<!-- Parallax slider plugin for reposive sliders -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/jquery.slider.min.js"></script>
<!-- Scroller plugins -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/cbpScroller.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/niceScroll.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/hover.js"></script>
		<!-- All the plugins initialization script -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/init.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/jquery.simple-text-rotator.js"></script>
<script>
	  $(document).ready(function(){
			$(".demo1 .rotate").textrotator({
		animation: "fade",
		speed: 1500
	  });
	  $(".demo2 .rotate").textrotator({
		animation: "flip",
		speed: 1250
	  });
	  $(".demo3 .rotate").textrotator({
		animation: "flipCube",
		speed: 1500
	  });
	  $(".demo4 .rotate").textrotator({
		animation: "flipUp",
		speed: 1750
	  });
	  $(".demo5 .rotate").textrotator({
		animation: "spin",
		speed: 2000
	  });
		});


		$("#owl-autoplay").owlCarousel({
		autoPlay:1000,
		});

	
</script>

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
</body>
</html>
