<?php	$this->pageTitle=Yii::app()->name . ' - Edit Profile';?>
<!-- left side menu start -->
		   <div class="spacer15">
					<?php if(Yii::app()->user->hasFlash('updated')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('updated'); ?></strong>
						</div>
							<div class="flash-error">
								
							</div>
					<?php endif; ?>	
					
			</div>
<div class="cold-md-12 editProfile col-md-offset-2 pill-left">

			<?php 
				$form=$this->beginWidget('CActiveForm', array(
														'id'=>'user-register',
													    'enableClientValidation'=>true,
														'clientOptions'=>array(
																'validateOnSubmit'=>true,
																
															)
														));?>
			  <div class="col-md-2 pull-left">

					<?php $path =	Yii::app()->baseUrl.'/uploads/user/large/';?>
					<?php if(isset($model->image)){ ?> 
					<?php echo $form->hiddenField($model,'oldImage',array('value'=>$model->image)); ?>
					<img width="100" class="mt40" src="<?php echo $path.$model->image;?>" alt="image"/>
					 <?php }?>

					  
				</div>                              
			  <div class="col-md-5 pull-left">
				<i class="icon-key orange pull-left"></i>
				<h4 class="form-signin-heading ">Edit YourProfile!</h4>
				<?php echo $form->textField($model,'first_name',array('class'=>'form-control','placeholder'=>'First Name','autofocus'=>true));
				echo $form->error($model,'first_name');?>
				<div class="pd4"></div>
				<?php echo $form->textField($model,'last_name',array('class'=>'form-control','placeholder'=>'last Name','autofocus'=>true));
				echo $form->error($model,'last_name');?>
				<div class="pd4"></div>
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
				<div class="pd4"></div>
                <?php echo $form->textField($model,'class',array('class'=>'form-control','placeholder'=>'Class','autofocus'=>true));
				echo $form->error($model,'class');?>
                <div class="pd4"></div>
                <?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Class','autofocus'=>true));
				echo $form->error($model,'email');?>
                 <div class="pd4"></div>
                <?php echo $form->textField($model,'mobile_no',array('class'=>'form-control','placeholder'=>'Mobile No','autofocus'=>true));
				echo $form->error($model,'mobile_no');?>
                <div class="pd4"></div>
                <?php echo $form->fileField($model,'image');
				echo $form->error($model,'image');?>
                <div class="pd4"></div>
               <?php echo $form->radioButtonlist($model,'gender',array('1'=>'Male','0'=>'Female'),array('separator'=>'','class'=>'pull-left'));
				echo $form->error($model,'gender');?>
				 
				
				
				<div align="center">
				<?php echo CHtml::submitButton('Update',array('class'=>'btn btn-warning login mt'));?>
				</div>
                </div>
			  <?php $this->endWidget();?>

</div>
