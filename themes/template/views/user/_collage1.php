<div class="career-bot pull-left mt20">
		<div class="coll_logo"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/coll_logo.png" alt="logo"></div>   
        <div class="head_text_coll" style="width:90%;"><?php echo $Institutes->name;?><br>
            <span><?php echo $Institutes->address1.' <br/> '.$Institutes->phone_number.' <br/>'.$Institutes->email.' <br/>'.$Institutes->website;?></span>
            <p style="font-weight:normal;"><h4 class="content_div">Overview</h4><?php echo $Institutes->overview;?><br />
            <h4 class="content_div">Why this collage</h4><?php echo $Institutes->why;?></p>
        </div>
        <?php foreach($Institutes->collagesCoursesSpecialization as $cou){?>
        <div class="content_div"><?php echo $cou->courses->title;?>  <span>  (<?php echo $cou->specialization->title;?>)</span></div>
        <?php } ?>
   
</div>
<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>