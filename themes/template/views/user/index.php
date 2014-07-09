<?php 
if(isset($_REQUEST['first']) && $_REQUEST['first']==1)
Yii::app()->clientScript->registerScript('opact','$("#popup_box").fadeIn("slow");$("#container").css({"opacity": "0.3" }); $(".next_position").click(function(){$("#popup_box").fadeOut();$("#popup_box1").fadeIn("slow");$("#container").css({"opacity": "0.3" });});
$(".close_position").click(function(){$("#popup_box1").fadeOut();});',CClientScript::POS_READY);
$this->pageTitle=Yii::app()->name . ' - Home';
$this->breadcrumbs=array('Home'=>array('/user/'));?>
<div class="career-bot pull-left">
	<div class="mr0 col-md-12 fl">
		<div class="mr0  pull-left stream-pref">
			<h1>Home</h1>
		</div>
	</div>
</div>
<div class="news  pd0 pull-right">
	<?php  $this->Widget('WidgetNews'); ?>
</div>
<div id="popup_box">    <!-- OUR PopupBox DIV-->
<img class="menu_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/menu_position.png"/>
<img class="img_position1" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer1.png"/>
<img class="img_position2" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer2.png"/>
<img class="img_position3" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer3.png"/>
<img class="next_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/next.png"/>
</div>
<div id="popup_box1">
<img class="img_position4" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer4.png"/>
<img class="img_position5" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer5.png"/>
<img class="img_position6" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer7.png"/>
<img class="img_position7" src="<?php echo Yii::app()->theme->baseUrl;?>/images/gudaak-pointer8.png"/>


<img class="profile_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/profile.png"/>
<img class="top_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/top.png"/>
<img class="news_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/news.png"/>

<img class="close_position" src="<?php echo Yii::app()->theme->baseUrl;?>/images/close.png"/>
</div>