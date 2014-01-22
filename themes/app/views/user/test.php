<div class="col-md-12 border fl">
	<div class="row test-bot">Question to know your interest</div>
	<div class="row pd0 ">
			<div class="jcarousel-skin-tango-two">
				<div class="jcarousel-container jcarousel-container-horizontal">
					<div class="jcarousel-clip jcarousel-clip-horizontal">
					<?php $form=$this->beginWidget('CActiveForm', array('id'=>'test-form',
															'enableClientValidation'=>false,
															'clientOptions'=>array(
																'validateOnSubmit'=>true,
															),
														)); ?>
														
						<ul  id="mycarouseltwo" class="jcarousel-list jcarousel-list-horizontal" style="width:1581px;">
						
						  <?php $counter	=	1;$count=1;$counterId=1;?>
								
									
									<?php foreach($questions as $question){	?>
										
										<?php 
										if($counter==1 || !($counter%6)){?>	
											 <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal">
										
										<?php $counterId++;} ?>
											<div class="pull-left">
												<p><?php	echo $question['id'].'. '. $question['title'];?></p>
												
												<div>
													<?php if(!empty($question['option'])){ ?>
														<?php echo $form->radioButtonList($model,'question_options_id['.$question['id'].']',$question['option']); ?>
													<?php }else{ ?>
													
													<?php } ?>
													
												</div>
											</div>
												
											 
												
										<?php if($counter==1 || !$counter%6){?>	
											</li>
										<?php } ?>			
										<?php if($counter==60 ){?>	
											<?php echo CHtml::submitButton('Submit Test',array('class'=>'btn btn-s-md btn-success')); ?>
										<?php } ?>
										
																					
								
										
										
									
								<?php 
								$counter++;
								} ?>
											
									 
						</ul>
						<?php	$this->endWidget();?>	
					</div>
				<div class="jcarousel-prev jcarousel-prev-horizontal glyphicon glyphicon-circle-arrow-left"></div>
				<div class="jcarousel-next jcarousel-next-horizontal glyphicon glyphicon-circle-arrow-right"></div>
				</div>
			</div>
	
	</div>
</div>
