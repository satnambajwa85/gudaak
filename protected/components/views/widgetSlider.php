<?php $path	=	Yii::app()->theme->baseUrl;?>
<script type="text/javascript" src="<?php echo $path?>/js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo $path?>/js/layerslider.kreaturamedia.jquery-min.js"></script>
 <!-- CSSs Plugin -->
<link rel="stylesheet" id="styles-minified-css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style-minifield.css" type="text/css" media="all" />
        
<!-- START SLIDER -->
<div id="slider-layer-slider" class="slider layer-slider no-responsive">
	<div class="shadowWrapper">
		<div id="layerslider_1" style="margin: 0px auto; width: 100%; height: 544px; ">
		<?php foreach($slider as $slides):?>
			<div class="ls-layer" style="background-color:none; slidedirection: right; slidedelay: 4000; durationin: 1000; durationout: 1500; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 0; delayout: 0;">
				<div class="inner ls-s3" style="position:absolute; left:50%; slidedirection : top; slideoutdirection : right; parallaxin : .45; parallaxout : .45; durationin : 600; durationout : 1500; easingin : easeOutExpo; easingout : easeInOutQuint; delayin : 2000; delayout : 0;">
					<div style="position: absolute; top:215px; right: 75px;  font-size: 13px; color: #2e2d2d; font-family: Rokkitt,Georgia,serif;width:340px;"><?php echo $slides->description1;?></div>
				</div>
				<div class="inner ls-s3" style="position:absolute; left:50%; slidedirection : right; slideoutdirection : right; parallaxin : .45; parallaxout : .45; durationin : 600; durationout : 1500; easingin : easeOutExpo; easingout : easeInOutQuint; delayin : 2600; delayout : 0;">
					<h3 style="position: absolute; top:126px; right: 145px;  font-size: 30px; color: #53D0EA; font-family:Rokkitt,Georgia,serif;"><?php echo $slides->title1;?></h3>
				</div>
				<div class="inner ls-s3" style="position:absolute; left:50%; slidedirection : top; slideoutdirection : right; parallaxin : .45; parallaxout : .45; durationin : 1000; durationout : 1500; easingin : easeOutBounce; easingout : easeInOutQuint; delayin : 3200; delayout : 0;">
					<h2 style="position: absolute; top:270px; right: 190px;  font-size: 30px; color: #c97e08; font-weight:bold;font-family: Rokkitt,Georgia,serif;"><?php echo $slides->test_type_title1;?></h2>
				</div>
				<div class="inner ls-s8" style="position:absolute; left:50%; slidedirection : left; slideoutdirection : left; parallaxin : .45; parallaxout : .45; durationin : 1500; durationout : 1500; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 1100; delayout : 0;">
					<div style="position: absolute; top:297px; left: 30px;  ">  </div>
				</div>
				<div class="inner ls-s6" style="position:absolute; left:50%; slidedirection : left; slideoutdirection : left; parallaxin : .45; parallaxout : .45; durationin : 1500; durationout : 1500; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 900; delayout : 0;">
					<div style="position: absolute; top:186px; left: 30px;  font-size: 13px; color: #4f4f4e; font-family: Droid Sans,sans-serif;">
						<div style="width:340px;"><?php echo $slides->description2;?></div>
					</div>
				</div>
				<div class="inner ls-s4" style="position:absolute; left:50%; slidedirection : left; slideoutdirection : left; parallaxin : .45; parallaxout : .45; durationin : 1500; durationout : 1500; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 700; delayout : 0;">
					<h3 style="position: absolute; top:126px; left: 30px;  font-size: 30px; color: #c97e08; font-family:Rokkitt,Georgia,serif;"><?php echo $slides->title2;?></h3>
				</div>
				<div class="inner ls-s1" style="position:absolute; left:50%; slidedirection : left; slideoutdirection : left; parallaxin : .45; parallaxout : .45; durationin : 1500; durationout : 1500; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 500; delayout : 0;">
					<h2 style="position: absolute; top:215px; left: 30px;  font-size: 30px; color: #2e2d2d; font-family: Rokkitt,Georgia,serif;"><?php echo $slides->test_type_title2;?></h2>
				</div>
			</div>
			<?php endforeach;?>
			 	
		</div>
		<script type="text/javascript" src="<?php echo $path;?>/js/slider-layer.js"></script>
		<div class="shadow-left"></div>
		<div class="shadow-right"></div>
	</div>
</div>