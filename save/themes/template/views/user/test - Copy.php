<div class="col-md-12 fl">
	<div class="row test-bot">Question to know your interest</div>
	<div class="row pd0 ">
    	<div class="col-xs-12 col-sm-6 col-md-5 pull-left dashboard-logo white">
					<div class="dashboard-logo  pull-left left_r">
						<img src="<?php echo Yii::app()->theme->baseurl;?>/images/test_logo.jpg"/>
					</div>
					<div>
						<h1><?php echo $testContent->title;?></h1>
						<span><?php echo $testContent->description;?></span>
						
						<!-- <a href="#">Konw more about stream explore</a>--->
					</div>
				</div>
                <div class="row col-xs-12 col-sm-6 col-md-7 pull-right banner">
					<img src="<?php echo Yii::app()->theme->baseurl;?>/images/banner.png"/>
				</div>
				<div class="clearfix"></div>
				<div class="border">
					<ol class="breadcrumb">
					  <li><a href="#">Assessment</a></li>
					 
					</ol>
				</div>
                
    
			<div class="col-md-12  pull-left jcarousel-skin-tango-two">
            		<div class="clear"></div>
            	<div class="col-md-12 border fl">
					<?php if(Yii::app()->user->hasFlash('inComplete')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('inComplete'); ?></strong>
						</div>
							<div class="flash-error">
								
							</div>
					<?php endif; ?>	
						<div class="row test-bot">Question to know your interest</div>
						<div class="pd0 ">
								<div class="jcarousel-skin-tango-two">
                                <?php $form=$this->beginWidget('CActiveForm', array('id'=>'test-form',
															'enableClientValidation'=>false,
															'clientOptions'=>array(
																'validateOnSubmit'=>true,
															),
														)); ?>
            		<div class="jcarousel-container jcarousel-container-horizontal">
					<div class="jcarousel-clip jcarousel-clip-horizontal">
					
														
						<ul  id="mycarouseltwo" class="jcarousel-list jcarousel-list-horizontal" style="width:1581px;">
						
						  <?php $counter=1;$count=1;$counterId=1;?>
									<?php foreach($questions as $question){	?>
											
										<?php if($counter==1){?>		
											 <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal">
										<?php } ?>
											<div class="pull-left m_right">
												<?php echo $form->hiddenField($model,'career_categories_id['.$question['career_categories_id'].']',array('value'=>''.$question['career_categories_id'].'')); ?>
												<p class="questionTitle"><?php	echo $counter.'. '. $question['title'];?></p>
												<div class="ans_set">
													<?php if(!empty($question['option'])){ ?>
														<?php 
														echo $form->radioButtonList($model,'question_options_id['.$question['id'].']',$question['option'],
array('template'=>"{input} {label}", 'separator'=>' ')); 
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
                                        <?php if($counter%3==0){
										echo '<div class="clear"></div>';
										}
											?>    
										<?php if($counter%6==0){?>	
											</li>
                                            	
                                            <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal">
                                           
										<?php } ?>			
								<?php 
								$counter++;
								} ?>
											
								
                                	
                                </li>	 
						</ul>
						
					</div>
				<div class="jcarousel-prev jcarousel-prev-horizontal glyphicon glyphicon-circle-arrow-left"></div>
				<div class="jcarousel-next jcarousel-next-horizontal glyphicon glyphicon-circle-arrow-right"></div>
				</div>
				
                <?php echo CHtml::submitButton('Submit Test',array('class'=>'btn btn-s-md btn-success pull-right')); ?>
                <?php	$this->endWidget();?>	
                </div></div>
                </div>
                
            </div>
            
		

	</div>
</div>
<script type="text/javascript">
function saveAns(cid,rate){
	var url	=	'<?php echo Yii::app()->createUrl('/user/test');?>';
	$.ajax({
		type: "POST",
		url: url+'&id='+cid+'&rating='+rate,
		data: 'rating',
		dataType:'json',
		success:function(data){
				$('.s').html(data.want_to_join);
			}
	});
}
</script