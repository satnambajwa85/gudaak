	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Career Preference </h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>

			</div>
			
		</div>
		<div id="final"></div>
		<?php foreach ($preference as $list) {?>
		  <div class="col-md-12 fl pd0 br-all">
        	<div class="col-md-8 pull-left fl pd0">
                    <div class="col-md-12 fl pd0 br-right">
                    	<div class="col-md-3 pull-left pd0 stream-img">
 
							<img  src="<?php echo Yii::app()->baseUrl;?>/uploads/career_options/small/<?php echo $list->careerOptions->image;?>" />
	                    </div>
                     	<div class="col-md-9 pull-left user-streams-list pd10t ">
                        	<h1><?php echo $list->careerOptions->title;?></h1>
                            <p><?php echo substr($list->careerOptions->description,0,100);?>..</p>
                            <?php echo CHtml::link('View complete details...',array('user/careerDetails','id'=>$list->career_options_id));?>
                       </div>
                    </div>
        
	        </div>
            <div class="col-md-2 pull-left stream-ratting pd5">
        		<span>Your rating for this stream</span>
               	 <ul class="star-rating" style="margin:0px;">
					<div id="user-rating<?php echo $list->career_options_id;?>"  ></div>
				</ul>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#user-rating<?php echo $list->career_options_id;?>').raty({ score:'<?php echo $list->careerOptions->rating;?>'});
						$('#user-rating<?php echo $list->career_options_id;?> img').click(function(){saveRating(<?php echo $list->career_options_id;?> ,$(this).attr('alt'));});
						
					});
				</script>
	        </div>
            
            <div class="col-md-2 pull-left stream-ratting pd5 br-left make-final">
        		<span>Do you think this is the best stream for you then</span>
                <div class="clear"></div>
               	<?php echo CHtml::ajaxlink('Make Final',array('user/userFinalCareer','id'=>$list->id),array('update'=>'#final'),array('class'=>'white-text btn btn-warning'));?>
        
	        </div>
        
        </div>
		<?php } ?>
		 <div class="col-md-6 pull-left">
			<?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
		</div>
	
</div>

	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
<script type="text/javascript">
function saveRating(cid,rate){
	var url	=	'<?php echo Yii::app()->createUrl('/user/UserRaitng');?>';
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