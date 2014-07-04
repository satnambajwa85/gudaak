<?php $this->pageTitle='Notifications';
$this->breadcrumbs=array('Notifications'=>array('/user/newsUpdates'));?>

	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0 col-md-6  fl newsupdates">
				<div class="mr0 pd0 col-md-12 artical">
					 <!--<h1>Notifications</h1>-->
                     <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
				</div>
				<ul>
					<li>
						<div class="col-md-12">
							<h1>Notifictaion title</h1>
							<span><?php echo date('M d, Y');?></span>
							<p class="mt15">this is dummamy data..</p>
							<?php //echo CHtml::link('Read Full..',array('user/news','id'=>$list->id));?>
						</div>
					</li>
				</ul>
			</div>
			<div class="mr0 col-md-6  fl events">
				<div class="mr0 col-md-12 pd0  artical">
					 <h1>Events</h1>
				</div>
				<ul>
					 <?php foreach($events as $list){ ?>
					<li>
						<div class="pd0 col-md-12">
							<h1><?php echo $list->title,0,50;?></h1>
							<?php echo CHtml::link(' <img src="'.Yii::app()->baseurl.'/uploads/events/large/'.$list->image.'"/>',array('user/readEvent','id'=>$list->id),array('style'=>'padding:0px !important'));?>
							<p><?php echo substr($list->decription,0,250); echo CHtml::link('Read more..',array('user/readEvent','id'=>$list->id));?></p>
							
							 
						</div>
					
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
</div>
<div class="news pd0 fl">
	<?php  $this->Widget('WidgetNews'); ?>
</div>
			