	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0 col-md-12 pd0 fl artical">
				 <h1>Gudaak helps you to fullfill news</h1>
				 <h3><?php echo $news->title;?></h3>
				 <span>by admin</span>
				 <div class="clear"></div>
				 <div class="col-md-12 br-all pd0  fl">
					<div class="col-md-3 pd0 post-info fl">
						<span>Posted on</span>
						<datetime class="date-time fl">
							<?php echo date('M d, Y',strtotime($news->add_date));?>
						</datetime>
					</div>
					
				 </div>
				  <div class="clear"></div>
				<p>
				<?php echo substr($news->description,0,3000);?>	
				</p>
				
			</div>
			
			
		</div>
		 
		 
</div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			