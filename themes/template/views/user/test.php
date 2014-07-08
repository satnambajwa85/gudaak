<div class="col-md-12 fl">
	<div class="row pd0 ">
              	<div class="border">
					<ol class="breadcrumb">
					  <li><a href="#">Assessment</a></li>
					</ol>
				</div>
			<div class="col-md-12  pull-left jcarousel-skin-tango-two">
            		<div class="clear"></div>
				<div id="popup_box">    <!-- OUR PopupBox DIV-->
						<h1>Your Test has been submitted successfully.</h1>
						<p>Please Wait...</p>
				</div>
            	<div class="col-md-12 border pd0 fl test-hide">
					<?php if(Yii::app()->user->hasFlash('inComplete')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('inComplete'); ?></strong>
						</div>
							<div class="flash-error">
								
							</div>
					<?php endif; ?>	
						<div id="testScroll">
						<div class="pd0 ">
					<?php $form=$this->beginWidget('CActiveForm', array(
													'id'=>'user-person-test-form',
													'enableAjaxValidation'=>false,
														'htmlOptions'=>array(
														   'onsubmit'=>"return false;",
														   'onkeypress'=>" if(event.keyCode == 13){ testFormSend(); }"
														 ),
												)); 
						$counter=1;$count=0;$counterId=1;
										foreach($questions as $question){	?>
											<div class=" required<?php echo $question['id'] ?> test-area <?php echo ($count)?'gray2':'';?>">
												<?php echo $form->hiddenField($model,'career_categories_id['.$question['career_categories_id'].']',array('value'=>''.$question['career_categories_id'].'')); ?>
												<p class="questionTitle"><?php	echo $counter.'. '. $question['title'];?></p>
												<div class="ans_set">
													<?php if(!empty($question['option'])){ 
														echo CHtml::radioButtonList('TestReports[question_options_id]['.$question['id'].']',(isset($testAns[$question['id']]))?$testAns[$question['id']]:'',$question['option'],array('template'=>"{input} {label}", 'separator'=>' ','class'=>'required','onchange' => 'answer(this.value,testId='.$question['testId'].' ,QID='. $question['id'].');'));
													} ?>
												</div>
											</div>
                                        <?php if($counter%2==0){
											echo '<div class="clear"></div>';
											$count	=	abs($count)-1;
										};
									$counter++;
								} ?>
				<div class="center mt10">
				<?php echo CHtml::Button('Submit Test',array('onclick'=>'testFormSend(id='.Yii::app()->request->getQuery('id').');','class'=>'btn btn-s-md btn-success')); ?>
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