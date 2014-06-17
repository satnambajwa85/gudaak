<?php
$this->breadcrumbs=array(
	'Counselors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Counselor', 'url'=>array('index')),
	array('label'=>'Manage Counselor', 'url'=>array('admin')),
);
?>

<h1>Create Counselor</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'counselor-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_login_id'); ?>
		<?php 
		$list_data	=	array();
		$lists	    =	UserLogin::model()->findAllByAttributes(array('user_role_id'=>5));
		foreach($lists as $list)
		if(count($list->counselors)==0)
			$list_data[]	=	$list;
		
		$listData = CHtml::listData($list_data,'id', 'username');
		echo $form->dropDownlist($model,'user_login_id',$listData,array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'user_login_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth'); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
        <?php echo $form->radioButtonlist($model,'gender',array('male'=>'Male','female'=>'Female'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postcode'); ?>
		<?php echo $form->textField($model,'postcode',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_email'); ?>
		<?php echo $form->textField($model,'work_email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'work_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alternative_email'); ?>
		<?php echo $form->textField($model,'alternative_email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'alternative_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'official_email'); ?>
		<?php echo $form->textField($model,'official_email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'official_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_phone_no'); ?>
		<?php echo $form->textField($model,'work_phone_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'work_phone_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_no'); ?>
		<?php echo $form->textField($model,'mobile_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'mobile_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		<?php echo $form->textField($model,'contact_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alternative_mobile_no'); ?>
		<?php echo $form->textField($model,'alternative_mobile_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'alternative_mobile_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'official_contact_no'); ?>
		<?php echo $form->textField($model,'official_contact_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'official_contact_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shot_description'); ?>
		<?php echo $form->textField($model,'shot_description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'shot_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about'); ?>
		<?php echo $form->textArea($model,'about',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_details'); ?>
		<?php echo $form->textArea($model,'other_details',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'other_details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resume'); ?>
		<?php echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'resume'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activation'); ?>
        <?php echo $form->radioButtonlist($model,'activation',array('1'=>'Yes','0'=>'No'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'activation'); ?>
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