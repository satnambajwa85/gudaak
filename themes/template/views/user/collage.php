<?php $this->pageTitle=Yii::app()->name . ' -Colleges Explore';
$this->breadcrumbs=array('Colleges Explore'=>array('/user/exploreColleges'));
?>
<div class="career-bot pull-left">
          <div class="mr0 col-md-12 fl">
          <div class="my_profile_outr">
              <h1>Explore colleges with Gudaak</h1>
              <p>
              Explore the colleges and short list the right colleges where you would like to see your self after school!
              </p>
            </div>
			<div class="pull-right my_profile_outr" id="messagePrint">
             
            </div>
            <!--Collage Section-->
             <!--Left_section-->
             <div class="collage_left_section">
             	<div class="coll_head_text">Search Filters</div>
                <div class="collage_left_inner">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'collages-search-form',
						'method'=>'get',
						'action'=>Yii::app()->createUrl('/user/exploreColleges'),
						'enableAjaxValidation'=>false,
						'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					)); ?>
                	<div class="text_w_outer">
                     <span class="text_w_dd">Search</span>
                     <?php echo CHtml::textField('search',(isset($_REQUEST['search']))?$_REQUEST['search']:'');?></div>
                    <div class="text_w_outer mt20 ml10">
                    <?php 	echo CHtml::submitButton('Search',array('class'=>'summery-left-btn'));?>
					</div>
                    <?php $this->endWidget(); ?>
                    
                </div> 
             </div>
             <!--Left_section End-->
              <!--Right_section -->
			<div class="collage_right_section" >
            <div id="scrollBar" style="max-height:500px;width:97%;">
              <div id="collegeResult">
			  <?php foreach($Institutes as $Institutes){ ?>
					<div class="coll_right_main_outer">
                     <div class="coll_top_row">
                         <div class="coll_top_part1">
                            <div class="coll_logo">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/coll_logo.png" alt="logo" width="65"></div>   
                             <div class="head_text_coll">
							 <?php echo CHtml::link($Institutes->name,array('user/collage','id'=>$Institutes->id),array('class'=>'font_size_set'));?><br>
                              <span><?php echo substr($Institutes->address1,0,100);?></span>
                             </div>
                        </div>
                      
                        <div class="coll_top_part12">
                        
						<?php echo (in_array($Institutes->id,$shortList))?'<div class="green_div">Shortlisted':'<div class="orange_div">'.CHtml::ajaxlink('Shortlist College',array('user/UserShortlistCollage','id'=>$Institutes->id),array('success'=>'function(data){$("#messagePrint").html(data);$("#link'.$Institutes->id.'").html("Shortlisted");$("#link'.$Institutes->id.'").parent().removeClass("orange_div").addClass("green_div");}'),array('class'=>'css-label','id'=>'link'.$Institutes->id));?>
        			   </div>
                        </div>
                       <?php 
					   $coun	=	0;
					   foreach($Institutes->collagesCoursesSpecialization as $cou){
						   $coun++;
						   if($coun >= 5)
						 		break;
						   ?>
                        <div class="content_div"><?php echo $cou->courses->title;?>  <span>  (<?php echo $cou->specialization->title;?>)</span></div>
                       <?php } ?>
                     </div>
					</div>
					<?php  } ?>
				     	
              </div>
			 
              </div>
			   <div class="col-md-12 pull-right pager">
					<?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
					</div>
             </div> 
               <!--Right_section End-->
            
            
            <!--Collage section end-->

          </div>
          <div class="clear"></div>
          
        </div>
	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
<div id="Summary-details" class="modal fade">
    	<div class="mt50 col-sm-offset-1 col-md-9">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13" id="testScroll">
							<a data-dismiss="modal" class="btn btmar btn-info pull-right" style="margin-top:-10px;">close</a>
								 <div  class="col-md-12 pd0 login-box pull-left">
									<div id="summeryRecodes">
									
									</div>
									 
                                 </div>
                               
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
<script type="text/javascript">
$("#basicSave").click(function(){
	$.ajax({
		type:'POST',
		url:"<?php echo CController::createUrl("/user/dynamicSearchResult");?>",
		data : $('#collages-search-form').serialize(),
		success:function(data){
			$("#collegeResult").html(data);
		}
	});
});
</script>