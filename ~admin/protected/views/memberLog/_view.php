<?php

/* @var $this MemberLogController */
/* @var $data MemberLog */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('member_log_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->member_log_id), array('view', 'id'=>$data->member_log_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_id')); ?>:</b>
	<?php echo CHtml::encode($data->member_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loged_date')); ?>:</b>
	<?php echo CHtml::encode($data->loged_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />

</div>
