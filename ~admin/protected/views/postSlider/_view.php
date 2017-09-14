<?php

/* @var $this PostSliderController */
/* @var $data PostSlider */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('post_slider_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->post_slider_id), array('view', 'id'=>$data->post_slider_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b>
	<?php echo CHtml::encode($data->post_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photos')); ?>:</b>
	<?php echo CHtml::encode($data->photos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order')); ?>:</b>
	<?php echo CHtml::encode($data->order); ?>
	<br />

</div>
