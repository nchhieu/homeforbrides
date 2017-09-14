<?php

/* @var $this GalleryPhotosController */
/* @var $data GalleryPhotos */
?>
<div class="view">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_photo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gallery_photo_id), array('view', 'id'=>$data->gallery_photo_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b>
	<?php echo CHtml::encode($data->post_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_id')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_title')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('galley_photo')); ?>:</b>
	<?php echo CHtml::encode($data->galley_photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keyword')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keyword); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_order')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_order); ?>
	<br />

	*/ ?>
</div>
