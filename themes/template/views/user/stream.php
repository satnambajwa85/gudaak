	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1><?php echo $stream->name;?> </h1>
				<p><?php echo $stream->description;?></p>

			</div>
			
		</div>
        <div class="col-md-12 fl pd0 br-area ">
			<ul id="stream-user-tabs">
				<li class="first-tab"><a href="#subjects">Subject</a></li>
				<li class="tab-curb"><a href="#careeroptions">Career Options</a></li>
               <div class="center rating-align">
					
					<ul class="star-rating pull-left pd5" style="margin:0px;">
						<li><a class="pull-left" href="#rating">Your Rating</a></li>
						<li><div id="stream-rating"  ></div></li>
						
					</ul>
				</div>
			</ul>
			<div id="subjects" class="col-md-12 fl pd0 stream-tabing br-top stream-user-active">
				<h1>It is long established fact a reader will be It is long established fact a reader will be It is long e</h1>	
				<?php foreach($subjects as $subject){?>
					<div class="col-md-12 pull-left pd0 stream-grid br-all">
                        <div class="col-md-10 pull-left pd0 stream-grid br-right">
                        <img src="<?php echo Yii::app()->baseUrl;?>/uploads/subjects/small/<?php echo (!empty($subject['image']))?''.$subject['image'].'':'noimage.jpg';?>" />
						<h3><?php echo $subject['title']?></h3>	
					    <p><?php echo $subject['description']?></p>
                        <?php echo CHtml::link('Read More....');?>
                        </div>
                        <div class="col-md-2 pull-left pd0 right-stream-box ">
                        	<h1>Type of subject </h1>
                        	<?php echo CHtml::link($subject['type'],'javaScript:void(0)');?>
                        </div>
                     </div>
                <?php } ?>
				
				
				
			</div>
			<div id="careeroptions" class="col-md-12 fl pd0 stream-tabing br-top stream-user-active p_padding">
              <div class="c_option">Career Option - Art & Design </div>
				<div class="col-md-3 pd0 pull-left preferred-career pc_border">
                	
					<h2>Preferred Careers</h2>
					<ul>
                    	<?php foreach($careerOption as $key=>$val){?>
						<li><?php echo CHtml::ajaxLink($val,array('user/UserPrefferdCareer','id'=>$key),array('update'=>'#user-prefer-list'));?></li>
                        <?php } ?>
					</ul>
					</div>
					<div class="col-md-9   pull-left preferred-career-info">
						<div id="user-prefer-list">
						
						</div>
						
					</div>
					
			</div>
		</div>
        
		
		
</div>

	
	<div class="col-md-2 pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#stream-rating').raty({score:'<?php echo (isset($streamData->self))?''.$streamData->self.'':0;?>'});
		$('#stream-rating img').click(function(){saveRating(<?php echo $stream->id;?> ,$(this).attr('alt'));});
								
	});
</script>
<script type="text/javascript">
function saveRating(cid,rate){
	var url	=	'<?php echo Yii::app()->createUrl('/user/UserStreamRaitng');?>';
	$.ajax({
		type: "POST",
		url: url+'&id='+cid+'&rating='+rate,
		data: 'rating',
		dataType:'json',
		success:function(data){
				$('.s').html(data.want_to_join);
			}
	});
}
</script>