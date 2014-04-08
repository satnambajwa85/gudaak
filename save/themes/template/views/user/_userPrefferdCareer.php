	<?php if (!empty($list)){ ?>
	<h2>Preferred Careers</h2>
		<div class="tabs-width">
		<ul id="career-description-tabs">
			<?php foreach($list as $data){ ?>
			 <li><a href="#tab<?php echo $data->id;?>"><?php echo $data->title;?></a></li>
			<?php } ?>
		 
		</ul>
		</div>
		<div class="clear"></div>
		<?php foreach($list as $data){ ?>
		<div id="tab<?php echo $data->id;?>" class="tab-visible">
			<?php echo $data->description;?>
		</div>	
		<?php } ?>
		<?php } else { ?>
		<h2>Recode not fond.</h2>
		<?php } ?>
<?php
Yii::app()->clientScript->registerScript(
		'tabs',
		"$('#career-description-tabs li a').bind('click', function(e){
		$('#career-description-tabs li a.current').removeClass('current');
		$('.tab-visible:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('current');
		e.preventDefault();
	}).filter(':first').click();",
		CClientScript::POS_READY
	);?>
<script>
$(document).ready(function(){
	$('#career-description-tabs li').mouseover( function(e){
		$('.tabs-width').css("overflow-x","scroll");
	});
	$('.tabs-width').hover( function(e){
		$('.tabs-width').css("overflow","hidden");
	});
});
</script>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = false;?>	