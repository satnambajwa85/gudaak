<?php $this->pageTitle='Explore';
$this->breadcrumbs=array('Explore'=>array('/user/streamExplore'));?>
	<div class="col-md-10 pull-left">
						<?php if(Yii::app()->user->hasFlash('sccess')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('sccess'); ?></strong>
						</div>
							 
					<?php endif; ?>	
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<!--<h1>Stream Explore</h1>-->
                <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
				<p>&nbsp;</p>
			</div>
			<div class="clear"></div>
			<?php foreach($data as $list){ ?>
			<div class="col-md-3 pdleft career-lib">
				<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/career/small/'.$list['image'].'"/>',array('user/careerInfo','id'=>''.$list['id'].''),array('class'=>'fl'));?>
				<div class="clear"></div>
				<?php echo CHtml::link('<h1>'.substr($list['title'],0,20).'..</h1>',array('user/careerInfo','id'=>''.$list['id'].''),array('title'=>$list['title']));?>
				<p><?php echo substr($list['description'],0,70);?></p>
				<div class="col-md-12 career-hot-links">
				<?php echo CHtml::link($list['title'],array('user/careerInfo','id'=>''.$list['id'].''),array('class'=>'pull-left','title'=>'Read Full.'));?>
					<span class="pull-right"><!--<i class="icon-eye-open"></i>19021--></span>
				</div>
			</div>
		<?php } ?>
		
			
		</div>

</div>
			<div class="news pd0 pull-left">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>      