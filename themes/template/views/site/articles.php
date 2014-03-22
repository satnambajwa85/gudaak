<<<<<<< HEAD
<?php $this->pageTitle=Yii::app()->name . ' - Articles';
$this->breadcrumbs=array('Articles'=>array('/user/articlesList'));?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			
			<div class=" newsupdates">
				<div class="mr0 pd0 col-md-12   artical">
					 <h1>Articles</h1>
					 
				</div>
				<ul>
					<?php if(!empty($articles)){?>
					 <?php foreach($articles as $list){ ?>
					<li>
						<div class="pd0 col-md-12">
							<h1><?php echo $list->title;?></h1>
							<span><?php echo Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($list->add_date, 'yyyy-MM-dd'),'medium',null);?></span>
							<p><?php echo substr($list->description,0,230);?>..</p>
							<?php echo CHtml::link('Read Full..',array('/site/articles','id'=>$list->id));?>
						</div>
					
					</li>
					<?php } ?>
					<?php }else{  ?>
					<li>
						<div class="pd0 col-md-12">
							<h1>Articles records are not found.</h1>
							
						</div>
					
					</li>
					<?php } ?>
				</ul>
				<div class="col-md-6 pull-left">
					<?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
				</div>
			</div>

			
			
		</div>
		 
		 
</div>
	
	<!--<div class="news pd0 fr">
		<?php  //$this->Widget('WidgetNews'); ?>
	</div>-->
=======
<?php $this->pageTitle=Yii::app()->name . ' - Articles';
$this->breadcrumbs=array('Articles'=>array('/user/articlesList'));?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			
			<div class=" newsupdates">
				<div class="mr0 pd0 col-md-12   artical">
					 <h1>Articles</h1>
					 
				</div>
				<ul>
					<?php if(!empty($articles)){?>
					 <?php foreach($articles as $list){ ?>
					<li>
						<div class="pd0 col-md-12">
							<h1><?php echo $list->title;?></h1>
							<span><?php echo Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($list->add_date, 'yyyy-MM-dd'),'medium',null);?></span>
							<p><?php echo substr($list->description,0,230);?>..</p>
							<?php echo CHtml::link('Read Full..',array('/site/articles','id'=>$list->id));?>
						</div>
					
					</li>
					<?php } ?>
					<?php }else{  ?>
					<li>
						<div class="pd0 col-md-12">
							<h1>Articles records are not found.</h1>
							
						</div>
					
					</li>
					<?php } ?>
				</ul>
				<div class="col-md-6 pull-left">
					<?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
				</div>
			</div>

			
			
		</div>
		 
		 
</div>
	
	<!--<div class="news pd0 fr">
		<?php  //$this->Widget('WidgetNews'); ?>
	</div>-->
>>>>>>> 1279c3defb076de0d6ec381dd9fb5ee2f5bae04d
			