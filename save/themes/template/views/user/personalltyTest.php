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
														
						<?php echo $form->hiddenField($model,'userProfile',array('value'=>''.Yii::app()->user->profileId.'')); ?>							
						<ul  id="mycarouseltwo" class="jcarousel-list jcarousel-list-horizontal" style="width:1581px;">
						
						  <?php $counter	=	1;$count=1;$counterId=1;?>
								
									
									<?php foreach($questions as $list){	?>
										
										<?php 
										if($counter==1 || !($counter%6)){?>	
											 <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal">
										
										<?php $counterId++;} ?>
											<div class="pull-left">
												<p><?php	echo $list->id.'. '. $list->title;?></p>
												
												<div>
													<label>
													<?php foreach($questionsOptions as $ansList){
													
														if($ansList->questions_id==$list->id){ ?>
															
																<?php echo $form->hiddenField($model,'questions_id',array('value'=>''.$ansList->questions_id.'')); ?>
															
												<input type="radio" name="name[]" value="<?php echo $ansList->id;?>" class="chbox" />
												<?php echo $ansList->name;?>
															
														<?php }
													
													}?>
													
												  </label>
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
