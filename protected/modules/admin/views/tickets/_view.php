<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sender_id')); ?>:</b>
	<?php echo CHtml::encode($data->sender_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_id')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('problem')); ?>:</b>
	<?php echo CHtml::encode($data->problem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mode')); ?>:</b>
	<?php echo CHtml::encode($data->mode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
	<?php echo CHtml::encode($data->language); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('available')); ?>:</b>
	<?php echo CHtml::encode($data->available); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solution')); ?>:</b>
	<?php echo CHtml::encode($data->solution); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modification_date')); ?>:</b>
	<?php echo CHtml::encode($data->modification_date); ?>
	<br />

	*/ ?>

</div>