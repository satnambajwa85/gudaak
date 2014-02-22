    <div class="span11">
    <?php
	$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Text fields",
		));
		
	?>
<?php if(Yii::app()->user->hasFlash('error')): ?>
	<div class="alert alert-success">
	  <button data-dismiss="alert" class="close" type="button">×</button>
	  <strong><?php echo Yii::app()->user->getFlash('error'); ?></strong>
	</div>
		 
<?php endif; ?>	
   <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'generate-gudaak-ids-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>false,)	
)); 
	echo $form->errorSummary($model);
	echo $form->hiddenField($model,'gudaak_id',array('value'=>'GDK'));
	echo $form->labelEx($model,'cities_id');
	echo $form->dropDownList($model,'cities_id',
								CHtml::listData(Cities::model()->findAll(),'id','title'),
								array('empty'=>'Please Select','ajax' => array('type'=>'POST',
									'url'=>CController::createUrl('DynamicList'), //url to call.
									'update'=>'#CareerOptions_career_id',
										)));
	echo $form->error($model,'cities_id');
	echo $form->labelEx($model,'schools_id');
	echo $form->dropDownlist($model,'schools_id',CHtml::listData(Schools::model()->findAll(),'id','name'),array('empty'=>'Please Select','class'=>'form-control'));
	echo $form->error($model,'schools_id');
	echo $form->labelEx($model,'user_role_id');
	echo $form->dropDownlist($model,'user_role_id',CHtml::listData(UserRole::model()->findAll(),'id','title'),array('empty'=>'Please Select','class'=>'form-control'));
	//echo $form->labelEx($model,'user_class_id');
	//echo $form->dropDownlist($model,'user_class_id',CHtml::listData(UserClass::model()->findAll(),'id','title'),array('empty'=>'Please Select','class'=>'form-control'));
	echo $form->labelEx($model,'number_of_user_Ids');
	echo $form->textField($model,'number_of_user_Ids');
	echo $form->error($model,'number_of_user_Ids');
	echo $form->labelEx($model,'activation');
	echo $form->radioButtonlist($model,'activation',array('1'=>'Yes','0'=>'No'),array('separator'=>''));
	echo $form->error($model,'activation');
	echo '<br><br>';
	echo $form->labelEx($model,'status');
	echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>''));
	echo $form->error($model,'status');
	echo '<br><br>';
	echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-s-md btn-success'));
	 $this->endWidget(); ?>
    <?php $this->endWidget();?>
    </div>
	