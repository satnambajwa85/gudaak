<?php $this->pageTitle='Articles';
$this->breadcrumbs=array('Home'=>array('/site'),'Articles'=>array('/site/articles'));?>
	<div class="col-md-12 pull-left">
		<div class="mr0 col-md-12 pd0 fl">
			<div class="mr0 col-md-12  fl newsupdates">
				<div class="mr0 pd0 col-md-12 artical">
					  <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'','links'=>$this->breadcrumbs,));?>
					 <p>Read the articles about different careers to update your knowledge and information. These are a crucial part of your Exploration stage!<br /><br /></p>
				</div>
                <div id="scrollBar" class="col-md-12" style="min-height:535px;">
					<ul>
					<?php if(!empty($articles)){?>
					 <?php $count=0; foreach($articles as $list){ $count=abs($count-1);?>
					<li class="col-md-6 row pd0 art-class <?php echo (!$count)?'mla':'';?>">                    
                    <?php echo CHtml::link('<div class="col-md-12">
							<h1 class="listAtrical">'.$list->title.'</h1>
							<span class="date">'.date('M d, Y',strtotime($list->add_date)).'</span>
                            <div class="clear"></div>
                            <div  style="float:left;padding:6px;" >
<img src="'.Yii::app()->baseUrl.'/uploads/articles/small/'.$list->image.'" width="100px"/>
							</div>
                            <p>'.substr(strip_tags($list->description),0,350).'....</p>							
						</div>',array('article','id'=>$list->id));?>
						
					
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
                </div>
                
		</div>
	</div>
</div>
 