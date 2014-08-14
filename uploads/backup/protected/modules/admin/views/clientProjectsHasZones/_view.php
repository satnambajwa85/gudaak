<?php
/* @var $this ClientProjectsHasZonesController */
/* @var $data ClientProjectsHasZones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_projects_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_projects_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zones_id')); ?>:</b>
	<?php echo CHtml::encode($data->zones_id); ?>
	<br />


</div>