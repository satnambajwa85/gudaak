<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reccomended')); ?>:</b>
	<?php echo CHtml::encode($data->reccomended); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('self')); ?>:</b>
	<?php echo CHtml::encode($data->self); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default')); ?>:</b>
	<?php echo CHtml::encode($data->default); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_profiles_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_profiles_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('counsellor_id')); ?>:</b>
	<?php echo CHtml::encode($data->counsellor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('career_options_id')); ?>:</b>
	<?php echo CHtml::encode($data->career_options_id); ?>
	<br />

	*/ ?>

</div>