<?php

/* @var $this PostCatSliderController */
/* @var $model PostCatSlider */
$this->breadcrumbs=array(
	'Post Cat Sliders'=>array('admin'),
	$model->post_cat_slider_id=>array('view','id'=>$model->post_cat_slider_id),
	'Cập nhật',
);
?> 
<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i>  Quản lý PostCatSlider # <?php echo $model->post_cat_slider_id; ?> </h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>  Cập nhật PostCatSlider # <?php echo $model->post_cat_slider_id; ?></h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="fa fa-mail-reply"></i>',array('PostCatSlider/admin')); ?> <?php echo CHtml::link('<i class="fa fa-plus"></i>',array('PostCatSlider/create')); ?>    <a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a> </div>
        </div>
        <div class="box-content"> <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>
      </div>
    </div>
  </div>
</div>
