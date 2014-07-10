<?php $this->pageTitle='Articles';?>
	<div class="col-md-12 pull-left">
		<div class="mr0 col-md-12 pd0 fl">			
			<div class="col-md-12 pd0 fl " style="min-height:500px">
				<div class="mr0 pd0 col-md-12 artical mtb15">
				<p>Read the articles about different careers to update your knowledge and information. These are a crucial part of your Exploration stage!</p>
				</div>
				<ul>
					<?php if(!empty($articles)){?>
					 <?php $count=0; foreach($articles as $list){ $count=abs($count-1);?>
					<li class="col-md-6 row pd0 art-class <?php echo (!$count)?'mla':'';?>">
						<a href="<?php echo CController::createUrl("/site/article",array('id'=>$list->id));?>">
						<div class="pd0 col-md-12">
							<h1><?php echo $list->title;?></h1>
							<span class="date"><?php echo date('M d, Y',strtotime($list->add_date));?></span>
                            <div class="clear"></div>
                            <div  style="float:left;padding:6px;" >
<img src="<?php echo Yii::app()->baseUrl;?>/uploads/articles/small/<?php echo $list->image;?>" width="100px"/>
							</div>
                            <p><?php echo substr(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $list->description)),0,230);?></p>
							<?php //echo CHtml::link('Read Full..',array('/site/article','id'=>$list->id));?>
						</div>
						</a>
					</li>
                    <?php echo (!$count)?'<div class="clear"></div>':'';?>
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