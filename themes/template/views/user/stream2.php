	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Stream Preference </h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>

			</div>
			
		</div>
        	<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left middle-format-left">
				<h1>Stream Preference </h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
				</p>

			</div>
			
		</div>
        <div class="col-md-12 fl pd0 br-all">
        	<div class="col-md-8 pull-left fl pd0">
                    <div class="col-md-12 fl pd0 br-right">
                    	<div class="col-md-3 pull-left pd0 stream-img">
 
							<img  src="<?php echo Yii::app()->theme->baseUrl;?>/images/caree.jpg" />
	                    </div>
                     	<div class="col-md-9 pull-left user-streams-list ">
                        	<h1>Humanities/Art</h1>
                            <p>It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be</p>
                            <?php echo CHtml::link('View complete details...',array('user/'));?>
                       </div>
                    </div>
        
	        </div>
            <div class="col-md-2 pull-left stream-ratting pd0">
        		<span>Your rating for this stream</span>
               	<ul class="star-rating fl pd0">
                    <li><i class="yellow icon-star"></i></li>
                    <li><i class="yellow icon-star"></i></li>
                    <li><i class="yellow icon-star"></i></li>
                    <li><i class="yellow icon-star"></i></li>
                    <li><i class="yellow icon-star"></i></li>
				</ul>
        
	        </div>
            
            <div class="col-md-2 pull-left stream-ratting pd0 br-left">
        		<span>Do you think this is the best stream for you then</span>
                <div class="clear"></div>
               	<?php echo CHtml::link('Make Final',array('user/'),array('class'=>'white-text btn btn-warning'));?>
        
	        </div>
        
        </div>
		
		
</div>

	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			