<?php
/* @var $this CareerOptionsHasSubjectsController */
/* @var $data CareerOptionsHasSubjects */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('career_options_id')); ?>:</b>
	<?php echo CHtml::encode($data->career_options_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subjects_id')); ?>:</b>
	<?php echo CHtml::encode($data->subjects_id); ?>
	<br />


</div>