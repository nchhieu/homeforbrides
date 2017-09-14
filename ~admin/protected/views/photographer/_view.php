<?php

/* @var $this PhotographerController */
/* @var $data Photographer */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('photographer_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->photographer_id), array('view', 'id'=>$data->photographer_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photographer_nick')); ?>:</b>
	<?php echo CHtml::encode($data->photographer_nick); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photographer_fullname')); ?>:</b>
	<?php echo CHtml::encode($data->photographer_fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photographer_phone')); ?>:</b>
	<?php echo CHtml::encode($data->photographer_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photographer_avatar')); ?>:</b>
	<?php echo CHtml::encode($data->photographer_avatar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photographer_gender')); ?>:</b>
	<?php echo CHtml::encode($data->photographer_gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photographer_status')); ?>:</b>
	<?php echo CHtml::encode($data->photographer_status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_id')); ?>:</b>
	<?php echo CHtml::encode($data->admin_id); ?>
	<br />

	*/ ?>
</div>
