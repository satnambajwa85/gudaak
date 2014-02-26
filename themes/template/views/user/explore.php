<?php $this->pageTitle=Yii::app()->name . ' - Explore';
$this->breadcrumbs=array('Explore'=>array('/user/explore'));?>
	<div class="career-bot pull-left">
						<?php if(Yii::app()->user->hasFlash('sccess')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('sccess'); ?></strong>
						</div>
							 
					<?php endif; ?>	
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Explore Career </h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>

			</div>
			<?php foreach($data as $list){ ?>
			<div class="col-md-3 career-lib mb0">
			<?php 
						$filename = ''.$list['image'].'';
						 $path=Yii::getPathOfAlias('webroot.uploads.career.small') . '/';
						$file=$path.$filename;
						if (file_exists($file)){ ?>
						<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/career/small/'.$list['image'].'"/>',array('user/careerList','id'=>''.$list['id'].''),array('class'=>'fl'));?>
				<?php 	}else{ ?>
						<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/career/small/noimage.jpg"/>',array('user/careerList','id'=>''.$list['id'].''),array('class'=>'fl'));?>
					
				<?php } ?>
				<div class="clear"></div>
				<?php echo CHtml::link('<h1>'.substr($list['title'],0,20).'..</h1>',array('user/careerList','id'=>''.$list['id'].''),array('title'=>$list['title']));?>
				<p><?php echo substr($list['description'],0,70);?></p>
				<div class="col-md-12 career-hot-links">
				<?php echo CHtml::link('Read more..',array('user/readFull','id'=>''.$list['id'].''),array('class'=>'pull-left','title'=>'Read Full.'));?>
					<span class="pull-right"><i class="icon-eye-open"></i>19021</span>
				</div>
			</div>
		<?php } ?>
		
			
		</div>

</div>
			<div class="news pd0 fr">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>      