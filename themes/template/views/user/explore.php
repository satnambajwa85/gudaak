<?php $this->pageTitle	=	'Explore Career';
$this->breadcrumbs=array('Explore'=>array('/user/explore'));?>
	<div class="career-bot pull-left">
						<?php if(Yii::app()->user->hasFlash('sccess')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('sccess'); ?></strong>
						</div>
							 
					<?php endif; ?>
                    <div class="mr0  pull-left stream-pref">
				<!--<h1>Explore Career </h1>-->
                <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
				<p>Explore different career options here with well researched and easy to understand description and interesting videos.<br />
<!--<strong>Don't forget to fill the star rating option given on the right side for each of the careers that will be important when you set your preferences at the later stage.</strong><br />--><br />
				</p>

			</div>
                    	
		<div class="mr0 col-md-12 fl">
			
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
                <a href="javascript:void();"><h1>&nbsp;</h1></a>
				<?php //echo CHtml::link('<h1>'.substr($list['title'],0,20).'..</h1>',array('user/careerList','id'=>''.$list['id'].''),array('title'=>$list['title']));?>
				<p><?php echo substr(strip_tags($list['description']),0,70);?></p>
				<div class="col-md-12 career-hot-links">
                	<?php echo CHtml::link(substr($list['title'],0,20).'..',array('user/careerList','id'=>''.$list['id'].''),array('class'=>'pull-left','title'=>$list['title']));?>
				<?php //echo CHtml::link('Read more..',array('user/readFull','id'=>''.$list['id'].''),array('class'=>'pull-left','title'=>'Read Full.'));?>
					<!--<span class="pull-right"><i class="icon-eye-open"></i>19021</span>-->
				</div>
			</div>
		<?php } ?>
		
			
		</div>

</div>
			<div class="news pd0 fr">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>      