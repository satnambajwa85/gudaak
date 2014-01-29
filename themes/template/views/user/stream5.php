	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Featured Stream </h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>

			</div>
			
		</div>
        
        <div class="col-md-12 fl pd0">
			<div class="mr0 col-md-4 fl br-right">
				<div class="col-md-12 fl">
					<div class="mr0  pull-left middle-format-left">
						<h1>Your  Prefered Stream </h1>
						<p>Your prefered stream are listed here.
						</p>

					</div>
					
					<div class="col-md-12 pull-left fl pd0">
                    <div class="col-md-12 fl pd0 ">
                    	<div class="pull-left pd0 prefered-stream-img">
 
							<img  src="<?php echo Yii::app()->theme->baseUrl;?>/images/caree.jpg" />
	                    </div>
                     	<div class="col-md-9 pull-left  stream-description">
                        	<h1>Humanities/Art</h1>
                            <p>It is long established fact a reader will be...</p>
                            <ul class="star-rating  pd0">
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
							</ul>
							<div class="clear"></div>
							<span>Featured</span>
                       </div>
					</div>
				</div>
				</div>
				<div class="col-md-12 pull-left below-info">
					<p>if ypou have any different idea to choose a stream then just change your idea bu having a conversation with counselor. </p>
					<?php echo CHtml::link('Still confused',array('user/'),array('class'=>'white-text btn btn-warning'));?>
				</div>
				<div class="col-md-12 pull-left user-feedback">
					<h1>Feedback</h1>
					<p>Your valuable idea about this stream Explore. </p>
					<span>1.Weather counselling with counselor satisfactory?</span>
					<?php $form=$this->beginWidget('CActiveForm', array(
																		'id'=>'comment-info-form',
																		'enableAjaxValidation'=>false,
																	)); ?>
							
							<?php echo CHtml::radioButton('Satisfied',array('Satisfied'=>'Satisfied')); ?>
							<label>Satisfied</label>
							<?php echo CHtml::radioButton('Average',array('Average'=>'Average')); ?>
							<label>Average</label>
							<?php echo CHtml::radioButton('Note_at_all',array('Note_at_all'=>'Note_at_all')); ?>
							<label>Note at all</label>
							<div class="form-controles">
								<textarea class="form-control">	</textarea>
							</div>
							<?php echo CHtml::submitButton('submit',array('class'=>'btn btn-warning fr','id'=>'comment-info-form-btn'));?>
					<?php $this->endWidget();?>
				</div>
				
			</div>
        	
           <div class="col-md-8 pull-left">
				<div class="col-md-12 fl">
					<div class="mr0  pull-left middle-format-left">
						<h1>Counselor  Prefered Stream </h1>
						<p>Counselor prefered stream are listed here.
						</p>

					</div>
					
					<div class="col-md-12 pull-left fl pd0">
						<div class="col-md-6 fl pd0 ">
							<div class="pull-left pd0 prefered-stream-img">
	 
								<img src="/gudaak/themes/template/images/caree.jpg">
							</div>
							<div class="col-md-9 pull-left  counselor-stream-description">
								<h1>Humanities/Art</h1>
								<p>It is long established fact a reader will be...</p>
								<ul class="star-rating  pd0">
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
									<li><i class="yellow icon-star"></i></li>
								</ul>
								<div class="clear"></div>
								<span>Featured</span>
						   </div>
						</div>
					</div>
					<div class="col-md-12 pull-left fl pd0">
						<div class="mr0  pull-left counselor-views">
							<h1>Counselor  Comments </h1>
							<p>Counselor prefered stream are listed here.
							</p>
							<datetime class="date-time">
								29-jan-2014
							</datetime>
							<p>Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here Counselor prefered stream are listed here 
							</p>
							<?php echo CHtml::link('<i class="icon-microphone "></i> Talk to Counselor',array('user/'),array('class'=>'orange'))?>
						</div>
					</div>
				</div>
		   </div>
            
          
        
        </div>
		
		
</div>

	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			