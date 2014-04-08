<?php $this->pageTitle=Yii::app()->name . ' - ShortListed Colleges';
$this->breadcrumbs=array('ShortListed Colleges'=>array('/user/shortListedColleges'));?>
	<div class="col-md-10 pull-left col-page-title">
		 <h1 style="width:100%">Shortlisted & recomeded colleges</h1>
         <p>
         You choose to Apply for these colleges. Want to change the list? You can add or drop colleges from the list         
         </p>
         
		 <div class="col-md-12 pull-left pd0 ">
		 <?php 	 $count=1;?>
		 <?php foreach ($collegesList as $list){
						if($count%2 == 0)
							$class='college-info-right';
						else 
							$class='college-info';			 
							$count= $count+1;
		 ?>
			<div class="col-md-6 pull-left <?php echo $class;?>   pd-b6">
				<h1>Shortlisted colleges</h1>
				<ul id="collage">
					<li style="height:100px;">
						<div class="col-md-12 pd0 pull-left border ">
							<div class="col-md-2 pd0 pull-left left-list">
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/schoo-logo.jpg"/>
							</div>
							<div class="col-md-10 pd5 pull-left middle-list">
								<h2><?php echo $list->institutes->name; ?></h2>
								<p><?php echo substr($list->institutes->address1,0,60);?></p>
								<span><i class=" icon-mobile-phone"></i><?php echo $list->institutes->phone_number.'  '.$list->institutes->work_phone_no.'  '.$list->institutes->official_contact_no; ?></span>
								<a href="mailto:<?php echo $list->institutes->email;?>" title="<?php echo $list->institutes->email;?>"><span><i class=" icon-envelope-alt"></i><?php echo $list->institutes->email;?></span></a>
								<a href="<?php echo $list->institutes->website;?>" title="<?php echo $list->institutes->website;?>" target="_blank"><span><i class=" icon-link"></i><?php echo $list->institutes->website;?></span></a>
								
								
							</div>
							<!--<div class="col-md-2 pd0 pull-left  right-list	">
								<h3>Rating</h3>
								<h4>405/ 7</h4>
								<?php echo CHtml::link('Apply Now')?>
							</div>-->
						</div>
					</li>
					
				</ul>
				
			</div>
			<?php  } ?>
		
		 </div>
		 
		 
	</div>
	
	<div class="news pd0 pull-left">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			