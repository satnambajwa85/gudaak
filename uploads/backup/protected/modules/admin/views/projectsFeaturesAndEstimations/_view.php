<?php
/* @var $this ProjectsFeaturesAndEstimationsController */
/* @var $data ProjectsFeaturesAndEstimations */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_projects_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_projects_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('features_id')); ?>:</b>
	<?php echo CHtml::encode($data->features_id); ?>
	<br />


</div>