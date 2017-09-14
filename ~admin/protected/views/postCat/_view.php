<?php

/* @var $this PostCatController */
/* @var $data PostCat */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cat_id), array('view', 'id'=>$data->cat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_name')); ?>:</b>
	<?php echo CHtml::encode($data->cat_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_alias')); ?>:</b>
	<?php echo CHtml::encode($data->cat_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_screen')); ?>:</b>
	<?php echo CHtml::encode($data->cat_screen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->cat_thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_order')); ?>:</b>
	<?php echo CHtml::encode($data->cat_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_status')); ?>:</b>
	<?php echo CHtml::encode($data->cat_status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_description')); ?>:</b>
	<?php echo CHtml::encode($data->cat_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_keyword')); ?>:</b>
	<?php echo CHtml::encode($data->cat_keyword); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_updated_time')); ?>:</b>
	<?php echo CHtml::encode($data->cat_updated_time); ?>
	<br />

	*/ ?>
</div>
