<?php

/* @var $this PostSubcatController */
/* @var $data PostSubcat */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->subcat_id), array('view', 'id'=>$data->subcat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->cat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_name')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_alias')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_order')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_status')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_keyword')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_keyword); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_description')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcat_updated_time')); ?>:</b>
	<?php echo CHtml::encode($data->subcat_updated_time); ?>
	<br />

	*/ ?>
</div>
