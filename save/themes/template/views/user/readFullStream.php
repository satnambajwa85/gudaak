<div class="career-bot pull-left">
	<div class="mr0 col-md-12 fl">
		<div class="mr0  pull-left middle-format-left">
			<h1><?php echo $readFull->name;?></h1>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
			<img src="<?php echo Yii::app()->baseUrl;?>/uploads/stream/small/<?php echo $readFull->image;?>"/>
			<p><?php echo $readFull->description;?></p>
		</div>
	</div>	
</div>
	
<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
</div>
			