<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-profiles-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
        <?php 
			     
				$list_data	=	array();
				$lists	    =	Users::model()->findAllByAttributes(array('role_id'=>2));
			 	foreach($lists as $listval)
					$listval->display_name=$listval->display_name.'::'.$listval->username;
			 	$listData = CHtml::listData($lists,'id', 'display_name');
                if($model->isNewRecord)
                {
                    echo $form->dropDownList($model,'users_id',$listData,array('empty'=>'Select a User'));    
                }else{
                    echo $form->dropDownList($model,'users_id',$listData,array('empty'=>'Select a User','disabled'=>'disabled'));
                }
				  
		 ?>
        
		<?php echo $form->error($model,'users_id'); ?>
	</div>

	 <div class="row">
				<?php echo CHtml::label('Country','');?>
                <?php          
                             $countryList	= States::model()->findAll();
                             $list = CHtml::listData($countryList, 'id', 'name');
                        if(isset($model->cities->states_id)) 
						{                        
                          echo CHtml::dropDownList('state_id',$model->cities->states_id, $list, 
                          array(
                            'prompt'=>'Select Region',
                            'style'=>'width:200px',
                            'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('site/dynamicCity'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update'=>'#ClientProfiles_cities_id', //or 'success' => 'function(data){...handle the data in the way you want...}',
                          'data'=>array('state_id'=>'js:this.value'),
                          ))); 
						}
						else
						{
							echo CHtml::dropDownList('state_id','', $list, 
                          array(
                            'prompt'=>'Select Region',
                            'style'=>'width:200px',
                            'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('site/dynamicCity'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update'=>'#ClientProfiles_cities_id', //or 'success' => 'function(data){...handle the data in the way you want...}',
                          'data'=>array('state_id'=>'js:this.value'),
                          ))); 
						}
                ?>
	</div>
     <div class="row">
		<?php echo $form->labelEx($model,'cities_id'); ?>
		<?php 
		if(isset($model->cities->states_id))
		{
			echo  $form->dropDownList($model,'cities_id', CHtml::listData(Cities::model()->findAllByAttributes(array('states_id'=>$model->cities->states_id)),'id','name'), array('prompt'=>'Select City','style'=>'width:200px'));
		}
		else
		{
			echo  $form->dropDownList($model,'cities_id',array(), array('prompt'=>'Select City','style'=>'width:200px'));
		}?>
		<?php echo $form->error($model,'cities_id'); ?>
	</div>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'cities_id'); ?>
		<?php /*
			      
				$list_data	=	array();
				$lists	    =	Cities::model()->findAll();
				foreach($lists as $list)
				{		
					$list_data[]	=$list;
				}
				$listData = CHtml::listData($list_data,'id', 'name');
				echo $form->dropDownList($model,'cities_id',$listData,array('empty'=>'Select a City'));
				  
				  
				*/  	 ?>
		<?php //echo $form->error($model,'cities_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div>
<!--
	<div class="row">
		<?php //echo $form->labelEx($model,'address2'); ?>
		<?php //echo $form->textField($model,'address2',array('size'=>50,'maxlength'=>50)); ?>
		<?php //echo $form->error($model,'address2'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'add_date'); ?>
		<?php //echo $form->textField($model,'add_date'); ?>
		<?php //echo $form->error($model,'add_date'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php  echo $form->radioButtonList($model,'status',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ',)) ;?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->