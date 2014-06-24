<?php $this->pageTitle=Yii::app()->name . ' - Articles';
$this->breadcrumbs=array('Articles'=>array('/site/articles'),''.$articles->title.'');?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 pd0 fl">
        <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'','links'=>$this->breadcrumbs,));?>
					 
			<div class="mr0 mt10 col-md-12 pd0 fl artical">
				 <h3><?php echo $articles->title;?></h3><br />
				 <div class="clear"></div>
				 <div class="col-md-12 br-all pd0  fl">
					<div class="col-md-3 pd0 post-info fl">
						<span>Posted on</span>
						<datetime class="date-time fl">
							<?php echo Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($articles->add_date, 'yyyy-MM-dd'),'medium',null);?>
						</datetime>
					</div>
				</div>
				<div class="clear"></div>
				<p>
				<?php echo substr($articles->description,0,3000);?>	
				</p>
                
                <?php $this->widget('ext.YiiDisqusWidget.YiiDisqusWidget',array('shortname'=>'gudaak'));?>
                

			</div>
		</div>
</div>
			