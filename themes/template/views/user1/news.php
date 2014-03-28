	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0 col-md-9 pd0 fl artical">
				 <h1>Gudaak helps you to fullfill news</h1>
				 <h3><?php echo $news->title;?></h3>
				 <span>by admin</span>
				 <div class="clear"></div>
				 <div class="col-md-12 br-all pd0  fl">
					<div class="col-md-3 pd0 post-info fl">
						<span>Posted on</span>
						<datetime class="date-time fl">
							<?php echo Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($news->add_date, 'yyyy-MM-dd'),'medium',null);?>
						</datetime>
					</div>
					<div class="col-md-3  post-info fl">
						<span>Views</span>
						<datetime class="date-time fl">
							12,398
						</datetime>
					</div>
				 </div>
				  <div class="clear"></div>
				<p>
				<?php echo substr($news->description,0,3000);?>	
				</p>
				 <h2 class="about-author">About the author</h2>
				 <p>	
					It is long established fact a reader will be It is long established fact a reader will b
					
				</p>
			</div>
			<div class="mr0 col-md-3 mt20 fl">
				 <div class="mr0 col-md-12 color-light-green related-article fl">
					<h4>Related news</h4>
				 </div>
				 <div class="mr0 col-md-12 br-all fl">
					<div class="article-img fl">
						<img src="<?php echo Yii::app()->theme->baseUrl?>/images/thumb1.jpg" />
						<?php echo CHtml::link('Read Online',array('user/'));?>
						<?php echo CHtml::link('share',array('user/'),array('class'=>'fr'));?>
						<div class="advertise">
							<h3>Title Here</h3>
							<ul class="star-rating fl pd0">
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
							</ul>
						</div>
						<div class="buttom-bg"></div>
					</div>
					 <div class="article-img fl">
						<img src="<?php echo Yii::app()->theme->baseUrl?>/images/thumb1.jpg" />
						<?php echo CHtml::link('Read Online',array('user/'));?>
						<?php echo CHtml::link('share',array('user/'),array('class'=>'fr'));?>
						<div class="advertise">
							<h3>Title Here</h3>
							<ul class="star-rating fl pd0">
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
							</ul>
						</div>
						<div class="buttom-bg"></div>
					</div>
					 
				 </div>
				
			</div>
			
		</div>
		 
		 
</div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			