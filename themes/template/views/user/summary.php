<?php $this->pageTitle=Yii::app()->name . ' - Summary';
$this->breadcrumbs=array('Summary'=>array('/user/summary'));?>
	<div class="career-bot pull-left">
						<?php if(Yii::app()->user->hasFlash('sccess')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('sccess'); ?></strong>
						</div>
							 
					<?php endif; ?>	
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Summary </h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>

			</div>
			
		</div>
        
        <div class="col-md-12 fl pd0">
			<div class="col-md-6 pull-left summery-left pd0">
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
								<span><?php echo $list->event;?></span>
							</div>
							<div class="col-md-3 pull-left pd0">
								<p><?php echo $list->topic;?></p>
							</div>
							<div class="col-md-3 pull-left pd0">
								<p><?php echo Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($list->add_date, 'yyyy-MM-dd'),'medium',null);?></p>
							</div>
							<div class="col-md-3 center pull-left mar-top10 pd0">
								<?php echo CHtml::ajaxLink('Summery',array('/user/summaryData','id'=>$list->id),
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
            <div class="col-md-6 pull-left summaryDetails pd0">
            	<div id="resultSummery"></div>				
			</div>
            
		</div>
		
		
</div>

	
	<div class="news pd0 fl">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			