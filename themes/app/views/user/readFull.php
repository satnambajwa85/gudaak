<div class="career-bot pull-left">
	<div class="mr0 col-md-12 fl">
		<div class="mr0  pull-left middle-format-left">
			<h1><?php echo $career->title;?></h1>
			<img src="<?php echo Yii::app()->baseUrl;?>/uploads/career_categories/small/<?php echo $career->image;?>"/>
			<?php echo $career->description;?>
		</div>
	</div>	
</div>
	
<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
</div>
			