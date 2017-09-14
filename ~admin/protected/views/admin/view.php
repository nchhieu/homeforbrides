<?php

/* @var $this AdminController */
/* @var $model Admin */
$this->breadcrumbs=array(
	'Admins'=>array('admin'),
	$model->admin_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Thông tin Admin #<?php echo $model->admin_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> View Admin #<?php echo $model->admin_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('Admin/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'admin_id',
		'admin_email',
		'admin_name',
		'admin_phone',
		'admin_rights',
		'admin_avatar',
		'admin_status',
		'admin_created_date',
		'admin_latest_login',
		'admin_login_times',
        ),
        )); ?></div>
    </div>
  </div>
</div>
