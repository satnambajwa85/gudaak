<?php $this->pageTitle='Assessment';
$this->breadcrumbs=array('Assess'=>array('/user/tests'));?>
<div id="partial-render">
	<div class="col-md-10 pull-left pd0">
    <div class="border pd0">
    	<!--<h1>Tour</h1>-->
        
                	<ol class="breadcrumb">
                    <li><?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'Dashboard','links'=>$this->breadcrumbs,));?></li>
					 <li>
                        <p>Click here to see the video, which explains the purpose of taking up these tests and will be helpful to understand the concepts on the basis of which the test results will be explained.</p>
                        </li>
					</ol>
                    
	</div>
    
                
                
                
					<div class="mr0 col-md-12 fl">
						<?php  $count=1;
								foreach($testContent as $list){ 
								if($count%2 == 0)
									$css='middle-format-left';
								else 
									$css='middle-format-left';			 
									$count= $count+1;
								
								?>
					<?php if(Yii::app()->user->hasFlash('updated')): ?>
                    <script type="text/javascript">
                   // alert('Your request has been submitted. You will soon receive the response to your query.<?php //echo Yii::app()->user->getFlash('updated'); ?>');
                    </script>
					<!--<div class="alert alert-success">
						<button data-dismiss="alert" class="close" type="button">×</button>
						<strong><?php //echo Yii::app()->user->getFlash('updated'); ?></strong>
					</div>-->
				<?php endif; ?>
						<div class="mr0 col-md-6 pull-left <?php echo $css;?>">
							<h1><?php echo $list->title;?></h1>
							<p><?php //echo substr($list->description,0,225);?></p>
							<!--<a href="#">Konw more about stream explore</a>-->
						</div>
					<?php } ?>
					</div>
					<div class="col-md-12 pull-left mt50 pd0" id="take-test">
						<!--<div class="col-md-6 pull-left test-description-bot">
							<?php //echo $testContent->test_features ;?>
						</div>-->
						<?php foreach($testContent as $list){ ?>
						<?php 	if(in_array($list->id,$userTest)){?>
						<div class="col-md-6 pull-left">
							<div class="col-md-12 pull-left min-height-fix border-box">
								<div align="center">
                                <span class='btnTNew btn-info2 center-bt'>
								<?php echo $list->title;?> </span>
								</div>
								<div class="retaketest ">
									<h1>Last test summary</h1>
									<span>Test Date:</span>
									<datetime>	
										<?php echo date('d M,Y',strtotime($detials[$list->id]['date']));?>
										</datetime>
									<div class="clear"></div>
									<span>Duration:</span>
									<datetime><?php echo $detials[$list->id]['duration'];?>&nbsp;mins</datetime>
									<div class="clear"></div>
									<span>Questions:</span>
									<datetime><?php echo $detials[$list->id]['count'];?></datetime>
									<div class="clear"></div>
									<div style="font-size:11px">
                                    1. How will you rate your overall experience of test taking?
                                    
                                    <div class="clear"></div>
                                    <input type="radio" name="ans_1_<?php echo $list->id;?>" value="Excellent" style="display:block !important;float:left; width:20px;" onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=1)" <?php echo(isset($feedBack[$list->id][1]) && $feedBack[$list->id][1]['feed']=='Excellent')?'checked="checked"':'';?> />Excellent<div class="clear"></div>
                                    <input type="radio" name="ans_1_<?php echo $list->id;?>" value="Good" style="display:block !important;float:left; width:20px;"  onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=1)"  <?php echo(isset($feedBack[$list->id][1]) && $feedBack[$list->id][1]['feed']=='Good')?'checked="checked"':'';?> />Good<div class="clear"></div>
                                    <input type="radio" name="ans_1_<?php echo $list->id;?>" value="Average" style="display:block !important;float:left; width:20px;" onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=1)" <?php echo(isset($feedBack[$list->id][1]) &&  $feedBack[$list->id][1]['feed']=='Average')?'checked="checked"':'';?>/>Average<div class="clear"></div>
                                    <input type="radio" name="ans_1_<?php echo $list->id;?>" value="Boring" style="display:block !important;float:left; width:20px;"  onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=1)" <?php echo(isset($feedBack[$list->id][1]) && $feedBack[$list->id][1]['feed']=='Boring')?'checked="checked"':'';?>/>Boring
                                    </div>
                                    <div class="clear"></div>
									<div style="font-size:11px">
                                    2. How will you rate the test question in terms of difficulty level in understanding?
                                    <div class="clear"></div>
                                    <input type="radio" name="ans_2_<?php echo $list->id;?>" value="Very Difficult" style="display:block !important;float:left; width:20px;" onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=2)" <?php echo(isset($feedBack[$list->id][2]) && $feedBack[$list->id][2]['feed']=='Very Difficult')?'checked="checked"':'';?>/>Very Difficult<div class="clear"></div>
                                    <input type="radio" name="ans_2_<?php echo $list->id;?>" value="Somewhat Difficult" style="display:block !important;float:left; width:20px;" onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=2)"  <?php echo(isset($feedBack[$list->id][2]) && $feedBack[$list->id][2]['feed']=='Somewhat Difficult')?'checked="checked"':'';?>/>Somewhat Difficult<div class="clear"></div>
                                    <input type="radio" name="ans_2_<?php echo $list->id;?>" value="Not At All Difficult" style="display:block !important;float:left; width:20px;" onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=2)"  <?php echo(isset($feedBack[$list->id][2]) && $feedBack[$list->id][2]['feed']=='Not At All Difficult')?'checked="checked"':'';?>/>Not At All Difficult
                                    </div>
                                    <div class="clear"></div>
									<div style="font-size:11px">
                                    3. How will you rate the content of the test in terms of relevance to yourself?
                                    <div class="clear"></div>
                                    <input type="radio" name="ans_3_<?php echo $list->id;?>" value="Found it absolutely Irrelevant to my self" style="display:block !important;float:left; width:20px;"  onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=3)"  <?php echo(isset($feedBack[$list->id][3]) && $feedBack[$list->id][3]['feed']=='Found it absolutely Irrelevant to my self')?'checked="checked"':'';?> />Found it absolutely Irrelevant to my self<div class="clear"></div>
                                    <input type="radio" name="ans_3_<?php echo $list->id;?>" value="Somewhat relevant to my self" style="display:block !important;float:left; width:20px;" onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=3)"  <?php echo(isset($feedBack[$list->id][3]) && $feedBack[$list->id][3]['feed']=='Somewhat relevant to my self')?'checked="checked"':'';?> />Somewhat relevant to my self<div class="clear"></div>
                                    <input type="radio" name="ans_3_<?php echo $list->id;?>" value="Could relate to the questions extremely well" style="display:block !important;float:left; width:20px;"  onchange="answer(this.value,testId=<?php echo $list->id;?> ,QID=3)"  <?php echo(isset($feedBack[$list->id][3]) && $feedBack[$list->id][3]['feed']=='Could relate to the questions extremely well')?'checked="checked"':'';?> />Could relate to the questions extremely well
                                    </div>
                                    
                                    
									<div class="clear"></div>
								</div>
								<div align="center" class="mar-bottom mt30">
				

				<?php	echo CHtml::link('Retake Test','javaScript:void(0);',array('class'=>'btn retake'.$list->title.' btn-warning'));?>
				<?php	echo CHtml::Ajaxlink('Summary',array('user/summaryDetails','id'=>$list->id),array('update'=>'#summeryRecodes'),array('class'=>'btn Summary-details btn-warning ml15'));?>
                				</div>
							</div>
						</div>
						<div id="retake<?php echo $list->id;?>" class="modal fade">
    	<div class="modal-dialog">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
                            	  <div  class="col-md-12 pull-left">
								<a data-dismiss="modal" class="btn btn-info pull-right ">close</a>
								
                                    <div id="">
                                        <?php   
                                        $form=$this->beginWidget('CActiveForm', array(
                                                                        'id'=>'retake-test-form'.$list->id.'',
																		 'action'=>Yii::app()->createUrl('/user/retakeTest&id='.''.$list->id.''),
                                                                        'enableClientValidation'=>true,
                                                                        'clientOptions'=>array('validateOnSubmit'=>true,)));?>
                                    <?php echo $form->hiddenField($model,'orient_items_id',array('value'=>''.$list->id.''));
                                   ?>
                                    <h4 class="form-signin-heading ">Send request to retake test</h4>
                                    <?php echo $form->textField($model,'title',array('class'=>'form-control','placeholder'=>'Title','autofocus'=>true));
                                    echo $form->error($model,'title');?>
                                    <div class="pd4"></div>
                                    <?php echo $form->textArea($model,'description',array('class'=>'form-control','placeholder'=>'description'));
                                    echo $form->error($model,'description');?>
                                    <div class="pd4"></div>
                                     
                                    <div class="clearfix"></div>
                                    <div align="center" class="col-md-3  pd0 ">
                                        <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-warning fl login'));?>
                                        <div class="clearfix"></div>
                                        <!--<div class="or">or</div>-->
                                        <?php //echo CHtml::link('<i class="posi-bt icon-facebook"></i>Login with your<br/><strong>Facebook Account</strong>',array('/site/forgetPassword'),array('class'=>'btn btn-lg btn-primary fb'));?>
                                        </div>
                                        <?php $this->endWidget(); ?>
                            
                                </div>
                                 </div>
                               
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
						<?php  }else{ ?>
							<div class="col-md-6 pull-left">
							<div class="col-md-12 pull-left border-box test_features">
							
								<div align="center">
                                <span class='btn btn-info2 center-bt'>
								Take <?php echo $list->title;?> </span>
									
								</div>
								<p><?php echo $list->test_features ;?></p>
								<div align="center" class="mar-bottom">							 
									<?php  
										echo CHtml::link('Take Test',array('user/test','id'=>$list->id),array('class'=>'btn btn-warning'));?>
								</div>
							</div>
						</div>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
					<div class="col-md-2 pd0  pull-right">
					<?php  $this->Widget('WidgetNews'); ?>
				</div>
</div>

<div id="Summary-details" class="modal fade">
    	<div class="modal-dialog">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
							<a data-dismiss="modal" class="btn btmar btn-info pull-right ">close</a>
								
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
	<script language="javascript">
function answer(value,testId,QID)
{    
	var url	=	'<?php echo Yii::app()->createUrl('/user/feedbackAnswer');?>';
	$.ajax({
	url: url+'&QID='+QID+'&ans='+value+'&testId='+testId,
	type	:	"POST",
	data	:	'json',
	
	complete:	function(result) {
		console.log('Success:'+ result);
		
		}
	});
    
}
</script>