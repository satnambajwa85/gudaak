<?php $this->pageTitle='Gudaak helps you to fullfill articles';
$this->breadcrumbs=array('Articles'=>array('/user/articlesList'),''.$articles->title.'');?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
<<<<<<< HEAD
			<div class="mr0 col-md-9 pd0 fl artical">
				 <h1>Gudaak helps you to fullfill articles</h1>
				 <h3><?php echo $articles->title;?></h3>
=======
			<div class="mr0 col-md-9  pd0 fl artical">
				<h1><?php //echo $articles->title;?></h1>
                 <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
				 
>>>>>>> 1279c3defb076de0d6ec381dd9fb5ee2f5bae04d
				 <span>by <?php echo $articles->author;?></span>
				 <div class="clear"></div>
				 <div class="col-md-12 pd0  fl">
					<div class="col-md-3 pd0 post-info fl">
						<span>Posted on</span>
						<datetime class="date-time fl">
							<?php echo Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($articles->add_date, 'yyyy-MM-dd'),'medium',null);?>
						</datetime>
					</div>
					<!--<div class="col-md-3  post-info fl">
						<span>Views</span>
						<datetime class="date-time fl">
							12,398
						</datetime>
					</div>-->
				 </div>
                 <hr />
				  <div class="clear"></div>
				<p>
				<?php echo $articles->description;?>	
				</p>
				<?php if(!empty($articles->role)){?>
                <h2 class="about-author">About the author</h2>
				 <p>	
					<?php echo $articles->role;?>	
					
				</p>
                <?php } ?>
			</div>
			<div class="mr0 col-md-3 mt20 fl">
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
				
			</div>
			
		</div>
		 
		 
</div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			