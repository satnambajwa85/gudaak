<?php if (Yii::app()->request->urlReferrer==Yii::app()->request->hostInfo.Yii::app()->createUrl('user/finalizedCareer')){?>
<?php $this->pageTitle=Yii::app()->name . ' - Finalized Career';
$this->breadcrumbs=array('Finalized Career'=>array('/user/finalizedCareer'));
?>
<?php } ?>
<?php if (Yii::app()->request->urlReferrer==Yii::app()->request->hostInfo.Yii::app()->createUrl('user/careerPreference')){?>
<?php $this->pageTitle=Yii::app()->name . ' - Career Preference';
$this->breadcrumbs=array('Career Preference '=>array('/user/careerPreference'));
?>
<?php } ?>
<?php if(Yii::app()->request->urlReferrer==Yii::app()->request->hostInfo.Yii::app()->createUrl('user/careerList/',array('id'=>$careerDetails->career_id))){?>
 <?php $this->pageTitle=Yii::app()->name . ' - Career';
$this->breadcrumbs=array('Career'=>array('/user/career'),'Career List'=>array('/user/careerList/','id'=>$careerDetails->career_id),
''.$careerDetails->title.'');
  ?>
<?php } ?>

 

<div class="col-md-9 pull-left">
		<div class="mr0 col-md-12">
			<div class="mr0  pull-left middle-format-left">
				<h1><?php echo $careerDetails->title;?></h1>
				<p><?php echo substr($careerDetails->description,0,250);?></p>
				<?php echo CHtml::ajaxLink('Konw more about Career Library',array(''));?>
			</div>
			<div class="pd0 col-md-12 pull-left ">
			<div class="border">
					<ol class="breadcrumb">
						<li><a href="javascript:void(0)">Career Details</a></li>
                    	<li class="pull-right">
							<div class="star-rating pull-left pd5" style="margin:0px;">
                            	<span class="rating-title2 fl">Your Rating</span>
								<div id="career-rating" class="fr"></div>
                                <div style="margin-top:-10px;color:#E88B2D;font-size:10px;font-weight:bold;">
                                <marquee class="row">Please Rate this Career Option</marquee>
                                </div>
							</div>
						</li>	
					 
					</ol>
				</div>
				<div class="pd0 col-md-3 career-list-view pull-left">
					<ul>
						<?php $counter=1;$css='';?>
						<?php foreach($careerDetailsList as $list){ ?>
							<?php 
							$css='icon-info';
							if($counter==1){
								$css='icon-info';
							}  
							  if($counter==2){
								$css='icon-tasks';
							}  
							  if($counter==3){
								$css=' icon-inr';
							} 
							  if($counter==4){
								$css='icon-signal';
							}  
							  if($counter==5){
								$css='icon-location-arrow';
							} 
							 if($counter==6){
								$css='icon-dropbox';
							}  
							 if($counter==7){
								$css='glyphicon glyphicon-home';
							}   
							 if($counter==8){
								$css='icon-meh';
							}   
							 if($counter==9){
								$css='icon-time';
							}   
							 if($counter==10){
								$css='icon-exclamation';
							} ?>
						<li>
							<a href="#tab<?php echo $list->id;?>"><i class="<?php echo $css;?>"></i><?php echo $list->title;?></a>
							<i class="icon-caret-left pull-right "></i>
						</li>
						<?php $counter++; } ?>
						
					
						
					</ul>
				</div>	
				<div class="pd0 col-md-9  pull-left">
					<?php foreach($careerDetailsList as $list){ ?>
					<div id="tab<?php echo $list->id;?>" class="career-tab-section">
                    	<h1><?php echo $list->title?></h1>
							<?php echo ($list->title=='Video')?'<iframe width="560" height="315" src="'.$list->description.'" frameborder="0" allowfullscreen></iframe>':$list->description;?>
					</div>
					<?php } ?>
				</div>						
					
				
				
			 
			</div>
			
		</div>
		<div class="clear"></div>
		<div class="row educationbot  fl">

	</div>
</div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			
<script type="text/javascript">
	$(document).ready(function(){
		$('#career-rating').raty({score:'<?php echo (isset($userRateing->self))?''.$userRateing->self.'':0;?>'});
		$('#career-rating img').click(function(){saveRating(<?php echo $careerDetails->id;?> ,$(this).attr('alt'));});
								
	});
</script>
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