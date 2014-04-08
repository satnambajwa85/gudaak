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
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
						'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					)); ?>
                	<div class="text_w_outer">
                     <span class="text_w_dd">Course</span>
                    <?php 	echo $form->dropDownList($model,'courses_id',
									CHtml::listData(Course::model()->findAll(),'id','title'),
									array('ajax' => array('type'=>'POST',
										'url'=>CController::createUrl('DynamicCourse'), //url to call.
										'update'=>'#Institutes_specialisation', //selector to update
										 
										
											)));?>
                    </div>
                    
                    <div class="text_w_outer">
                     <span class="text_w_dd">Specialisation</span>
                      <?php 	echo $form->dropDownList($model,'specialisation',
									CHtml::listData(Interest::model()->findAll(),'id','title'));?>
                    </div>
                    
                    <div class="text_w_outer">
                     <span class="text_w_dd">Location</span>
					  <?php 	echo $form->dropDownList($model,'city_id',
									CHtml::listData(City::model()->findAll(),'id','title'),
									array('ajax' => array('type'=>'POST',
										'url'=>CController::createUrl('DynamicSearchResult'), //url to call.
										'update'=>'#collegeResult', //selector to update
										 
										
											)));?>
					 
                    </div>
                    
                    <div class="text_w_outer">
                     <div class="text_w_dd">Course Levels</div>
                     <div class="coll_chk">
                     
                    <input id="box_1" class="css-checkbox" type="checkbox" />
                     <label for="box_1" name="demo_lbl_1" class="css-label">All Levels</label>    
			         <input id="box_2" class="css-checkbox" type="checkbox" />
                     <label for="box_2" name="demo_lbl_1" class="css-label">Postgraduate</label>                     
                     <input id="box_3" class="css-checkbox" type="checkbox" />
                     <label for="box_3" name="demo_lbl_1" class="css-label">Dual Degree/Intergrated<br/> Program</label>                     
                     <input id="box_4" class="css-checkbox" type="checkbox" />
                     <label for="box_4" name="demo_lbl_1" class="css-label">All Levels</label>
                      </div>
                    
                    </div>
                    
                    <div class="text_w_outer">
                     <div class="text_w_dd">Course Fees</div>
                     <div class="avg_slide"></div>
                     <div class="avg_value">
                      <input type="text" value="Rs. 2 Lakh" />
                      <input type="text" value="Rs. 2 Lakh" class="avg_left_m" />
                     </div>
                    </div>
                    
                    <?php $this->endWidget(); ?>
                    
                </div> 
             </div>
             <!--Left_section End-->
              <!--Right_section -->
			
              <div class="collage_right_section" id="collegeResult">
			  <?php foreach($Institutes as $Institutes){ ?>
					<div class="coll_right_main_outer">
                     <div class="coll_top_row">
                         <div class="coll_top_part1">
                            <div class="coll_logo">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/coll_logo.png" alt="logo"></div>   
                             <div class="head_text_coll"><?php echo $Institutes->name;?><br>
                              <span><?php echo substr($Institutes->address1,0,100);?></span>
                             </div>
                        </div>
                      
                        <div class="coll_top_part12">
                            <!--<div class="orange_div">Rating <span>4.5/5</span></div>-->
                        <div class="orange_div"><input type="checkbox" id="box_11" class="css-checkbox">
						<?php echo CHtml::ajaxlink('Shortlist Collage',array('user/UserShortlistCollage','id'=>$Institutes->id),array('update'=>'#messagePrint'),array('class'=>'css-label'));?>
        			   </div>
                        </div>
                       <?php foreach($Institutes->course as $cou){?>
                        <div class="content_div"><?php echo $cou->title;?>  <span>  (<?php echo $cou->interests;?>)</span></div>
                       <?php } ?>
                     </div>
					</div>
					<?php  } ?>
				     <div class="col-md-6 pull-right">
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