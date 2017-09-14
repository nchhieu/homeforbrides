<?php

/* @var $this PostContentController */
/* @var $data PostContent */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('post_content_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->post_content_id), array('view', 'id'=>$data->post_content_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b>
	<?php echo CHtml::encode($data->post_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_header_photo')); ?>:</b>
	<?php echo CHtml::encode($data->post_header_photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_content')); ?>:</b>
	<?php echo CHtml::encode($data->post_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keyword')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keyword); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />

</div>
