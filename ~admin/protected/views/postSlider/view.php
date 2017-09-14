<?php

/* @var $this PostSliderController */
/* @var $model PostSlider */
$this->breadcrumbs=array(
	'Post Sliders'=>array('admin'),
	$model->post_slider_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Quản lý PostSlider #<?php echo $model->post_slider_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> Thông tin PostSlider #<?php echo $model->post_slider_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="fa fa-mail-reply"></i> ',array('PostSlider/admin','post_id'=>$model->post_id)); ?>  &nbsp;  <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('PostSlider/create','post_id'=>$model->post_id)); ?> &nbsp; <a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'post_slider_id',
		'post_id',
		'photos',
		'order',
        ),
        )); ?></div>
    </div>
  </div>
</div>
</div>
