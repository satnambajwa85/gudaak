<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Profile';
$this->breadcrumbs=array(
	'Forms',
);
?>
<div class="border">
					<ol class="breadcrumb">
					  <li><a href="#">Your Profile</a></li>
					 
					</ol>
				</div>
				<div class="col-md-9 pull-left">
					<div class="col-md-12  fl">
						<!--<div class="row test-bot">Question to know your interest</div>-->
						<div class="row pd0 ">
							<?php
							$form=$this->beginWidget('CActiveForm', array(
																'id'=>'user-update',
																'enableAjaxValidation'=>false,
																'htmlOptions'=>array('enctype'=>'multipart/form-data'),
													));?>
							<div class="fr updat-img " style="width:119px;height:172px;padding:22px 0 0 8px;">
								<?php $path =	Yii::app()->request->baseUrl.'/uploads/user/small/';?>
								<?php if(isset($model->image)){ ?> 
								<?php echo $form->hiddenField($model,'oldImage',array('value'=>$model->image)); ?>
								<img width="50px" height="50px" src="<?php echo $path.$model->image;?>" alt="image"/>
								 <?php }?>

								 <?php echo $form->fileField($model,'image'); ?>
							</div>
							
							<div class="form-group">
								<?php echo $form->labelEx($model,'first_name',array('class'=>'col-sm-5 control-label'));?>
								<div class="form-row">
									<?php echo $form->textField($model,'first_name',array('class'=>'form-control'));
									echo $form->error($model,'first_name');?>
								</div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model,'last_name',array('class'=>'col-sm-5 control-label'));?>
								<div class="form-row">
									<?php echo $form->textField($model,'last_name',array('class'=>'form-control'));
									echo $form->error($model,'last_name');?>
								</div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model,'date_of_birth',array('class'=>'col-sm-5 control-label'));?>
								<div class="form-row">
									<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
																			'model'=>$model,
																			'attribute'=>'date_of_birth',
																			'options'=>array('dateFormat'=>'yy-mm-dd',
																							'changeMonth'=>'true',
																							'changeYear'=>'true',
																			
																			),
																			'htmlOptions'=>array('class'=>'form-control'),
																			
																			));
									echo $form->error($model,'date_of_birth');?>
								</div>
							</div>
				
							<div class="form-group">
								<?php echo $form->labelEx($model,'class',array('class'=>'col-sm-5 control-label'));?>
								<div class="form-row">
									<?php echo $form->textField($model,'class',array('class'=>'form-control'));
									echo $form->error($model,'class');?>
								</div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model,'email',array('class'=>'col-sm-5 control-label'));?>
								<div class="form-row">
									<?php echo $form->textField($model,'email',array('class'=>'form-control'));
									echo $form->error($model,'email');?>
								</div>
							</div>
							<div class="form-group">
							<?php echo $form->labelEx($model,'mobile_no',array('class'=>'col-sm-5 control-label'));?>
							<div class="form-row">
							<?php echo $form->textField($model,'mobile_no',array('class'=>'form-control'));
							echo $form->error($model,'mobile_no');?>
							</div>
							</div>
			
							<div class="form-group">
								<?php echo $form->labelEx($model,'gender',array('class'=>'col-sm-5 control-label'));?>
								<div class="form-row">
									<?php echo $form->radioButtonlist($model,'gender',array('1'=>'Male','0'=>'Female'),array('separator'=>'','class'=>'pull-left'));
									echo $form->error($model,'gender');?>
								</div>
							</div>
						 	<div class="clear"></div>
							<?php echo CHtml::submitButton('Update',array('class'=>'update-internal btn btn-primary'));
									$this->endWidget();	?>

						</div>
					</div>
					<div class="clear"></div>
					
				</div>
			
			 	<div class="col-md-3 pd0 pull-left">
					<?php  $this->Widget('WidgetNews'); ?>
				</div>