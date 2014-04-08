<?php $this->pageTitle='Talk to Counsellor';
$this->breadcrumbs=array('Talk to Counsellor'=>array('/user/talk'));?>
	<div class="col-md-10 pd0 pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left col-md-12">
				<!--<h1>Talk</h1>-->
                <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
                <div>
                    <?php 
                    echo CHtml::link('Add New','#',array('onclick'=>'$("#create-form").show();','class'=>'back-btn margin_t')); ?>
                    <div style="width:100%; float:left;">
                   <div style=" float: left; margin-bottom: 38px; margin-left: 18%; width: 75%;"> 
                    <div id="create-form" <?php echo (isset($_POST['Tickets']))?'':'style="display:none"';?>>
                        <?php $this->renderPartial('_talk',array('model'=>$model,)); ?>
                    </div>
                  </div>
                  </div>
                </div>
				<div class="clear"></div>
<div class="col-md-12 fl pd0">
			<div class="col-md-7 pull-left summery-left pd0">
				<ul>
					<div class="col-md-12 border pull-left pd0">
						<div class="col-md-3 pull-left pd0">
							<h1>Topics</h1>
							
						</div>
						<div class="col-md-3 pull-left pd0">
							<h1>Status</h1>
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
					foreach($lists as $list){ 
						
						if($count%2 == 0)
							$class='light-gray';
						else 
							$class='0';			 
							$count= $count+1;
					
					?>
					<li class="<?php echo $class;?>">
						
						<div class="col-md-12 pull-left pd0">
							<div class="col-md-3 pull-left pd0 center">
								<span><?php echo substr($list->problem,0,50);?>...</span>
							</div>
							<div class="col-md-3 pull-left pd0">
								<p><?php echo ($list->status==1)?'Pending':'Answered';?></p>
							</div>
							<div class="col-md-3 pull-left pd0">
								<p><?php echo date('M d, Y',strtotime($list->add_date));?></p>
							</div>
							<div class="col-md-3 center pull-left mar-top10 pd0">
								<?php echo CHtml::ajaxLink('Summery',array('/user/talkData','id'=>$list->id),
												array(	'type'=>'POST',
														'success'=>'function(data){
																		$("#resultSummery").html(data);
																	}'),
												array('class'=>'summery-left-btn')					
												);  ?>
							</div>
						</div>
						
					</li>	
					 <?php } ?>
				</ul>
			</div>
            <div class="col-md-5 pull-left summaryDetails pd0">
            	<div id="resultSummery"></div>				
			</div>
</div>                
			</div>
		</div>
	</div>
    <div class="col-md-2  pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
    
 <!--Popup Design Start--> 
     
 
  <!--Popup Design End--> 
    