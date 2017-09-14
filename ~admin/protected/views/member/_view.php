<?php

/* @var $this MemberController */
/* @var $data Member */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('member_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->member_id), array('view', 'id'=>$data->member_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fb_id')); ?>:</b>
	<?php echo CHtml::encode($data->fb_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('google_id')); ?>:</b>
	<?php echo CHtml::encode($data->google_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latest_log_date')); ?>:</b>
	<?php echo CHtml::encode($data->latest_log_date); ?>
	<br />

	*/ ?>
</div>
