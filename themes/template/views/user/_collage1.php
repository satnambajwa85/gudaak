<div class="career-bot pull-left mt20 ">
		<div class="coll_logo mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/coll_logo.png" alt="logo"></div>   
        <div class="head_text_coll mb10"><?php echo $Institutes->name;?><br>
            <span><?php echo $Institutes->phone_number.' <br/>'.$Institutes->email.' <br/>'.$Institutes->website;?></span>
          <div class="pull-right col-md-4">  
          <?php echo CHtml::ajaxlink('Shortlist College',array('user/UserShortlistCollage','id'=>$Institutes->id),array('update'=>'#messagePrint'),array('class'=>'css-label btn  pull-right btn-warning'));?>
          <div class="pull-right alertSat" id="messagePrint"></div>
          </div>
        </div>
        <div class="head_text_coll mt20" style="width:100%;">
         	<span style="width:20%; float:left;"><?php echo $Institutes->address1;?></span>
         </div>
<?php 
$list	=	array();
foreach($Institutes->collagesCoursesSpecialization as $cou){
	$list[$cou->specialization->id]['id']		=	$cou->specialization->id;
	$list[$cou->specialization->id]['title']	=	$cou->specialization->title;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['id']		=	$cou->courses->id;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['title']	=	$cou->courses->title;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['admission_criteria']	=	$cou->admission_criteria;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['entrance_exam']	=	$cou->entrance_exam;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['fees']	=	$cou->fees;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['seats']	=	$cou->seats;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['course_mode']	=	$cou->course_mode;
} ?>

		<div class="coll_section_left">
			<ul class="nav nav-tabs">
			<?php
			$count	=	0;
			 foreach($list as $cou){?>
				<li <?php echo ($count==0)?'class="active"':'';?>><a href="#t<?php echo $cou['id'];?>" data-toggle="tab"><?php echo $cou['title'];?></a></li>
			<?php 
			$count++;
			} ?>
			</ul>

<!-- Tab panes -->
<div class="tab-content " style="padding:15px;">
	<?php
	$count	=	0;
	foreach($list as $cou){?>
		<div class="tab-pane <?php echo ($count==0)?'active':'';?>" id="t<?php echo $cou['id'];?>">
		<?php foreach($cou['course'] as  $sat){?>
				
                Title :<?php echo $sat['title'];?><br />
				Admission Criteria :<?php echo $sat['admission_criteria'];?><br />
				Entrance Exam :<?php echo $sat['entrance_exam'];?><br />
				Fees :<?php echo $sat['fees'];?><br />
				Seats :<?php echo $sat['seats'];?><br />
				Course Mode :<?php echo $sat['course_mode'];?><br />
                <hr />
                
		<?php }?>
		</div>
	<?php $count++;} ?>
</div>
          </div> 
          <div class="coll_section_right" style="text-align:justify">
          	<p style="font-weight:normal;  ;"><h4 class="content_div">Why this collage</h4><?php echo $Institutes->why;?><br/><h4 class="content_div">Overview</h4><?php echo $Institutes->overview;?>
            </p>
        </div>
           </div>  
</div>
<div class="news pd0 pull-right">
	<?php  $this->Widget('WidgetNews'); ?>
</div>
     
<script type="text/javascript">
jQuery(document).ready(function ($) {
$('#tabs').tab();
});
</script> 