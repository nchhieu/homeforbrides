<?php

/* @var $this GalleryController */
/* @var $data Gallery */
?>

<div class="view"> <b><?php echo CHtml::encode($data->getAttributeLabel('gallery_id')); ?>:</b> <?php echo CHtml::link(CHtml::encode($data->gallery_id), array('view', 'id'=>$data->gallery_id)); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b> <?php echo CHtml::encode($data->post_id); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('gallery_name')); ?>:</b> <?php echo CHtml::encode($data->gallery_name); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('location_id')); ?>:</b> <?php echo CHtml::encode($data->location_id); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b> <?php echo CHtml::encode($data->city_id); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('gallery_taken_time')); ?>:</b> <?php echo CHtml::encode($data->gallery_taken_time); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('photographer_id')); ?>:</b> <?php echo CHtml::encode($data->photographer_id); ?> <br />
  <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('photographer_name')); ?>:</b>
	<?php echo CHtml::encode($data->photographer_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keyword')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keyword); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />

	*/ ?>
</div>
