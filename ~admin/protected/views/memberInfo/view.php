<?php

/* @var $this MemberInfoController */
/* @var $model MemberInfo */
$this->breadcrumbs=array(
	'Member Infos'=>array('admin'),
	$model->member_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Thông tin MemberInfo #<?php echo $model->member_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> View MemberInfo #<?php echo $model->member_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('MemberInfo/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'member_id',
		'mobile',
		'brithday',
		'picture',
		'city_name',
		'dist_id',
		'dist_name',
		'address',
		'favourite',
		'create_date',
        ),
        )); ?></div>
    </div>
  </div>
</div>
