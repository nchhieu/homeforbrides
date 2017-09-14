<?php

/* @var $this VideoController */
/* @var $data Video */
?>

<div class="view"> <b><?php echo CHtml::encode($data->getAttributeLabel('video_id')); ?>:</b> <?php echo CHtml::link(CHtml::encode($data->video_id), array('view', 'id'=>$data->video_id)); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b> <?php echo CHtml::encode($data->post_id); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('video_name')); ?>:</b> <?php echo CHtml::encode($data->video_name); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('youtube_code')); ?>:</b> <?php echo CHtml::encode($data->youtube_code); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('video_link')); ?>:</b> <?php echo CHtml::encode($data->video_link); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('video_width')); ?>:</b> <?php echo CHtml::encode($data->video_width); ?> <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('video_height')); ?>:</b> <?php echo CHtml::encode($data->video_height); ?> <br />
</div>
