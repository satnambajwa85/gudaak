<?php
/* @var $this SiteSettingController */
/* @var $data SiteSetting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('web_site')); ?>:</b>
	<?php echo CHtml::encode($data->web_site); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_no')); ?>:</b>
	<?php echo CHtml::encode($data->phone_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile_no')); ?>:</b>
	<?php echo CHtml::encode($data->mobile_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fb_link')); ?>:</b>
	<?php echo CHtml::encode($data->fb_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('twittwe_link')); ?>:</b>
	<?php echo CHtml::encode($data->twittwe_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkedin_link')); ?>:</b>
	<?php echo CHtml::encode($data->linkedin_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('youtube_link')); ?>:</b>
	<?php echo CHtml::encode($data->youtube_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_alais')); ?>:</b>
	<?php echo CHtml::encode($data->site_alais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
	<?php echo CHtml::encode($data->published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_meta')); ?>:</b>
	<?php echo CHtml::encode($data->site_meta); ?>
	<br />

	*/ ?>

</div>