<div class="career-bot pull-left">
	<div class="mr0 col-md-12 fl">
		<div class="mr0  pull-left middle-format-left">
			<h1><?php echo $event->title;?></h1>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
			<?php 
				$filename = ''.$event->image.'';
				 $path=Yii::getPathOfAlias('webroot.uploads.events.large') . '/';
				$file=$path.$filename;
				if (file_exists($file)){ ?>
					<img src="<?php echo Yii::app()->baseUrl;?>/uploads/events/large/<?php echo $event->image;?>" class="fl mr-l"/>
					<?php 	}else{ ?>
					<img src="<?php echo Yii::app()->baseUrl;?>/uploads/events/large/noimage.jpg" class="fl mr-l"/>
					
					<?php } ?>
			<?php echo $event->decription;?>
		</div>
	</div>	
</div>
	
<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
</div>
			