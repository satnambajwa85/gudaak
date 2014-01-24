<div class="col-xs-12 col-sm-6 col-md-5 pull-left dashboard-logo white">
					<div class="dashboard-logo  pull-left">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/dashboard-logo.png">
					</div>
					<div>
						<h1>Stream Explore</h1>
						<span>It is long established fact a reader will be It is long established fact a reader will be
								It is long established fact a reader will be 
						</span>
						
						<a href="#">Konw more about stream explore</a>
					</div>
</div>
<div class="row col-xs-12 col-sm-6 col-md-7 pull-right banner">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/banner.png">
				</div>
<div class="clearfix"></div>
<div class="border">
		<ol class="breadcrumb">
		  <li><a href="#">Explore</a></li>
		 
		</ol>
	</div>
	<div class="col-md-9 pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left middle-format-left">
				<h1>Interest Test</h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>
				<?php echo CHtml::ajaxLink('Konw more about Career Library',array(''));?>
			</div>
			
		</div>
		<div class="clear"></div>
		<div class="row educationbot">
		
			<?php foreach($career as $data){?>
			<div class="col-md-4 pull-left">
				<img src="<?php echo Yii::app()->baseUrl;?>/uploads/career/small/<?php echo $data->image;?>"/>
				<div class="description pull-right col-md-6">
					<?php echo CHtml::link('<h3>'.$data->title.'</h3>',array('user/careerOptions','id'=>''.$data->id.''));?>
					<p><?php echo substr($data->description,0,70);?></p>
					<div class="">
					<ul class="fl">
						<li><i class="yellow icon-star"></i></li>
						<li><i class="yellow icon-star"></i></li>
						<li><i class="yellow icon-star"></i></li>
						<li><i class="yellow icon-star"></i></li>
						<li><i class="yellow icon-star"></i></li>
					</ul>
						 
					</div>
					 
				</div>
			</div>
			<?php } ?>
			
	</div>
</div>
	
	<div class="col-md-3 pd0 pull-left">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			