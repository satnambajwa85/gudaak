<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
        <?php 
			      
				  
				$list_data	=	array();
				$lists	    =	Role::model()->findAll("id !=1");
				foreach($lists as $list)
				{	
					$list_data[]	=	$list;
				}
				$listData = CHtml::listData($list_data,'id', 'name');
				echo $form->dropDownList($model,'role_id',$listData,array('empty'=>'Select a role',"disabled"=>(!$model->isNewRecord)?"disabled":""));

		 ?>
        
        
		<?php echo $form->error($model,'role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'display_name'); ?>
		<?php echo $form->textField($model,'display_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'display_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>150,'placeholder'=>'abc@example.com')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row hide">
		<?php echo $form->labelEx($model,'linkedin'); ?>
		<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'linkedin'); ?>
	</div>

	<!-- <div class="row">
		<?php //echo $form->labelEx($model,'role'); ?>
		<?php //echo $form->textField($model,'role',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'role'); ?>
	</div>

	<div class="row">
  <?php //echo $form->labelEx($model,'add_date'); ?>
  <?php	
  /*$form->textField($model, 'add_date')->widget(DateTimePicker::classname(),['options' => ['placeholder' => 'Enter event time ...'],
	    'pluginOptions' => [
		'autoclose' => true,
		 'format' => 'yyyy-mm-dd hh:ii'
    ]
	]);	*/
  
  //$form->textField($model,'add_date');
	?>

		<?php // $form->error($model,'add_date'); ?>
	</div>  

	<div class="row">
		<?php //echo $form->labelEx($model,'last_login'); ?>
		<?php //echo $form->textField($model,'last_login'); ?>
		<?php //echo $form->error($model,'last_login'); ?>
	</div>
    -->

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php  echo $form->radioButtonList($model,'status',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ',)) ;?>
		<?php echo $form->error($model,'status'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'link_status');?>
		<?php echo $form->radioButtonList($model,'link_status',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>' ',));?>
		<?php echo $form->error($model,'link_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->