<?php

/* @var $this CityController */
/* @var $data City */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->city_id), array('view', 'id'=>$data->city_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_name')); ?>:</b>
	<?php echo CHtml::encode($data->city_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_alias')); ?>:</b>
	<?php echo CHtml::encode($data->city_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_order')); ?>:</b>
	<?php echo CHtml::encode($data->city_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_status')); ?>:</b>
	<?php echo CHtml::encode($data->city_status); ?>
	<br />

</div>
