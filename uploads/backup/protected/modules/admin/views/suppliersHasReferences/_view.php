<?php
/* @var $this SuppliersHasReferencesController */
/* @var $data SuppliersHasReferences */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->client_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_last_name')); ?>:</b>
	<?php echo CHtml::encode($data->client_last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_name')); ?>:</b>
	<?php echo CHtml::encode($data->project_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_email')); ?>:</b>
	<?php echo CHtml::encode($data->client_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('year_engagement')); ?>:</b>
	<?php echo CHtml::encode($data->year_engagement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('industry_id')); ?>:</b>
	<?php echo CHtml::encode($data->industry_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suppliers_id')); ?>:</b>
	<?php echo CHtml::encode($data->suppliers_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q1_communication_rating')); ?>:</b>
	<?php echo CHtml::encode($data->q1_communication_rating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q2_skill_rating')); ?>:</b>
	<?php echo CHtml::encode($data->q2_skill_rating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q3_timelines_ratings')); ?>:</b>
	<?php echo CHtml::encode($data->q3_timelines_ratings); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q4_independence_rating')); ?>:</b>
	<?php echo CHtml::encode($data->q4_independence_rating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider_do_well')); ?>:</b>
	<?php echo CHtml::encode($data->provider_do_well); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider_improve')); ?>:</b>
	<?php echo CHtml::encode($data->provider_improve); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('problems_during_development')); ?>:</b>
	<?php echo CHtml::encode($data->problems_during_development); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_project_description')); ?>:</b>
	<?php echo CHtml::encode($data->client_project_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>