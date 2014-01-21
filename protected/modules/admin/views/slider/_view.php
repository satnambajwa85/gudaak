<?php
/* @var $this SliderController */
/* @var $data Slider */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title1')); ?>:</b>
	<?php echo CHtml::encode($data->title1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title2')); ?>:</b>
	<?php echo CHtml::encode($data->title2); ?>
	<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('test_type_title1')); ?>:</b>
		<?php echo CHtml::encode($data->test_type_title); ?>
		<br />
<b><?php echo CHtml::encode($data->getAttributeLabel('test_type_title2')); ?>:</b>
	<?php echo CHtml::encode($data->test_type_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description1')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('description2')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('image1')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('image2')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
	<?php echo CHtml::encode($data->published); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	*/ ?>

</div>