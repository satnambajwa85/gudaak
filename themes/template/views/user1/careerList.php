<?php $this->pageTitle=Yii::app()->name . ' - Career';
$this->breadcrumbs=array('Career'=>array('/user/career'),'Career List'=>array('/user/careerList/','id'=>$dataBYId->id));
array('Career'=>array('user/career'));?>
<div class="careerList pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left middle-format-left">
				<h1><?php echo $dataBYId->title;?></h1>
				<?php echo substr($dataBYId->description,0,500);?>
				<div class="clear"></div>
				<div id="flashMessage"></div>
				<?php //echo CHtml::ajaxLink('Konw more about Career Library',array(''));?>
			</div>
			
		</div>
		<div class="clear"></div>
		<div id="scrollBar" style="max-height:555px">
		<div class="col-md-12 pdleft fl">
		
		<ul class="educationbot">
		
		 <?php $count=0;?>
			<?php foreach($career as $data){?>
				<li class="col-md-3 career-lib career-lib2">
                	<div class="col-md-12 pd0">
					<?php 
						$filename = ''.$data->image.'';
						 $path=Yii::getPathOfAlias('webroot.uploads.career.small') . '/';
						$file=$path.$filename;
						if (file_exists($file)){ ?>
						<?php echo CHtml::link((!empty($data->image))?'<img src="'.Yii::app()->baseUrl.'/uploads/career_options/small/'.$data->image.'"/>':'<img src="'.Yii::app()->baseUrl.'/uploads/career_options/small/noimage.jpg"/>',array('user/careerDetails','id'=>''.$data->id.''));?>
						<?php 	}else{ ?>
						<?php echo CHtml::link((!empty($data->image))?'<img src="'.Yii::app()->baseUrl.'/uploads/career_options/small/'.$data->image.'"/>':'<img src="'.Yii::app()->baseUrl.'/uploads/career_options/small/noimage.jpg"/>',array('user/careerDetails','id'=>''.$data->id.''));?>
					
				<?php } ?>
					<div class="clear"></div>
					<?php echo CHtml::link('<h1>'.$data->title.'</h1>',array('user/careerDetails','id'=>''.$data->id.''),array('title'=>$data->title));?>
					<?php if(!empty($data->description)){?>
					<?php echo substr($data->description,0,100);?>
					<?php }else{ ?>
					<p></p>
					<?php } ?>
					<div class="fl options-explore">
						<ul>
							<?php $options		=	CareerOptionsHasSubjects::model()->FindAllByAttributes(array('career_options_id'=>$data->id));?>
							<?php foreach ($options as $list){ ?>
							<li><i class="icon-play"></i><?php echo $list->subjects->title;?></li>
							<?php }?>
						</ul>
					</div>

					<div class="col-md-12 career-hot-links">
					<?php echo CHtml::link('View Details..',array('user/careerDetails','id'=>''.$data->id.''),array('class'=>'pull-left','title'=>'View Details'));?>
					<?php //echo CHtml::Ajaxlink('<i class="glyphicon glyphicon-heart"></i>',array('user/AddCareer','id'=>''.$data->id.''),array('update'=>'#flashMessage'));?>
						<!--<ul class="star-rating pull-right ">
							 <div id="user-rating<?php //echo $data->id;?>" class="ratingStar" ></div>
						</ul>-->
						<?php /*$rating				=	UserRating::model()->findAllByAttributes(array('career_options_id'=>$data->id,'user_profiles_id'=>Yii::app()->user->profileId));		?>
									<?php if(!empty($rating)){?>
									<?php foreach($rating as $list){ ?>
										<script type="text/javascript">
										$(document).ready(function(){
											$('#user-rating<?php echo $list->career_options_id;?>').raty({ score:'<?php echo $list->rating;?>'});
											$('#user-rating<?php echo $list->career_options_id;?> img').click(function(){saveRating(<?php echo $list->career_options_id;?> ,$(this).attr('alt'));});
											
										});
									</script>
									<?php } ?>
									<?php }else{ ?>
									<script type="text/javascript">
										$(document).ready(function(){
											$('#user-rating<?php echo $data->id;?>').raty({ score:'0'});
											$('#user-rating<?php echo $data->id;?> img').click(function(){saveRating(<?php echo $data->id;?> ,$(this).attr('alt'));});
											
										});
									</script>
									<?php } */?>
									 
					
					</div>
 					</div>
                    <div class="clear"></div>
				</li>
				
			<?php $count++; if($count==4){ ?>
				<div class="clear"></div>
			<?php } ?>
				
		
			<?php } ?>
			
		</ul>
		</div>
		</div>
		<div class="clear"></div>
		 
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