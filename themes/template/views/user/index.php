<?php 
if(isset($_REQUEST['first']) && $_REQUEST['first']==1)
	Yii::app()->clientScript->registerScript('opact','$("#popup_box").fadeIn("slow");$("#container").css({"opacity": "0.3" }); $("#popup_box").click(function(){$("#popup_box").fadeOut();});',CClientScript::POS_READY);
	
$this->pageTitle=Yii::app()->name . ' - Tour';
$this->breadcrumbs=array('Tour'=>array('/user/'));?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Tour</h1>
				<!--<p>Watch this video to understand how you will proceed through the Gudaak journey of choosing your career through the three steps of career planning…<br />
Assess, Explore and Approach!</p>-->
<!--<img src="<?php //echo Yii::app()->theme->baseUrl;?>/images/tour.png" width="100%" />-->

			</div>
			
		</div>
		 
		
	</div>
        
		
		


	
	<div class="news  pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			