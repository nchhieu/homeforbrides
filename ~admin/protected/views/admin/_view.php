<?php

/* @var $this AdminController */
/* @var $data Admin */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->admin_id), array('view', 'id'=>$data->admin_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_email')); ?>:</b>
	<?php echo CHtml::encode($data->admin_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_name')); ?>:</b>
	<?php echo CHtml::encode($data->admin_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_phone')); ?>:</b>
	<?php echo CHtml::encode($data->admin_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_rights')); ?>:</b>
	<?php echo CHtml::encode($data->admin_rights); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_avatar')); ?>:</b>
	<?php echo CHtml::encode($data->admin_avatar); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_status')); ?>:</b>
	<?php echo CHtml::encode($data->admin_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->admin_created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_latest_login')); ?>:</b>
	<?php echo CHtml::encode($data->admin_latest_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_login_times')); ?>:</b>
	<?php echo CHtml::encode($data->admin_login_times); ?>
	<br />

	*/ ?>
</div>
