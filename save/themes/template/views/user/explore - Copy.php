	<div class="career-bot pull-left">
						<?php if(Yii::app()->user->hasFlash('sccess')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('sccess'); ?></strong>
						</div>
							 
					<?php endif; ?>	
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Preferred Stream </h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>

			</div>
			
		</div>
        
        <div class="col-md-12 fl pd0">
			<?php if(!empty($data)) {?>
            <div class="mr0 col-md-6 fl br-right">
				
					<!--<div class="mr0  pull-left middle-format-left">
						<h1>Your  Prefered Stream </h1>
						<p>Your prefered stream are listed here.
						</p>

					</div>-->
				<div class="col-md-12 fl">
				<div id="scrollBar">
                	<?php foreach($data as $list){?>
					
						<div class="col-md-12 pull-left fl  pd-b10">
						<div class="col-md-12 fl pd0 ">
							<div class="pull-left pd0 prefered-stream-img">
	 
								<img  src="<?php echo Yii::app()->baseUrl;?>/uploads/career/small/<?php echo (!empty($list['image']))?''.$list['image'].'':'noimage.jpg';?>" />
							</div>
							<div class="col-md-9 pull-left  stream-description">
								<h1><?php echo substr($list['title'],0,30);?>..</h1>
								<p><?php echo substr($list['description'],0,110);?>..</p>
								<ul class="star-rating  pd0">
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
								</ul>
								<div class="clear"></div>
								<span></span>
						   </div>
						</div>
					</div>
					<div class="clear"></div>
				
                <?php } ?>
			 
				</div>
				 <div class="col-md-12 pull-left below-info">
					<p>if ypou have any different idea to choose a stream then just change your idea bu having a conversation with counselor. </p>
					<?php echo CHtml::link('Still confused',array('user/'),array('class'=>'white-text btn btn-warning'));?>
				</div>
				
				<div class="col-md-12 pull-left user-feedback">
					<h1>Feedback</h1>
					<p>Your valuable idea about this stream Explore. </p>
					<span class="fl">1.Weather counselling with counselor satisfactory?</span>
					<div class="clear"></div>
					<?php $form=$this->beginWidget('CActiveForm', array(
																		'id'=>'comment-info-form',
																		    'enableClientValidation'=>true,
																			'clientOptions'=>array(
																					'validateOnSubmit'=>true,
																					
																				)
																	)); ?>		
					       <div class="form-controles fl">
						   <?php echo $form->radioButtonList($model,'user_responce',array('Satisfied'=>'Satisfied','Average'=>'Average','Note_at_all'=>'Note at all'),array('separator'=>'')); ?>
						   <?php echo $form->error($model,'user_responce');?>
						   </div>
							<div class="clear"></div>
							<select id="UserComments_stream_id" class="form-control" name="UserCareerComments[career_id]">
								<?php foreach($data as $list){?>
								<option value="<?php echo $list['id'];?>"><?php echo $list['title'];?></option>
								<?php } ?>
							</select>
							<div class="form-controles">
							<?php echo $form->textArea($model,'comments',array('class'=>'form-control','placeholder'=>'Enter comment here..'));?>
								
							</div>
							<?php echo CHtml::submitButton('submit',array('class'=>'btn btn-warning fr','id'=>'comment-info-form-btn'));?>
					<?php $this->endWidget();?>
				</div>
				
				
			</div>
            <?php } else{ ?>
			<div class="mr0 col-md-6 fl br-right">
				
					<div class="mr0  pull-left middle-format-left">
						<h1>Recode not found.</h1>
						 

					</div>
			</div>
			<?php } ?>

          
        
        </div>
		<?php if(!empty($finalCounselor)){ ?>
			<div class="col-md-6 pull-left">
				<div class="col-md-12 fl">
					<div class="mr0  pull-left middle-format-left">
						<h1>Counselor  Prefered Stream </h1>
						<p>Counselor prefered stream are listed here.
						</p>

					</div>
					<?php foreach($finalCounselor as $selfSel){?>
					<div class="col-md-12 pull-left fl pd-b10">
						<div class="col-md-12 fl pd0 ">
							<div class="pull-left pd0 prefered-stream-img">
	 
								<img  src="<?php echo Yii::app()->baseUrl;?>/uploads/stream/small/<?php echo $selfSel->stream->image;?>" />
							</div>
							<div class="col-md-9 pull-left  counselor-stream-description">
								<h1><?php echo $selfSel->stream->name;?></h1>
								<p><?php echo $selfSel->stream->description;?></p>
								<ul class="star-rating  pd0">
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
								</ul>
								<div class="clear"></div>
								<span><?php echo ($selfSel->stream->featured)?'Featured':'';?></span>
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
							<?php echo CHtml::link('<i class="icon-microphone "></i> Talk to Counselor',array('user/'),array('class'=>'orange'))?>
						</div>
					</div>
				</div>
		   </div>
            <?php } else{  ?>
				<div class="mr0 col-md-6 fl ">
					
						<div class="mr0  pull-left middle-format-left">
							<h1>Counsellor has not recommend any stream yet.</h1>
							<p>Please contact to your counsellor.</p>

						</div>
				</div>
			<?php } ?>
		
</div>

	
	