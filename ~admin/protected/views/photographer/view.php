<?php

/* @var $this PhotographerController */
/* @var $model Photographer */
$this->breadcrumbs=array(
	'Photographers'=>array('admin'),
	$model->photographer_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Thông tin Photographer #<?php echo $model->photographer_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> View Photographer #<?php echo $model->photographer_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('Photographer/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'photographer_id',
		'photographer_nick',
		'photographer_fullname',
		'photographer_phone',
		'photographer_avatar',
		'photographer_gender',
		'photographer_status',
		'admin_id',
        ),
        )); ?></div>
    </div>
  </div>
</div>
