<?php $this->pageTitle='News';
$this->breadcrumbs=array('News'=>array('/user/newsUpdates'));?>
<div id="partial-render">
	<div class="col-md-10 pull-left pd0">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0 col-md-12 fl artical">
				 <h1>&nbsp;<!--Gudaak helps you to fullfill news--></h1>
				 <h3><?php echo $news->title;?></h3>
				<div class="col-md-3 fl pd0">
                    	<span class="fl" style="margin-bottom:0px;">by admin </span>
						<datetime class="date-time fl">
                        	Posted on <?php echo date('M d, Y',strtotime($news->add_date));?>
						</datetime>
					</div>
					
				<div class="clear"></div>
				<p class="mt15">
				<?php echo strip_tags($news->description);?>	
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-2 pd0  pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
</div>