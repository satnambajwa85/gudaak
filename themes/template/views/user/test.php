<div class="col-md-12 fl">
	<div class="row pd0 ">
    	 
              	<div class="border">
					<ol class="breadcrumb">
					  <li><a href="#">Assessment</a></li>
					 
					</ol>
				</div>
                
    
			<div class="col-md-12  pull-left jcarousel-skin-tango-two">
            		<div class="clear"></div>
            	<div class="col-md-12 border pd0 fl">
					<?php if(Yii::app()->user->hasFlash('inComplete')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('inComplete'); ?></strong>
						</div>
							<div class="flash-error">
								
							</div>
					<?php endif; ?>	
						<!--<div class="test-bot">Question to know your interest</div>-->
						<div id="testScroll">
						<div class="pd0 ">
						          <?php $form=$this->beginWidget('CActiveForm', array('id'=>'test-form',
															'enableClientValidation'=>false,
															'clientOptions'=>array(
																'validateOnSubmit'=>true,
															),
														)); ?>
            		 
														
						 
						  <?php $counter=1;$count=0;$counterId=1;?>
									<?php foreach($questions as $question){	?>
											<div class="test-area <?php echo ($count)?'gray2':'';?>">
												<?php echo $form->hiddenField($model,'career_categories_id['.$question['career_categories_id'].']',array('value'=>''.$question['career_categories_id'].'')); ?>
												<p class="questionTitle"><?php	echo $counter.'. '. $question['title'];?></p>
												<div class="ans_set">
													<?php if(!empty($question['option'])){ ?>
														<?php 
														echo $form->radioButtonList($model,'question_options_id['.$question['id'].']',$question['option'],
array('template'=>"{input} {label}", 'separator'=>' ','class'=>'required','onchange' => 'answer(this.value,testId='.$question['testId'].' ,QID='. $question['id'].');')); 
														?>
														<script type="text/javascript">
															$(document).ready(function(){
																$('#testReports_question_options_id_173_0<?php echo $question['id'];?>').click(function(){saveAns(<?php echo $question['id'];?> ,$(this).attr('value'));});
																
															});
														</script>
													<?php }else{ ?>
													
													<?php } ?>
													
												</div>
											</div>
                                        <?php if($counter%2==0){
											echo '<div class="clear"></div>';
											$count	=	abs($count)-1;
										};
									$counter++;
								} ?>
				<div class="center mt10">
				<?php echo CHtml::submitButton('Submit Test',array('class'=>'btn btn-s-md btn-success')); ?>
                </div>
				<?php	$this->endWidget();?>	
               
				</div>
				</div>
                </div>
                
            </div>
            
		

	</div>
</div>
<script language="javascript">
function answer(value,QID,testId)
{    
	var url	=	'<?php echo Yii::app()->createUrl('/user/questionsAnswer');?>';
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