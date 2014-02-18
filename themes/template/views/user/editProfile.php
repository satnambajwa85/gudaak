<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name . ' - Update your Profile';
?>
<div class="mt50">&nbsp;</div>
<div class="col-md-12 mt50 fl ">
		<?php $form=$this->beginWidget('CActiveForm', array(
																'id'=>'user-update-form',
																'enableAjaxValidation'=>false,
																'htmlOptions'=>array('enctype'=>'multipart/form-data'),
													));?>
							
				<div class="col-md-2 pull-left mt10">

					<?php $path =	Yii::app()->request->baseUrl.'/uploads/user/large/';?>
					<?php if(isset($model->image)){ ?> 
					<?php echo $form->hiddenField($model,'oldImage',array('value'=>$model->image)); ?>
					<img src="<?php echo $path.$model->image;?>" alt="image"/>
					 <?php }?>

					  
				</div>			
				<div class="col-md-9 pd0 pull-left">
							<div class="form-group">
								<div class="form-row">
									<?php echo $form->textField($model,'first_name',array('class'=>'form-control','placeholder'=>'First Name'));
									echo $form->error($model,'first_name');?>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<?php echo $form->textField($model,'last_name',array('class'=>'form-control','placeholder'=>'Last Name'));
									echo $form->error($model,'last_name');?>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
																			'model'=>$model,
																			'attribute'=>'date_of_birth',
																			'options'=>array('dateFormat'=>'yy-mm-dd',
																							'changeMonth'=>'true',
																							'changeYear'=>'true',
																			
																			),
																			'htmlOptions'=>array('class'=>'form-control','placeholder'=>'DOB'),
																			
																			));
									echo $form->error($model,'date_of_birth');?>
								</div>
							</div>
				
							<div class="form-group">
								<div class="form-row">
									<?php echo $form->textField($model,'class',array('class'=>'form-control','placeholder'=>'Class'));
									echo $form->error($model,'class');?>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email'));
									echo $form->error($model,'email');?>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
								<?php echo $form->textField($model,'mobile_no',array('class'=>'form-control','placeholder'=>'Mobile'));
								echo $form->error($model,'mobile_no');?>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
								<?php echo $form->fileField($model,'image');
								echo $form->error($model,'image');?>
								</div>
							</div>
							
							<div class="form-group">
							<div class="form-row">
									<?php echo $form->radioButtonlist($model,'gender',array('1'=>'Male','0'=>'Female'),array('separator'=>'','class'=>'pull-left'));
									echo $form->error($model,'gender');?>
								</div>
							</div>
						 	<div class="clear"></div>
							<?php echo CHtml::submitButton('Update',array('class'=>'update-internal btn back-gary-color'));?>
						</div>
								<?php	$this->endWidget();	?>

		
</div>
