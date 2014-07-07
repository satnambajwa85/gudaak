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
					 <span>Events</span>
				</div>
				<ul>
					 <?php foreach($events as $list){ ?>
                     <li class="col-md-12 row pd0 event-class">                    
                    <?php echo CHtml::link('<div class="col-md-12">
						<div class="width_set" >
							<div class="left">'.$list->title.'</div>
							<div class="right"><span class="date">'.date('M d, Y',strtotime($list->add_date)).'</span></div>
						</div>	
						<div class="width_set1">
							
                            <div class="clear"></div>
                            <div  style="float:left;padding:6px;" >
<img src="'.Yii::app()->baseUrl.'/uploads/events/large/'.$list->image.'" width="100px"/>
							</div>
                            <p>'.substr(preg_replace("/<img[^>]+\>/i", " ", $list->decription),0,230).'</p>	
						</div>							
						</div>',array('user/readEvent','id'=>$list->id));?>
						
					
					</li>
                    
                     
					<?php } ?>
				</ul>
                
			</div>
		</div>
</div>
<div class="news pd0 fl">
	<?php  $this->Widget('WidgetNews'); ?>
</div>
			