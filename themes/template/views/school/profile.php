<?php $this->pageTitle=Yii::app()->name . ' - Profile';
$this->breadcrumbs=array('Forms',);?>
<div class="col-md-6 pop-up-border fl col-lg-offset-3 ">
	<div class="row test-bot">School Profile</div>
		
			<?php 
				$form=$this->beginWidget('CActiveForm', array(
														'id'=>'school-profile',
														'action'=>Yii::app()->createUrl('/site/UserRegister'),
													    'enableClientValidation'=>true,
														'clientOptions'=>array(
																'validateOnSubmit'=>true,
																
															)
														));?>
				<div class="col-md-4 pull-left">
					<?php echo $form->fileField($model,'images',array('class'=>'form-control','placeholder'=>'images','autofocus'=>true));
				echo $form->error($model,'images');?>
				</div>
			  	<div class="col-md-8 pull-right right-pad">
				<?php echo $form->textField($model,'name',array('class'=>'form-control','placeholder'=>'School Name','autofocus'=>true));
				echo $form->error($model,'name');?>
				
				 
				<?php echo $form->textField($model,'address',array('class'=>'form-control','placeholder'=>'Address1','autofocus'=>true));
				echo $form->error($model,'address');
				?>
			 
				<?php echo $form->textField($model,'address2',array('class'=>'form-control','placeholder'=>'Address2','autofocus'=>true));
				echo $form->error($model,'address2');
				?>
				 
				<?php echo $form->textField($model,'postcode',array('class'=>'form-control','placeholder'=>'Postcode','autofocus'=>true));
				echo $form->error($model,'postcode');
				?>	 
				<?php echo $form->textField($model,'telephone_no',array('class'=>'form-control','placeholder'=>'Telephone','autofocus'=>true));
				echo $form->error($model,'telephone_no');
				?>
				<?php echo $form->textField($model,'fax',array('class'=>'form-control','placeholder'=>'Fax','autofocus'=>true));
				echo $form->error($model,'fax');
				?>
				<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email','autofocus'=>true));
				echo $form->error($model,'email');
				?>
			   
				
				<div align="center">
				<?php echo CHtml::submitButton('Register',array('class'=>'btn btn-warning login mt'));?>
				</div>
				</div>
			  <?php $this->endWidget();?>
			
	</div>