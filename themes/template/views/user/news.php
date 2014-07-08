<?php $this->pageTitle='News';
$this->breadcrumbs=array('News'=>array('/user/newsUpdates'));?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0 col-md-12 pd0 fl artical">
				 <h1>&nbsp;<!--Gudaak helps you to fullfill news--></h1>
				 <h3><?php echo $news->title;?></h3>
				 <span class="pd5">by admin</span>
				 <div class="clear"></div>
				 <div class="col-md-12 br-all pd0  fl">
					<div class="col-md-3 pd10 post-info fl">
						<span>Posted on</span>
						<datetime class="date-time fl">
							<?php echo date('M d, Y',strtotime($news->add_date));?>
						</datetime>
					</div>
					
				 </div>
				  <div class="clear"></div>
				<p class="mt15">
				<?php echo strip_tags($news->description);?>	
				</p>
				
			</div>
			
			
		</div>
		 
		 
</div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			