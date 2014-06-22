<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'counselor-has-schools-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php 
if(isset($_REQUEST['counselor_id']))
	echo CHtml::link("Counselor's School",array('/admin/counselorHasSchools/admin','counselor_id'=>$_REQUEST['counselor_id']),array('class'=>'pull-right btn btn-s-md btn-success mr20'));
else
	echo CHtml::link("Counselor's School",array('/admin/counselorHasSchools/admin'),array('class'=>'pull-right btn btn-s-md btn-success mr20'));?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'counselor_id'); ?>
		<?php echo  $form->dropDownList($model,'counselor_id',CHtml::listData(counselor::model()->findAll(),'id','first_name'),array('empty'=>'Please select'));?>
		<?php echo $form->error($model,'counselor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schools_id'); ?>
		<?php 
		$listData = CHtml::listData(Schools::model()->findAll(),'id', 'name');
		echo $form->dropDownList($model,'schools_id',$listData,array('empty'=>'Select one or many','multiple'=>true,'size'=>'5'));?>
		<?php echo $form->error($model,'schools_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonlist($model,'status',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->