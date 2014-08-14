<?php
/* @var $this NotificationsController */
/* @var $model Notifications */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'notifications-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'add_date'); ?>
		<?php //echo $form->textField($model,'add_date'); ?>
		<?php //echo $form->error($model,'add_date'); ?>
	
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
        <?php  echo $form->radioButtonList($model,'status',array('No','Yes'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'  ')) ;?>	
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_read'); ?>
		<?php echo $form->textField($model,'is_read'); ?>
		<?php echo $form->error($model,'is_read'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_id'); ?>
        <?php   
		        $list_log	=	array();
				$lists	    =	Log::model()->findAll();
				foreach($lists as $list)
				{
		     		$list_log[]	=	$list;
				}
				$listData = CHtml::listData($list_log,'login_id', 'title');
				echo $form->dropDownList($model,'log_id',$listData,array('empty'=>'Select a Log'));
		?>
		<?php //echo $form->textField($model,'log_id'); ?>
		<?php echo $form->error($model,'log_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
		<?php 
				$list_data	=	array();
				$lists	    =	Users::model()->findAll();
				foreach($lists as $list)
				{
		     		$list_data[]	=	$list;
				}
				$listData = CHtml::listData($list_data,'id', 'display_name');
				echo $form->dropDownList($model,'users_id',$listData,array('empty'=>'Select a User'));
		?>
		<?php echo $form->error($model,'users_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->