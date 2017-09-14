<?php

/* @var $this PostController */
/* @var $model Post */
$this->breadcrumbs=array(
	'Posts'=>array('admin'),
	$model->post_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Thông tin Post #<?php echo $model->post_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> View Post #<?php echo $model->post_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('Post/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'post_id',
		'post_type',
		'cat_id',
		'subcat_id',
		'sub_cat_name',
		'post_title',
		'post_thumb',
		'post_intro',
		'post_alias',
		'post_status',
		'post_hot',
		'post_added_time',
		'post_updated_date',
		'admin_id',
        ),
        )); ?></div>
    </div>
  </div>
</div>
