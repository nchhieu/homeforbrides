<?php

/* @var $this PostCatSliderController */
/* @var $data PostCatSlider */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('post_cat_slider_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->post_cat_slider_id), array('view', 'id'=>$data->post_cat_slider_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->cat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slider_position')); ?>:</b>
	<?php echo CHtml::encode($data->slider_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slider_url')); ?>:</b>
	<?php echo CHtml::encode($data->slider_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slider_sort')); ?>:</b>
	<?php echo CHtml::encode($data->slider_sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slider_status')); ?>:</b>
	<?php echo CHtml::encode($data->slider_status); ?>
	<br />

</div>
