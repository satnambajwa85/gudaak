<?php $this->pageTitle=Yii::app()->name . ' - Articles';
$this->breadcrumbs=array('Articles'=>array('/site/articles'),''.$articles->title.'');?>
	<div class="col-md-12 pull-left">
		<div class="mr0 col-md-12 pd0 fl">
        <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'','links'=>$this->breadcrumbs,));?>
			<div class="mr0 col-md-12  fl newsupdates art_c" >		 
			<div class="mr0 mt10 col-md-12 pd0 fl artical">
				 <h1 style="font-size:20px;"><?php echo $articles->title;?></h1><br />
				 <div class="clear"></div>
                 <div class="col-md-3 fl pd0">
                    <datetime class="date-time fl">
                        Posted on <?php echo date('M d, Y',strtotime($articles->add_date));?>
                    </datetime>
                </div>
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
				<?php echo $articles->description;?>	
				</p>
                <div class="col-md-6">
                <?php $this->widget('ext.YiiDisqusWidget.YiiDisqusWidget',array('shortname'=>'gudaak'));?>
                </div>

			</div>
            </div>
		</div>
</div>
			