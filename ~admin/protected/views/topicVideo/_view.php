<?php

/* @var $this TopicVideoController */
/* @var $data TopicVideo */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->topic_id), array('view', 'id'=>$data->topic_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_id')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_alias')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_name')); ?>:</b>
	<?php echo CHtml::encode($data->topic_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_alias')); ?>:</b>
	<?php echo CHtml::encode($data->topic_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_intro')); ?>:</b>
	<?php echo CHtml::encode($data->topic_intro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->topic_thumb); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_status')); ?>:</b>
	<?php echo CHtml::encode($data->topic_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_sort')); ?>:</b>
	<?php echo CHtml::encode($data->topic_sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_keyword')); ?>:</b>
	<?php echo CHtml::encode($data->topic_keyword); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_description')); ?>:</b>
	<?php echo CHtml::encode($data->topic_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_added_date')); ?>:</b>
	<?php echo CHtml::encode($data->topic_added_date); ?>
	<br />

	*/ ?>
</div>
