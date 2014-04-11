<?php
/* @var $this TestReportsController */
/* @var $data TestReports */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activation')); ?>:</b>
	<?php echo CHtml::encode($data->activation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_profiles_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_profiles_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questions_id')); ?>:</b>
	<?php echo CHtml::encode($data->questions_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_options_id')); ?>:</b>
	<?php echo CHtml::encode($data->question_options_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('reports_id')); ?>:</b>
	<?php echo CHtml::encode($data->reports_id); ?>
	<br />

	*/ ?>

</div>