<?php

/* @var $this LocationController */
/* @var $data Location */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('location_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->location_id), array('view', 'id'=>$data->location_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b>
	<?php echo CHtml::encode($data->post_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->location_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_name')); ?>:</b>
	<?php echo CHtml::encode($data->location_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dist_id')); ?>:</b>
	<?php echo CHtml::encode($data->dist_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_address')); ?>:</b>
	<?php echo CHtml::encode($data->location_address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('location_phone')); ?>:</b>
	<?php echo CHtml::encode($data->location_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_biz_open')); ?>:</b>
	<?php echo CHtml::encode($data->location_biz_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_price')); ?>:</b>
	<?php echo CHtml::encode($data->location_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_status')); ?>:</b>
	<?php echo CHtml::encode($data->location_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_order')); ?>:</b>
	<?php echo CHtml::encode($data->location_order); ?>
	<br />

	*/ ?>
</div>
