<?php

/* @var $this LocationController */
/* @var $model Location */
$this->breadcrumbs=array(
	'Locations'=>array('admin'),
	$model->location_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Thông tin Location #<?php echo $model->location_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> View Location #<?php echo $model->location_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('Location/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'location_id',
		'post_id',
		'location_type_id',
		'location_name',
		'city_id',
		'dist_id',
		'location_address',
		'location_phone',
		'location_biz_open',
		'location_price',
		'location_status',
		'location_order',
        ),
        )); ?></div>
    </div>
  </div>
</div>
