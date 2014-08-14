<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-has-references-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
    <div class="row">
		<?php echo $form->labelEx($model,'suppliers_id'); ?>
		<?php  $list_data	= Suppliers::model()->findAll();
			  $listData 	= CHtml::listData($list_data,'id', 'name');
			echo  ($model->isNewRecord)?$form->dropDownList($model,'suppliers_id',$listData,array('empty'=>'Select a Supplier')):$form->textField($model->suppliers,'name',array('size'=>60,'maxlength'=>250,'disabled'=>'disabled'));?>
		<?php echo $form->error($model,'suppliers_id'); ?>
	</div>
    	
	<div class="row">
		<?php echo $form->labelEx($model,'client_id'); ?>
 		<?php $list_data	= ClientProfiles::model()->findAll();
			  $listData 	= CHtml::listData($list_data,'id', 'first_name');
			 echo  ($model->isNewRecord)? $form->dropDownList($model,'client_id',$listData,array('empty'=>'Select a Client')): $form->dropDownList($model,'client_id',$listData,array('empty'=>'Select a Client','disabled'=>'disabled'));?>
               Or <a href="<?php echo $this->createUrl('users/create');?>">Create New </a>
		<?php echo $form->error($model,'client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_first_name'); ?>
       	<?php echo $form->textField($model,'client_first_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'client_first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_last_name'); ?>
		<?php echo $form->textField($model,'client_last_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'client_last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'project_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_email'); ?>
		<?php echo $form->textField($model,'client_email',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'client_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_engagement'); ?>
		<?php echo $form->textField($model,'year_engagement',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'year_engagement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'industry_id'); ?>
		<?php  $list_data	= Industries::model()->findAll();
			  $listData 	= CHtml::listData($list_data,'id', 'name');
			  echo $form->dropDownList($model,'industry_id',$listData,array('empty'=>'Select a Industry'));?>
		<?php echo $form->error($model,'industry_id'); ?>
	</div>
	
    <div class="row">
		<?php echo $form->labelEx($model,'client_project_description'); ?>
		<?php echo $form->textArea($model,'client_project_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'client_project_description'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'q1_communication_rating'); ?>
		 <?php  echo $form->radioButtonList($model,'q1_communication_rating',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),array('labelOptions'=>array('style'=>'display:inline','checked'=>'checked'),'separator'=>'  ',)) ;?>
		<?php echo $form->error($model,'q1_communication_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q2_skill_rating'); ?>
	<?php  echo $form->radioButtonList($model,'q2_skill_rating',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),array('labelOptions'=>array('style'=>'display:inline','checked'=>'checked'),'separator'=>'  ',)) ;?>
		<?php echo $form->error($model,'q2_skill_rating'); ?><br />

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q3_timelines_ratings'); ?>
		<?php  echo $form->radioButtonList($model,'q3_timelines_ratings',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),array('labelOptions'=>array('style'=>'display:inline','checked'=>'checked'),'separator'=>'  ',)) ;?>	
	<?php echo $form->error($model,'q3_timelines_ratings'); ?>
<br />
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q4_independence_rating'); ?>
		<?php  echo $form->radioButtonList($model,'q4_independence_rating',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),array('labelOptions'=>array('style'=>'display:inline','checked'=>'checked'),'separator'=>'  ',)) ;?>	
		<?php echo $form->error($model,'q4_independence_rating'); ?>
<br />
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provider_do_well'); ?>
		<?php echo $form->textArea($model,'provider_do_well',array('rows'=>6, 'cols'=>50,'placeholder'=>'What do they do well')); ?>
		<?php echo $form->error($model,'provider_do_well'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provider_improve'); ?>
		<?php echo $form->textArea($model,'provider_improve',array('rows'=>6, 'cols'=>50,'placeholder'=>'Improvements')); ?>
		<?php echo $form->error($model,'provider_improve'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'problems_during_development'); ?>
		<?php echo $form->textArea($model,'problems_during_development',array('rows'=>6, 'cols'=>50,'placeholder'=>'Problems During Development')); ?>
		<?php echo $form->error($model,'problems_during_development'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		 <?php echo $form->radioButtonList($model,'status',array('Awating Review','Verified'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ',)) ;?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<!--	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
