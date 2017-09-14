<?php

/* @var $this TagsController */
/* @var $data Tags */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tag_id), array('view', 'id'=>$data->tag_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_key')); ?>:</b>
	<?php echo CHtml::encode($data->tag_key); ?>
	<br />

</div>
