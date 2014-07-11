<?php $this->pageTitle=Yii::app()->name . ' - Articles';
$this->breadcrumbs=array('Articles'=>array('/site/articles'),''.$articles->title.'');?>
<div class="col-md-12 pd0">
	<div class="col-md-10 pull-left">
		<div class="mr0 col-md-12 pd0 fl">
        <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'','links'=>$this->breadcrumbs,));?>
			<div class="col-md-12 pd0 fl newsupdates" >		 
			<div class="col-md-12 pd0 fl">
				 <h1 style="font-size:20px;color: #F7A944;font-family: robotomedium;"><?php echo $articles->title;?></h1>
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=846828762012851&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="<?php echo Yii::app()->createAbsoluteUrl('/site/article',array('id'=>$id));?>" data-numposts="5" data-colorscheme="light"></div>          


			</div>
            </div>
		</div>
</div>
<div class="col-md-2 pd0 pull-right">
	<?php  $this->Widget('WidgetNews'); ?>
</div>
</div>           