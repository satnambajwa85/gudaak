<?php $this->pageTitle	=	$articles->title;
$this->breadcrumbs=array('Articles'=>array('/user/articlesList'),''.$articles->title.'');?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0 col-md-12  pd0 fl artical">
				<h1><?php //echo $articles->title;?></h1>
                 <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?>
				 <span>by <?php echo $articles->author;?></span>
				 <div class="clear"></div>
				 <div class="col-md-12 pd0  fl">
					<div class="col-md-3 pd0 post-info fl">
						<span>Posted on</span>
						<datetime class="date-time fl">
							<?php echo date('M d, Y',strtotime($articles->add_date));?>
						</datetime>
					</div>
				 </div>
                 <hr />
				  <div class="clear"></div>
                <?php if(!empty($articles->image)){?>
<div class=" row col-md-11" style="float:left;padding:6px;" >
<img src="<?php echo Yii::app()->baseUrl;?>/uploads/articles/original/<?php echo $articles->image;?>" width="80%" />
</div>
<div class="clear"></div>
				<?php } ?>
				<p>
				<?php echo $articles->description;?>	
				</p>
				<?php if(!empty($articles->role)){?>
                <h2 class="about-author">About the author</h2>
				 <p>	
					<?php echo $articles->role;?>	
					
				</p>
                <?php } ?>
			</div>
		</div>
	</div>
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>