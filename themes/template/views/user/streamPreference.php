<?php $this->pageTitle='Stream Preference';
$this->breadcrumbs=array('Stream Preference'=>array('/user/streamPreference'));?>	
	<div class="career-bot pull-left">
						<?php if(Yii::app()->user->hasFlash('sccess')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('sccess'); ?></strong>
						</div>
							 
					<?php endif; ?>	
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<!--<h1>Preferred Stream </h1>-->
                <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
				<p>Based on the available inputs from the counselor and your own preferences go on upgrading your two most preferred stream by clicking on the button ‘Make Final’.<br />
				</p>

			</div>
			
		</div>
        
        <div class="col-md-12 fl pd0">
			<?php if(!empty($data)) {?>
            <div class="mr0 col-md-6 fl br-right">
			 	 	<div class="mr0  pull-left middle-format-left">
						<h1>Your Prefered Stream </h1>
						<p>Your prefered stream are listed here.
						</p>

					</div>
				<div class="clear"></div>	
				<div id="scrollBar">
                <?php foreach($data as $list){ ?>
				<div class="col-md-12 fl pd0 br-all">
							<div class="col-md-5 pull-left fl pd0">
									<div class="br-right">
										<div class="col-md-12 pull-left pd0 stream-img">
										<?php 
											$filename = $list['image'];
											 $path=Yii::getPathOfAlias('webroot.uploads.stream.small') . '/';
											$file=$path.$filename;
											if (file_exists($file)){ ?>
											<?php echo CHtml::link('<img  src="'.Yii::app()->baseUrl.'/uploads/stream/small/'.$list['image'].'" />',array('user/stream','id'=>$list['id']));?>
															<?php 	}else{ ?>
											<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/stream/small/noimage.jpg"/>',array('user/stream','id'=>''.$list['id'].''));?>
										
										<?php } ?>
					<?php echo CHtml::link('<h1 class="stream-img-title">'.$list['name'].'</h1>',array('user/stream','id'=>$list['id']));?>
										
                  
                                        
										</div>
										 
									</div>
						
							</div>
            <div class="col-md-3 pull-left stream-ratting pd5">
        		<span>Your rating for this stream</span>
               		   	 <ul class="star-rating" style="margin:0px;">
							<div id="user-rating<?php echo $list['id'];?>"  ></div>
						</ul>
								 	  	<script type="text/javascript">
										$(document).ready(function(){
											$('#user-rating<?php echo $list['id'];?>').raty({readOnly:true, score:'<?php echo $list['Urate'];?>'});
											$('#user-rating<?php echo $list['id'];?> img').click(function(){saveRating(<?php echo $list['id'];?> ,$(this).attr('alt'));});
											
										});
									</script>
									 
									 
	        </div>
            
            <div class="col-md-4 pull-left stream-ratting pd5 br-left">
        		<span>Do you think this is the best stream for you</span>
                <div class="clear"></div>
				<?php if ($list['updated_by']!=1){?>
				<?php echo CHtml::ajaxLink('Make Final',array('user/finalizedStream','id'=>$list['id']),
												array(	'type'=>'POST',
														'success'=>'function(data){
																		var $dataR	=	jQuery.parseJSON(data)
																		if($dataR.status==1)
																			$("#final_item-'.$list['id'].'").html("Finalized");
																		else
																			alert($dataR.message);
																	}'),
												array('confirm'=>'Are you sure you want to finalize this stream?',
														'class'=>'white-text btn btn-warning',
														'id'=>'final_item-'.$list['id']));  ?>
				<?php }else{ ?>
				<?php echo CHtml::ajaxLink('Finalized','javaScript:void(0)',
												array('type'=>'POST'),
												array('confirm'=>'Already Finalized.',
														'class'=>'white-text btn btn-warning',
														'id'=>'final_item-'.$list['id']));  ?>
				<?php } ?>
	        </div>
        	 <table class="table">
      <tbody>
              <?php foreach($list['subjects'] as $sub){
				  if( $sub->subjects_id!=18){
				  ?>
						
       <tr>
         <td class="col-md-4"><?php echo  $sub->subjects->title;?></td>
         <td class="col-md-4"><?php echo  $sub->type_subjects;?></td>
         <td class="col-md-4">
         <div id="stream-rating-<?php echo $list['id'].'-'.$sub->subjects_id;?>" class="fr"></div>
                          
<script type="text/javascript">
	$(document).ready(function(){
		$('#stream-rating-<?php echo $list['id'].'-'.$sub->subjects_id;?>').raty({readOnly:true,score:'<?php echo (isset($subjectRating[$sub->subjects_id]))?$subjectRating[$sub->subjects_id]:0;?>'});
								
	});
</script>
         
         </td>
       </tr>
     
     
                         
                       
					<?php } }?>
                    </tbody>
   </table>
        </div>
			<hr>				
				 <?php } ?>
			 
				</div>
				
				
				
			 
         </div>
		  <?php } else{ ?>
			<div class="mr0 col-md-6 fl br-right">
				
					<div class="mr0  pull-left middle-format-left">
						<h1>You have not rated any of the subjects/ streams as yet. Click here to rate and finalize subjects of your interest.</h1>
						 

					</div>
			</div>
			<?php } ?>
		<?php if(!empty($data2)){ ?>
			<div class="col-md-6 pull-left">
				<div class="col-md-12 fl">
					<div class="mr0  pull-left middle-format-left">
						<h1>Counselor  Prefered career options </h1>
						<p>Counselor prefered career options are listed here.
						</p>

					</div>
					
					<?php foreach($data2 as $selfSel){?>
					<div class="col-md-12 pull-left fl pd-b10">
						<div class="col-md-12 fl pd0 ">
							<div class="pull-left pd0 prefered-stream-img">
								<?php 
									$filename = $list['image'];
									 $path=Yii::getPathOfAlias('webroot.uploads.stream.small') . '/';
									$file=$path.$filename;
									if (file_exists($file)){ ?>
										<img  src="<?php echo Yii::app()->baseUrl;?>/uploads/stream/small/<?php echo $selfSel['image'];?>" />
										<?php 	}else{ ?>
											<img  src="<?php echo Yii::app()->baseUrl;?>/uploads/stream/small/noimage.jpg" />
						
								
								<?php } ?>

								</div>
							<div class="col-md-9 pull-left  stream-description">
								<h1><?php echo $selfSel['name'];?></h1>
							
								<p><?php echo substr($selfSel['description'],0,100);?></p>
								<ul class="star-rating" style="margin:0px;">
									<div id="Cuser-rating<?php echo $selfSel['id'];?>"  ></div>
								</ul>
								<script type="text/javascript">
										$(document).ready(function(){
											$('#Cuser-rating<?php echo $selfSel['id'];?>').raty({readonly:true, score:'<?php echo $selfSel['uCrate'];?>'});
										});
									</script>
								<div class="clear"></div>
								<span><?php // echo ($selfSel->careerOptions->featured)?'Featured':'';?></span>
						  
						   </div>
						</div>
					</div>
                    <?php } ?>
					<div class="col-md-12 pull-left fl pd0">
						<div class="mr0  pull-left counselor-views">
							<h1>Counselor  Comments </h1>
							<p>Counselor prefered stream are listed here.
							</p>
							<datetime class="date-time">
								29-jan-2014
							</datetime>
							<p>Counsellor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here 
							</p>
							<?php echo CHtml::link('<i class="icon-microphone "></i> Talk to Counselor','javascript:void(0);',array('class'=>'orange'))?>
						</div>
					</div>
				</div>
		   </div>
            <?php } else{  ?>
				<div class="mr0 col-md-6 fl ">
					
						<div class="mr0  pull-left middle-format-left">
							<h1>Counsellor has not recommend any stream yet.</h1>
							<!--<p>Please contact to your counsellor.</p>-->

						</div>
				</div>
			<?php } ?>
		
</div>
</div>
	<div class="news pd0 fr">
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