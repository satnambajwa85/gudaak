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
						'enableAjaxValidation'=>false,
						'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					)); ?>
                	<div class="text_w_outer">
                     <span class="text_w_dd">Course</span>
                    <?php 	echo $form->dropDownList($model,'courses_id',
									CHtml::listData(Courses::model()->findAll(),'id','title'),
									array('prompt'=>'All',
									'ajax' => array('type'=>'POST',
										'url'=>CController::createUrl('DynamicCourse'), //url to call.
										'update'=>'#Institutes_specialisation', //selector to update
										 
										
											)));?>
                    </div>
                    
                    <div class="text_w_outer">
                     <span class="text_w_dd">Specialisation</span>
                      <?php 	echo $form->dropDownList($model,'specialisation',
									CHtml::listData(Specialization::model()->findAll(),'id','title'),array('prompt'=>'All'));?>
                    </div>
                    
                     <div class="text_w_outer">
                     <span class="text_w_dd">Location</span>
					  <?php 	echo $form->dropDownList($model,'city_id',CHtml::listData(City::model()->findAll(),'id','title'),array('prompt'=>'All'));?>
					 
                    </div>
                    
                   
                     <div class="text_w_outer">
                     <?php 	echo CHtml::button('Search',array('id'=>'basicSave','class'=>'summery-left-btn'));?>
					</div>
                    <?php $this->endWidget(); ?>
                    
                </div> 
             </div>
             <!--Left_section End-->
              <!--Right_section -->
			<div class="collage_right_section" >
            <div id="scrollBar" style="max-height:500px;width:97%;">
              <div id="collegeResult">
              
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'courses-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	//'cssFile' => Yii::app()->theme->baseUrl."/css/grid.css",
	'columns'=>array(
		'id',
		array('type'=>'html','value'=>'CHtml::image(Yii::app()->theme->baseUrl."images/coll_logo.png"'),
		'name',
		'address1',
		//'add_date',
		//'published',
		//'status',
	),
)); ?>
              
			  <?php /*foreach($Institutes as $Institutes){ ?>
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
						<?php echo CHtml::ajaxlink('Shortlist College',array('user/UserShortlistCollage','id'=>$Institutes->id),array('update'=>'#messagePrint'),array('class'=>'css-label'));?>
        			   </div>
                        </div>
                       <?php foreach($Institutes->collagesCoursesSpecialization as $cou){?>
                        <div class="content_div"><?php echo $cou->courses->title;?>  <span>  (<?php echo $cou->specialization->title;?>)</span></div>
                       <?php } ?>
                     </div>
					</div>
					<?php  }*/ ?>
				     	
              </div>
			 
              </div>
			   <div class="col-md-12 pull-right pager">
					<?php //$this->widget('CLinkPager', array('pages' => $pages,)) ?>
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
<script type="text/javascript">
$("#basicSave").click(function(){
	$.ajax({
		type:'POST',
		url:"<?php echo CController::createUrl("/user/DynamicSearchResult");?>",
		data : $('#collages-search-form').serialize(),
		success:function(data){
			$("#collegeResult").html(data);
		}
	});
});
</script>