<?php

/* @var $this PostCatSliderController */
/* @var $model PostCatSlider */
$this->breadcrumbs=array(
	'Post Cat Sliders'=>array('admin'),
	$model->post_cat_slider_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Quản lý PostCatSlider #<?php echo $model->post_cat_slider_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> Thông tin PostCatSlider #<?php echo $model->post_cat_slider_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="fa fa-mail-reply"></i> ',array('PostCatSlider/admin','cat_id'=>$model->cat_id)); ?>  &nbsp;  <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('PostCatSlider/create','cat_id'=>$model->cat_id)); ?> &nbsp; <a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'post_cat_slider_id',
		'cat_id',
		'slider_position',
		'slider_url',
		'slider_sort',
		'slider_status',
        ),
        )); ?></div>
    </div>
  </div>
</div>
</div>
