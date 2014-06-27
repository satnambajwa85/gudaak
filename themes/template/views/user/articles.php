<?php $this->pageTitle	=	$articles->title;
$this->breadcrumbs=array('Articles'=>array('/user/articlesList'),''.$articles->title.'');?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0 col-md-12  pd0 fl artical">
				<h1><?php //echo $articles->title;?></h1>
                 <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
				 <span class="pd10">by <?php echo $articles->author;?></span>
				 <div class="clear"></div>
				 <div class="col-md-12 pd10 fl">
					<div class="col-md-3 pd0 post-info fl">
						<span>Posted on</span>
						<datetime class="date-time fl">
							<?php echo date('M d, Y',strtotime($articles->add_date));?>
						</datetime>
					</div>
				 </div>
                 <hr />
				  <div class="clear"></div>
                <?php if(!empty($articles->image)){?>
<div class=" row col-md-11" style="float:left;padding:10px;" >
<img src="<?php echo Yii::app()->baseUrl;?>/uploads/articles/large/<?php echo $articles->image;?>" width="80%" />
</div>
<div class="clear"></div>
				<?php } ?>
				<p style="margin-top: 10px;">
				<?php echo $articles->description;?>	
				</p>
				<?php if(!empty($articles->role)){?>
                <h2 class="about-author">About the author</h2>
				 <p>	
					<?php echo $articles->role;?>	
					
				</p>
                <?php } ?>
                
                 <div class="col-md-10">
                <?php $this->widget('ext.YiiDisqusWidget.YiiDisqusWidget',array('shortname'=>'gudaak'));?>
                </div>
                
			</div>
			<?php /*<div class="mr0 col-md-3 mt20 fl">
				 <div class="mr0 col-md-12 color-light-green related-article fl">
					<h4>Related articles</h4>
				 </div>
				 <div class="mr0 col-md-12 br-all fl">
					<div class="article-img fl">
						<img src="<?php echo Yii::app()->theme->baseUrl?>/images/thumb1.jpg" />
						<?php echo CHtml::link('Read more',array('user/'));?>
						<?php echo CHtml::link('share',array('user/'),array('class'=>'fr'));?>
						<div class="advertise">
							<h3>Title Here</h3>
							<!--<ul class="star-rating fl pd0">
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
							</ul>-->
						</div>
						<div class="buttom-bg"></div>
					</div>
					 <div class="article-img fl">
						<img src="<?php echo Yii::app()->theme->baseUrl?>/images/thumb1.jpg" />
						<?php echo CHtml::link('Read more',array('user/'));?>
						<?php echo CHtml::link('share',array('user/'),array('class'=>'fr'));?>
						<div class="advertise">
							<h3>Title Here</h3>
							<!--<ul class="star-rating fl pd0">
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
								<li><i class="yellow icon-star"></i></li>
							</ul>-->
						</div>
						<div class="buttom-bg"></div>
					</div>
					 
				 </div>
				
			</div>*/ ?>
			
		</div>
		 
		 
</div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			