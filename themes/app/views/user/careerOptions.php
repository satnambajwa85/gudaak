<div class="border">
		<ol class="breadcrumb">
		  <li><a href="#">Explore</a></li>
		 
		</ol>
	</div>
	<div class="col-md-9 pull-left">
		<div class="mr0 col-md-12">
			<div class="mr0  pull-left middle-format-left">
				<h1><?php echo $careerOptions1->career->title;?></h1>
				<p><?php echo $careerOptions1->career->description;	?></p>
				<?php echo CHtml::ajaxLink('Konw more about Career Library',array(''));?>
			</div>
			<div class="col-md-12 pull-left chat-left-area">
				<ul id="tabs">
					 <li><a href="#subjects">Subjects</a></li>
					<li><a href="#career">Career Options</a></li>
				
					
				</ul>
				<div id="subjects" class="row tab-section">
					<div class="col-md-3 pull-left preferred-career">
						<h2>Preferred Careers</h2>
						<ul>
							<?php foreach($careerOptions2 as $list){?>
							<li><?php echo CHtml::ajaxLink($list->title, array(''), array('update'=>'#dialogWrapper'));?></li>
							<?php } ?>
					
						</ul>
					</div>
					<div class="col-md-9   pull-left preferred-career-info">
						<h2>Preferred Careers</h2>
						<ul id="career-description-tabs">
							 <li><a href="#overview">Overview</a></li>
							 <li><a href="#overview">Overview</a></li>
							 <li><a href="#overview">Overview</a></li>
							 <li><a href="#overview">Overview</a></li>
							 <li><a href="#overview">Overview</a></li>
						</ul>
						<div class="clear"></div>
						<div id="overview" class="row col-md-12 tab-visible ">
							<h2 class="overview-title"></h2>
						</div>
						
					</div>
				</div>
				
				<div id="career" class="tab-section">
					<div class="col-md-9 pull-left">
						<h2>Ceramic Technology</h2>
						
					</div>
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
			