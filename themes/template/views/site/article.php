<?php $this->pageTitle=Yii::app()->name . ' - Articles';
$this->breadcrumbs=array('Articles'=>array('/site/articles'),''.$articles->title.'');?>
	<div class="col-md-12 pull-left">
		<div class="mr0 col-md-12 pd0 fl">
        <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'','links'=>$this->breadcrumbs,));?>
			<div class="mr0 col-md-12  fl newsupdates art_c" >		 
			<div class="mr0 mt10 col-md-12 pd0 fl artical">
				 <h1 style="font-size:20px;"><?php echo $articles->title;?></h1>
				 <div class="clear"></div>
                 <?php if(isset($articles->add_date)){?>
                 <div class="col-md-12 fl pd0">
                    <datetime class="date-time fl">
                        Posted on <?php echo date('M d, Y',strtotime($articles->add_date));?>
                    </datetime>
                </div>
				<div class="clear"></div>
                <?php }?>
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
			