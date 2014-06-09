<div class="career-bot pull-left mt20 ">
		<div class="coll_logo1 mb10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/coll_logo.png" alt="logo"></div>   
        <div class="head_text_coll_new mb10"><?php echo $Institutes->name;?><br>
            <span><?php echo $Institutes->phone_number.' <br/>'.$Institutes->email.' <br/>'.$Institutes->website;?></span>
          <div class="pull-right col-md-4" style="margin-top:-25px;">  
          <?php echo CHtml::ajaxlink('Shortlist College',array('user/UserShortlistCollage','id'=>$Institutes->id),array('update'=>'#messagePrint'),array('class'=>'css-label btn  pull-right btn-warning'));?>
          <div class="pull-right alertSat" id="messagePrint"></div>
          </div>
        </div>
        <div class="head_text_coll_new mt20" style="width:100%;">
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
	<div style="width:100%; float:left;">	
		<div class="coll_section_left">
       <!-- updated new work-->
       <div class="panel-group" id="accordion">
<?php
$count	=	0;
foreach($list as $cou){?>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h5 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $cou['id'];?>">
          <?php echo $cou['title'];?>
        </a>
      </h5>
    </div>
    <div id="collapseOne<?php echo $cou['id'];?>" class="panel-collapse collapse <?php echo ($count==0)?'in':'';?>">
      <div class="panel-body">
      
		<?php foreach($cou['course'] as  $sat){?>
				
                <span class="title_text" >Title :</span> <?php echo $sat['title'];?><br />
				<span class="title_text" >Admission Criteria :</span> <?php echo $sat['admission_criteria'];?><br />
				<span class="title_text" >Entrance Exam :</span> <?php echo $sat['entrance_exam'];?><br />
				<span class="title_text" >Fees :</span> <?php echo $sat['fees'];?><br />
				<span class="title_text" >Seats :</span> <?php echo $sat['seats'];?><br />
				<span class="title_text" >Course Mode :</span> <?php echo $sat['course_mode'];?><br />
                <hr />
                
		<?php }?>
	  </div>
    </div>
  </div>
			<?php 
			$count++;
			} ?>

  
 
</div>

       
       
       <!-- updated new work-->
        
        
        
        
			

<!-- Tab panes -->

          </div> 
          <div class="coll_section_right" style="text-align:justify">
          	<p style="font-weight:normal;  ;"><h4 class="content_div">Why this collage</h4><?php echo $Institutes->why;?><br/><h4 class="content_div">Overview</h4><?php echo $Institutes->overview;?>
            </p>
        </div>
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