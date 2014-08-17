<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-projects-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'client_profiles_id'); ?>
		<?php // echo $form->textField($model,'client_profiles_id'); ?>
		
		<?php 
			    
		//		$connection=Yii::app()->db;
		//		$sql = "SELECT display_name,id FROM users  where id not in(select users_id from client_profiles) and id not in(select users_id from suppliers)";  echo $form->dropDownList($model,'client_profiles_id',$final_option,array('empty'=>'Select a Client'));
			    $list_data	=	array();
				$lists	    =	clientProfiles::model()->findAll();
				foreach($lists as $list)
				{	
					$list_data[]	=	$list;
				}
				$listData = CHtml::listData($list_data,'id','Concate');
				echo $form->dropDownList($model,'client_profiles_id',$listData,array('empty'=>'Select a Client'));

		 
		 ?>
		
		<?php echo $form->error($model,'client_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag_line'); ?>
		<?php echo $form->textField($model,'tag_line',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tag_line'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business_problem'); ?>
		<?php echo $form->textArea($model,'business_problem',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'business_problem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about_company'); ?>
		<?php echo $form->textArea($model,'about_company',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_call_scheduled'); ?>
		<?php echo $form->textField($model,'is_call_scheduled'); ?>
		<?php echo $form->error($model,'is_call_scheduled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'summary'); ?>
		<?php echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'summary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'requirement_change_scale'); ?>
		<?php echo $form->textField($model,'requirement_change_scale',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'requirement_change_scale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_budget'); ?>
		<?php echo $form->textField($model,'min_budget',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'min_budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_budget'); ?>
		<?php echo $form->textField($model,'max_budget',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'max_budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'custom_budget_range'); ?>
		<?php echo $form->textField($model,'custom_budget_range',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'custom_budget_range'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'absolute_necessary_language'); ?>
		<?php echo $form->textField($model,'absolute_necessary_language',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'absolute_necessary_language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_know_language'); ?>
		<?php echo $form->textField($model,'good_know_language',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'good_know_language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'which_one_is_important'); ?>
		<?php echo $form->textField($model,'which_one_is_important',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'which_one_is_important'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'questions_for_supplier'); ?>
		<?php echo $form->textArea($model,'questions_for_supplier',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'questions_for_supplier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_status'); ?>
	<?php  echo $form->radioButtonList($model,'current_status',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ')) ;?>	
		<?php echo $form->error($model,'current_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->