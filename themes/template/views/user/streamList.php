<?php $this->pageTitle='Stream Library ';
$this->breadcrumbs=array('Stream Library '=>array('/user/streamList'));?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0  pull-left stream-pref">
				<!--<h1>Stream Library </h1>-->
                <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>

			</div>
			
		</div>
        	<div class="mr0 col-md-12 fl">
			 
			
		</div>
<div class="col-md-12 pd0 fl">
<div id="scrollBar" style="max-height:475px">
		
<?php foreach ($data as $data) {?>	
<div class="stream-cat pull-left fl  pd-b10" >
<div class="col-md-12 fl pd0 ">
	<div class="col-md-6 pull-left pd0 prefered-stream-img">
	<?php echo CHtml::link('<img  src="'.Yii::app()->baseUrl.'/uploads/stream/small/'.$data['image'].'" />
	',array('user/stream','id'=>$data['id']));?>
	</div>
	<div class="col-md-6 pull-right  stream-description">
		<?php echo CHtml::link('<h1>'.substr($data['name'],0,30).'</h1>',array('user/stream','id'=>$data['id']));?>
		<p><?php echo substr($data['description'],0,90);?>..</p>
			 <ul class="star-rating" style="margin:0px;">
				<div id="user-rating<?php echo $data['id'];?>"  ></div>
			</ul>
			<div id="update-final-data">
				<span><?php echo ($data['featured'])?'Featured':''?></span>
			</div>
			 	<script type="text/javascript">
					$(document).ready(function(){
						$('#user-rating<?php echo $data['id'];?>').raty({readOnly:true, score:'<?php echo (isset($data['rating']))?''.$data['rating'].'':0;?>'});
						$('#user-rating<?php echo  $data['id'];?> img').click(function(){saveRating(<?php echo  $data['id'];?> ,$(this).attr('alt'));});
										
					});
				</script>
		 
		<div class="clear"></div>
		<span></span>
   </div>
</div>
</div>
<?php } ?>

</div>
</div>
</div>

	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			
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