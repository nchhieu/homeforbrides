<?php

/* @var $this VideoController */
/* @var $model Video */
$this->breadcrumbs=array(
	'Videos'=>array('admin'),
	$model->video_id,
);
?>

<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i> Thông tin Video #<?php echo $model->video_id; ?></h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-pink">
        <div class="box-title">
          <h3> View Video #<?php echo $model->video_id; ?> </h3>
          <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('Video/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
        </div>
        <div class="box-content">
          <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'video_id',
		'post_id',
		'video_name',
		'youtube_code',
		'video_link',
		'video_duration',
        ),
        )); ?>
        </div>
      </div>
    </div>
  </div>
</div>
