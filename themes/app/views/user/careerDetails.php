<div class="col-md-9 pull-left">
		<div class="mr0 col-md-12">
			<div class="mr0  pull-left middle-format-left">
				<h1><?php echo $careerDetails->title;?></h1>
				<p><?php echo substr($careerDetails->description,0,250);?></p>
				<?php echo CHtml::ajaxLink('Konw more about Career Library',array(''));?>
			</div>
			<div class="pd0 col-md-12 pull-left ">
				<div class="pd0 col-md-3 career-list-view pull-left">
					<ul>
						<?php $getting='glyphicon glyphicon-send';$opper=''?>
						<?php foreach($careerDetailsList as $list){ ?>
						<li>
							<a href="#tab<?php echo $list->id;?>"><i class="icon-dropbox"></i><?php echo $list->title?></a>
							<i class="icon-caret-left pull-right "></i>
						</li>
						<?php } ?>
						
					
						
					</ul>
				</div>	
				<div class="pd0 col-md-9  pull-left">
					<?php foreach($careerDetailsList as $list){ ?>
					<div id="tab<?php echo $list->id;?>" class="career-tab-section">
						<h1><?php echo $list->title?></h1> 
							<?php echo $list->description;?>						
						
					</div>
					<?php } ?>
				</div>						
					
				
				
			 
			</div>
			
		</div>
		<div class="clear"></div>
		<div class="row educationbot  fl">

	</div>
</div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			