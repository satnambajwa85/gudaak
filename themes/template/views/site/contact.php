<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
?> 
<div class="spacer50"></div>
<div class="col-md-10 col-md-offset-1">
			<div class="fl">
					<?php if(Yii::app()->user->hasFlash('login')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('login'); ?></strong>
						</div>
							<div class="flash-error">
								
							</div>
					<?php endif; ?>	
					
			</div>
			
	<!-- set up the modal to start hidden and fade in and out -->
<div>
	<div class="modal-dialog mb20px">
		<div class="modal-content border-layer">
		<!-- dialog body -->
	<div class="modal-body">
		<?php echo CHtml::link('<div class="site-logo"></div>',array('site/'));?>

		<div class="row white ">

			<div class="col-md-12 pd13 ">
			<div class="hide-overflow2" style="top:-20px;z-index:0"></div>
			 
			 <div class="col-md-12  pull-right">	
				<?php 
				 $form=$this->beginWidget('CActiveForm', array(
														'id'=>'contact-us',
													    'enableClientValidation'=>true,
														'clientOptions'=>array(
																'validateOnSubmit'=>true,
																
															)
														));?>
			  
				<i class="glyphicon glyphicon-edit orange pull-left"></i>
				<h4 class="form-signin-heading ">Contact us</h4>
				<?php echo $form->textField($model,'name',array('class'=>'form-control','placeholder'=>'Name','autofocus'=>true));
				echo $form->error($model,'name');?>
				
				<div class="pd4"></div>
				<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email','autofocus'=>true));
				echo $form->error($model,'email');
				?>
				<div class="pd4"></div>
		  
				<?php echo $form->textField($model,'subject',array('class'=>'form-control','placeholder'=>'Subject','autofocus'=>true));
				echo $form->error($model,'subject');
				?>
				<div class="pd4"></div>
				<?php echo $form->textArea($model,'body',array('class'=>'form-control','placeholder'=>'Body','autofocus'=>true));
				echo $form->error($model,'body');
				?>
				<div class="pd4"></div>
				 <div class="reg_text" align="center"> 
					<?php if(CCaptcha::checkRequirements()): $this->widget('CCaptcha');?>
				</div>
				<div class="hint">
					<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control'));
						echo $form->error($model,'verifyCode');?>
				</div>
						<?php 	endif; ?>
				<div class="pd4"></div>
			 	<div align="center">
				<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-warning login mt'));?>
				</div>
			  <?php $this->endWidget();?>
			</div>
			</div>
	   </div>
	   
			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
</div>  
</div>
	   
 
 