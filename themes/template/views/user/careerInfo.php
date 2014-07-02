<div class="career-bot pull-left">
	<div class="mr0 col-md-12 fl">
		<div class="mr0  pull-left middle-format-left">
			<h1><?php echo $career->title;?>
            <?php echo CHtml::link('Back',array('/user/careerList','id'=>$career->id),array('class'=>'pull-right','style'=>'font-size: 13px;text-decoration: underline;color:#42C6C1;'));?></h1>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
			<img src="<?php echo Yii::app()->baseUrl;?>/uploads/career/small/<?php echo $career->image;?>" class="fl mr-l"/>
			<?php echo $career->description;?>
		</div>
	</div>	
</div>
	
<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
</div>
			