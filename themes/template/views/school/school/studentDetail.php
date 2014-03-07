<?php
$this->pageTitle=Yii::app()->name . ' - '.$userInfo->display_name.' Details';
$this->breadcrumbs=array('Detail',);
?>
<div class="container">
<div class="col-md-10 	 pop-up-border fl col-lg-offset-1 ">
	<div class="row test-bot"><?php echo $userInfo->display_name;?> <span><?php echo $userInfo->generateGudaakIds->gudaak_id;?></span></div>
		<div class="row  fl">
			<div class="col-md-3 pd0 fl">
				<div class="rating-history">
					<ul>
						<li class="rating-title"><h2>Last Login</h2></li>
						<li>Last login at <span class="skyBlue"><?php echo $userInfo->userLogin->last_login;?></span></li>
						<li class="rating-title"><h2>Rating History</h2></li>
						<div class="clear"></div>
						<?php foreach($ratingHistory as $historyList):?>
						<li><h1><?php echo $historyList->stream->name;?></h1>
							<div class="hRate" id="rating-histroy<?php echo $historyList->stream_id;?>"  ></div>	
						</li>
							 
							<script type="text/javascript">
								$(document).ready(function(){
									$('#rating-histroy<?php echo $historyList->stream_id;?>').raty({readOnly: true, score:'<?php echo $historyList->self;?>'});
									
								});
							</script>
						 
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9  fl">
				<div class="col-md-12 mr0  pd0 pull-left stream-pref">
					<div class="col-md-6 mr0 pd0 pull-left stream-pref">
						<?php if(!empty($userFinalStream)){ ?>
						<h1>Finalized Stream </h1>
						<p>Your prefered stream are listed here.</p>
						<div class="col-md-12 pd0">
							<?php foreach($userFinalStream as $selfSel){?>
								<div class="col-md-12 pull-left fl pd0 pd-b10">
								<div class="col-md-12 fl pd0 ">
									<div class="pull-left pd0 prefered-stream-img">
			 
										<img  src="<?php echo Yii::app()->baseUrl;?>/uploads/stream/small/<?php echo (!empty($selfSel->stream->image))?''.$selfSel->stream->image.'':'noimage.jpg';?>" />
									</div>
									<div class="col-md-9 pull-left counselor-stream-description">
										<h1><?php echo $selfSel->stream->name;?></h1>
										<p><?php echo substr($selfSel->stream->description,0,65);?></p>
										 <ul class="star-rating" style="margin:0px;">
										<div id="user-rating-final<?php echo $selfSel->stream_id;?>"  ></div>
										</ul>
										<script type="text/javascript">
											$(document).ready(function(){
												$('#user-rating-final<?php echo $selfSel->stream_id;?>).raty({readOnly: true, score:'<?php echo $selfSel->self;?>'});
												
											});
										</script>
										<div class="clear"></div>
										<span><?php echo ($selfSel->stream->featured)?'Featured':'';?></span>
								   </div>
								</div>
							</div>
							<?php } ?>
						</div>
						<?php } else {?>
						<h1 class="center">Record Not Found</h1>
						<?php } ?>
					</div>
					<div class="col-md-6 mr0  pull-left stream-pref">
					<?php if (!empty($counsRecoStream)){?>
						<h1>Counsellor Prefered Stream </h1>
						<p>Counsellor prefered stream are listed here.
						</p>
						<div class="col-md-12 pd0">
						
							<?php foreach($counsRecoStream as $counsellorList){?>
								<div class="col-md-12 pull-left fl pd0 pd-b10">
								<div class="col-md-12 fl pd0 ">
									<div class="pull-left pd0 prefered-stream-img">
			 
										<img  src="<?php echo Yii::app()->baseUrl;?>/uploads/stream/small/<?php echo (!empty($counsellorList->stream->image))?''.$selfSel->stream->image.'':'noimage.jpg';?>" />
									</div>
									<div class="col-md-9 pull-left counselor-stream-description">
										<h1><?php echo $counsellorList->stream->name;?></h1>
										<p><?php echo substr($counsellorList->stream->description,0,65);?></p>
										 <ul class="star-rating" style="margin:0px;">
										<div id="user-rate<?php echo $counsellorList->stream_id;?>"  ></div>
										</ul>
											<script type="text/javascript">
											$(document).ready(function(){
												$('#user-rate<?php echo $counsellorList->stream_id;?>').raty({readOnly: true, score:'<?php echo $counsellorList->self;?>'});
												
											});
										</script>
										<div class="clear"></div>
										<span><?php echo ($counsellorList->stream->featured)?'Featured':'';?></span>
								   </div>
								</div>
							</div>
							<?php echo CHtml::link('<i class="glyphicon glyphicon-comment"></i>Counsellor Comments','javascript:void(0);',array('class'=>'counsellor-comment'));?>
							<?php } ?>
						</div>
						<?php }else{ ?>
						<h1 class="center">Record Not Found</h1>
						<?php } ?>
					</div>
				</div>
			<div class="col-md-12 fl pd0">
				<div class="col-md-6 mr0 pull-left stream-pref">
					<h1 class="mr0 mb10">Summary</h1>
				</div>
				<div class="col-md-12 pull-left summery-left pd0">
					<ul>
						<div class="col-md-12 border pull-left pd0">
							<div class="col-md-3 pull-left pd0">
								<h1>Events</h1>
								
							</div>
							<div class="col-md-3 pull-left pd0">
								<h1>Topics</h1>
							</div>
							<div class="col-md-3 pull-left pd0">
								<h1>Date</h1>
							</div>
							<div class="col-md-3 center pull-left pd0">
								<h1>Remarks</h1>
							</div>
						</div>
						<?php 
							 $count=1;
						foreach($summaryDetails as $list){ 
							
							if($count%2 == 0)
								$class='light-gray';
							else 
								$class='0';			 
								$count= $count+1;
						
						?>
						<li class="<?php echo $class;?>">
							
							<div class="col-md-12 pull-left pd0">
								<div class="col-md-3 pull-left pd0 center">
									<span>Access</span><br/>
									<?php echo CHtml::link('Online','#')?>
								</div>
								<div class="col-md-3 pull-left pd0">
									<p><?php echo $list->orientItems->title;?></p>
								</div>
								<div class="col-md-3 pull-left pd0">
									<p><?php echo Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($list->add_date, 'yyyy-MM-dd'),'medium',null);?></p>
								</div>
								<div class="col-md-3 center pull-left mar-top10 pd0">
								<?php echo CHtml::ajaxLink('Summery', Yii::app()->createUrl('/school/summaryDetails' ),array('data' =>array( 'userId' =>$list->user_profiles_id,'orient_items_id'=>$list->orient_items_id),'update'=>'#summeryRecodes'),array('class'=>'summery-left-btn Summary-details')); ?>
								<?php	//echo CHtml::Ajaxlink('Summary',array('school/summaryDetails'),array('id'=>$list->user_profiles_id,'orient_items_id'=>$list->orient_items_id ),array('update'=>'#summeryRecodes'),array('class'=>''));?>
									 
									
									<?php //echo CHtml::link('Summery','#',array('class'=>''))?>
								</div>
							</div>
							
						</li>	
						 <?php } ?>
					</ul>
				</div>
			<div class="col-md-6 pull-left summaryDetails ">
				
			</div>
		</div>
			</div>
		</div>
	</div>
</div>


    <div id="myModal" class="modal fade">
		<div class="modal-dialog">
        	<div class="modal-content border-layer">
            <!-- dialog body -->
            	<div class="modal-body">
				<a data-dismiss="modal" class="btn schoo-bt-color pull-right">Go Back</a>
    	
					<div class="col-md-12 ">
						<p></p>
					</div>
				</div>
			<!-- dialog buttons -->
			 
			</div>
		</div>
    </div>
	
<div id="Summary-details" class="modal fade">
    	<div class="modal-dialog">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
							<a data-dismiss="modal" class="btn btmar btn-info pull-right ">close</a>
								
                            	 <div  class="col-md-12 pd0 login-box pull-left">
									<div id="summeryRecodes">
									
									</div>
									 
                                 </div>
                               
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>