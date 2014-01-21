<?php /* @var $this SiteController */
$this->pageTitle=Yii::app()->name . ' - Forms';
$this->breadcrumbs=array('Forget Password ',);?>
<div class="col-md-10 col-md-offset-1 forget-container ">
	<div class="col-md-12 pd13" id="render">
		<?php $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form',
															'htmlOptions'=>array('class'=>'col-md-4 col-md-offset-4'),
															'enableClientValidation'=>true,
															'clientOptions'=>array(
																'validateOnSubmit'=>true,
															),
														)); ?>
				<i class="icon-key orange pull-left"></i>
				<h4 class="form-signin-heading mr0">Get your  password.</h4>
				<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email address','autofocus'=>true)); 
				echo $form->error($model,'email');?>
				<div class="pd4"></div>
				<div class="reg_text"> 
					<?php if(CCaptcha::checkRequirements()): $this->widget('CCaptcha');?>
				</div>
				<div class="hint">
					<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control'));
						echo $form->error($model,'verifyCode');
						echo '</div>';
					endif; ?>
				<div class="pd4"></div>
				<?php echo CHtml::submitButton('Send',array('class'=>'btn btn-warning login pull-right','style'=>'width:92px'));?>
				
			<?php	$this->endWidget();?>
 
	</div>
</div>
	   
		 
			