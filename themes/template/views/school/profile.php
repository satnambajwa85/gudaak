<?php $this->pageTitle=Yii::app()->name . ' - Profile';
$this->breadcrumbs=array('Forms',);?>
<div class="col-md-8 pop-up-border fl col-lg-offset-2" >
	<div class="row test-bot">School Profile</div> <a class="pull-right" onclick="$('#user-profile-form').hide();$('#user-profile-form-after').show();">Edit</a>
		<div  id="user-profile-form">
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
						<img src="<?php echo Yii::app()->baseUrl?>/uploads/schools/large/<?php echo $model->images;?>" />
					</div>
					<div class="form-group">
						<?php ///echo $form->labelEx($model,'images'); ?>
						<?php //echo $form->fileField($model,'images',array('size'=>45,'maxlength'=>45)); ?>
						<?php //echo $form->error($model,'images'); ?>
						<?php if(isset($model->images)){ ?> 
						<?php echo $form->hiddenField($model,'images',array('value'=>$model->images)); ?>
						<?php }?>
					</div>
				</div>
			  	<div class="col-md-8 pull-right right-pad">
				<?php echo $form->textField($model,'name',array('disabled'=>"disabled",'class'=>'form-control','placeholder'=>'School Name','autofocus'=>true));
				echo $form->error($model,'name');?>
				
				 
				<?php echo $form->textField($model,'address',array('disabled'=>"disabled",'class'=>'form-control','placeholder'=>'Address1','autofocus'=>true));
				echo $form->error($model,'address');
				?>
			 
				<?php echo $form->textField($model,'address2',array('disabled'=>"disabled",'class'=>'form-control','placeholder'=>'Address2','autofocus'=>true));
				echo $form->error($model,'address2');
				?>
				 
				<div class="col-md-6 pd0"> 
				<?php echo $form->textField($model,'postcode',array('disabled'=>"disabled",'class'=>'form-control col-md-5','placeholder'=>'City','autofocus'=>true));
				echo $form->error($model,'postcode');?>
				</div>
				<div class="col-md-6 pd0  pull-right"> 
					<?php echo $form->dropDownlist($model,'states_id',CHtml::listData(States::model()->findAll(),'id','title'),array('disabled'=>"disabled",'class'=>'form-control'));
					echo $form->error($model,'states_id');?>
				</div>
				<div class="clear"></div>
				<div class="col-md-6 pd0"> 
				<?php echo $form->textField($model,'postcode',array('disabled'=>"disabled",'class'=>'form-control col-md-5','placeholder'=>'postcode','autofocus'=>true));
				echo $form->error($model,'postcode');?>
				</div>
				<div class="col-md-6 pd0  pull-right"> 
					<?php echo $form->dropDownlist($model,'countries_id',CHtml::listData(Countries::model()->findAll(),'id','title'),array('disabled'=>"disabled",'class'=>'form-control'));
					echo $form->error($model,'countries_id');?>
				</div>
				<div class="clear"></div>
				<?php echo $form->textField($model,'postcode',array('disabled'=>"disabled",'class'=>'form-control','placeholder'=>'Postcode','autofocus'=>true));
				echo $form->error($model,'postcode');
				?>	 
				<?php echo $form->textField($model,'telephone_no',array('disabled'=>"disabled",'class'=>'form-control','placeholder'=>'Telephone','autofocus'=>true));
				echo $form->error($model,'telephone_no');
				?>
				<?php echo $form->textField($model,'fax',array('disabled'=>"disabled",'class'=>'form-control','placeholder'=>'Fax','autofocus'=>true));
				echo $form->error($model,'fax');
				?>
				<?php echo $form->textField($model,'email',array('disabled'=>"disabled",'class'=>'form-control','placeholder'=>'Email','autofocus'=>true));
				echo $form->error($model,'email');
				?>
				<?php echo $form->textField($model,'email',array('disabled'=>"disabled",'class'=>'form-control','placeholder'=>'Available Grades','autofocus'=>true));?>
             <?php $this->endWidget();?>    
        </div>
        </div>
       <div id="user-profile-form-after" style="display:none;">
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
						<img src="<?php echo Yii::app()->baseUrl?>/uploads/schools/large/<?php echo $model->images;?>" />
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model,'images'); ?>
						<?php echo $form->fileField($model,'images',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'images'); ?>
						<?php if(isset($model->images)){ ?> 
						<?php echo $form->hiddenField($model,'images',array('value'=>$model->images)); ?>
						<?php }?>
					</div>
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
				 
				<div class="col-md-6 pd0"> 
				<?php echo $form->textField($model,'postcode',array('class'=>'form-control col-md-5','placeholder'=>'City','autofocus'=>true));
				echo $form->error($model,'postcode');?>
				</div>
				<div class="col-md-6 pd0  pull-right"> 
					<?php echo $form->dropDownlist($model,'states_id',CHtml::listData(States::model()->findAll(),'id','title'),array('class'=>'form-control'));
					echo $form->error($model,'states_id');?>
				</div>
				<div class="clear"></div>
				<div class="col-md-6 pd0"> 
				<?php echo $form->textField($model,'postcode',array('class'=>'form-control col-md-5','placeholder'=>'postcode','autofocus'=>true));
				echo $form->error($model,'postcode');?>
				</div>
				<div class="col-md-6 pd0  pull-right"> 
					<?php echo $form->dropDownlist($model,'countries_id',CHtml::listData(Countries::model()->findAll(),'id','title'),array('class'=>'form-control'));
					echo $form->error($model,'countries_id');?>
				</div>
				<div class="clear"></div>
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
				<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Available Grades','autofocus'=>true));
				echo $form->error($model,'email');
				?>
			   
				
				<div>
				<?php echo CHtml::submitButton('Submit Details',array('class'=>'btn btn-warning login mt'));?>
				</div>
				</div>
			  <?php $this->endWidget();?>
		</div>	
	</div>