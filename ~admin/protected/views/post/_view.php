<?php

/* @var $this PostController */
/* @var $data Post */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->post_id), array('view', 'id'=>$data->post_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_type')); ?>:</b>
	<?php echo CHtml::encode($data->post_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->cat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_id')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_cat_name')); ?>:</b>
	<?php echo CHtml::encode($data->sub_cat_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_title')); ?>:</b>
	<?php echo CHtml::encode($data->post_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->post_thumb); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('post_intro')); ?>:</b>
	<?php echo CHtml::encode($data->post_intro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_alias')); ?>:</b>
	<?php echo CHtml::encode($data->post_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_status')); ?>:</b>
	<?php echo CHtml::encode($data->post_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_hot')); ?>:</b>
	<?php echo CHtml::encode($data->post_hot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_updated_date')); ?>:</b>
	<?php echo CHtml::encode($data->post_updated_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_id')); ?>:</b>
	<?php echo CHtml::encode($data->admin_id); ?>
	<br />

	*/ ?>
</div>
