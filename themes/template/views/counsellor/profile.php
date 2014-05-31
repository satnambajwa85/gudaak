<?php $this->pageTitle=Yii::app()->name . ' - Profile';
$this->breadcrumbs=array('Forms',);?>
<div class="col-md-6 pop-up-border fl col-lg-offset-3 " >
	<div class="row test-bot">School Profile</div>
		
			<?php 
				$form=$this->beginWidget('CActiveForm', array(
														'id'=>'school-profile',
													    'enableClientValidation'=>false,
														'clientOptions'=>array(
																'validateOnSubmit'=>true,
																
															),
															'htmlOptions'=>array('enctype'=>'multipart/form-data'),
														));?>
				<div class="col-md-4 pull-left">
					<div class="school-img">
						<img src="<?php echo Yii::app()->baseUrl?>/uploads/counsellor/large/<?php echo $model->image;?>" />
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model,'image'); ?>
						<?php echo $form->fileField($model,'image',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'image'); ?>
						<?php if(isset($model->image)){ ?> 
						<?php echo $form->hiddenField($model,'image',array('value'=>$model->image)); ?>
						<?php }?>
					</div>
				</div>
			  	<div class="col-md-8 pull-right right-pad">
				<?php echo $form->textField($model,'first_name',array('class'=>'form-control','placeholder'=>'First Name','autofocus'=>true));
				echo $form->error($model,'first_name');?>
				
				<?php echo $form->textField($model,'last_name',array('class'=>'form-control','placeholder'=>'Last Name','autofocus'=>true));
				echo $form->error($model,'last_name');
				?>
				 
				<?php echo $form->textField($model,'address',array('class'=>'form-control','placeholder'=>'Address1','autofocus'=>true));
				echo $form->error($model,'address');
				?>
			 
				 
				<div class="col-md-6 pd0"> 
				<?php echo $form->textField($model,'postcode',array('class'=>'form-control col-md-5','placeholder'=>'City','autofocus'=>true));
				echo $form->error($model,'postcode');?>
				</div>
				
				<div class="clear"></div>
				<div class="clear"></div>
				<?php echo $form->textField($model,'postcode',array('class'=>'form-control','placeholder'=>'Postcode','autofocus'=>true));
				echo $form->error($model,'postcode');
				?>	 
				<?php echo $form->textField($model,'contact_no',array('class'=>'form-control','placeholder'=>'Telephone','autofocus'=>true));
				echo $form->error($model,'contact_no');
				?>
				<?php echo $form->textField($model,'fax',array('class'=>'form-control','placeholder'=>'Fax','autofocus'=>true));
				echo $form->error($model,'fax');
				?>
				<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email','autofocus'=>true));
				echo $form->error($model,'email');
				?>
				<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Available Grades','autofocus'=>true));
				echo $form->error($model,'email');
				?>
			   
				
				<div>
				<?php echo CHtml::submitButton('Submit Details',array('class'=>'btn btn-warning login mt'));?>
				</div>
				</div>
			  <?php $this->endWidget();?>
			
	</div>