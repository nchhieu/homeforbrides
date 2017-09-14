<?php

/* @var $this WeddingStepController */
/* @var $data WeddingStep */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('step_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->step_id), array('view', 'id'=>$data->step_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step_title')); ?>:</b>
	<?php echo CHtml::encode($data->step_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step_order')); ?>:</b>
	<?php echo CHtml::encode($data->step_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step_status')); ?>:</b>
	<?php echo CHtml::encode($data->step_status); ?>
	<br />

</div>
