	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			
			<div class="mr0 col-md-6  fl newsupdates">
				<div class="mr0 pd0 col-md-12   artical">
					 <h1>News and Updates</h1>
					 
				</div>
				<ul>
					 <?php foreach($news as $list){ ?>
					<li>
						<div class="pd0 col-md-12">
							<h1><?php echo $list->title;?></h1>
							<span><?php echo Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($list->add_date, 'yyyy-MM-dd'),'medium',null);?></span>
							<p><?php echo substr($list->description,0,230);?>..</p>
							<?php echo CHtml::link('Read Full..',array('user/articles','id'=>$list->id));?>
						</div>
					
					</li>
					<?php } ?>
				</ul>
				<div class="col-md-6 pull-left">
					<?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
				</div>
			</div>
			<div class="mr0 col-md-6  fl events">
				<div class="mr0 col-md-12 pd0  artical">
					 <h1>Events and Updates</h1>
					 
				</div>
				<ul>
					 <?php foreach($events as $list){ ?>
					<li>
						<div class="pd0 col-md-12">
							<h1><?php echo substr($list->title,1,50);?></h1>
							<?php echo CHtml::link(' <img src="'.Yii::app()->baseurl.'/uploads/events/large/'.$list->image.'"/>',array('user/readEvent','id'=>$list->id),array('style'=>'padding:0px !important'));?>
							<p><?php echo substr($list->decription,1,175);?>..
							</p>
							<?php echo CHtml::link('Read more..',array('user/readEvent','id'=>$list->id));?>
							 
						</div>
					
					</li>
					<?php } ?>
					
				</ul>
				 
			</div>
			
			
		</div>
		 
		 
</div>
	
	<div class="col-md-2 pd0 fl">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			