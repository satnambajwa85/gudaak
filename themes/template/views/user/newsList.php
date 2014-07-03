<?php $this->pageTitle='News';
$this->breadcrumbs=array('News'=>array('/user/newsUpdates'));?>

	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			
			<div class="mr0 col-md-12  fl newsupdates">
				<div class="mr0 pd0 col-md-12   artical">
					 <!--<h1>Notifications</h1>-->
                     <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
					 
				</div>
				<ul>
					 <?php  foreach($news as $list){ ?>
					<li class="col-md-6  art-class">
						<div class="pd0 col-md-12">
							<h1><?php echo $list->title;?></h1>
							<span><?php echo date('M d, Y',strtotime($list->add_date));?></span>
							<p class="mt15"><?php echo substr($list->description,0,230);?>..</p>
							<?php echo CHtml::link('Read Full..',array('user/news','id'=>$list->id));?>
						</div>
					</li>
					<?php } ?>
				</ul>
				<div class="col-md-6 pull-left">
					<?php $this->widget('CLinkPager', array('pages' => $pages2,)) ?>
				</div>
			</div>			
		</div>
</div>
<div class="news pd0 fl">
	<?php  $this->Widget('WidgetNews'); ?>
</div>
			