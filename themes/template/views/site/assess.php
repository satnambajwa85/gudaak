<?php 
$this->pageTitle = 'Gudaak - Career Options & Online Career Aptitude Test';
Yii::app()->clientScript->registerMetaTag('We provide career aptitude test to identify student\'s personality and interested area for best career option.', 'description');
?>
<div id="middle_outr">
    	<div class="middle_cont">
        	<div class="mid_lef_heading col-md-12" style="height:100px;">
                Assess to <em>"Know Yourself"</em>
            </div>
        	<div class="middle">
            	<div class="middle_left">
                	
                    <div class="mid_left_bot ">
						 
						
					</div>
                </div>
            	<div class="middle_center">
                	<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/center.png"/>
                </div>
                <div class="middle_right">
                	<div class="mid_right_bot">
					 
					</div>
                    <div class="interest_next">
                    	<a href="javascript:void(0);"></a>
                    </div>
                    <div class="mid_right_buttn">
					<?php echo CHtml::link('<img src="'. Yii::app()->theme->baseUrl.'/images/what_next.png" alt="What Next" />',array('site/explore'),array('class'=>''));?>
                    </div>
                </div>
            </div>
        </div>
    </div>