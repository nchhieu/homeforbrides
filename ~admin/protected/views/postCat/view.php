<?php

/* @var $this PostCatController */
/* @var $model PostCat */
$this->breadcrumbs=array(
	'Post Cats'=>array('admin'),
	$model->cat_id,
);
?>

<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i> Thông tin PostCat #<?php echo $model->cat_id; ?></h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-pink">
        <div class="box-title">
          <h3> View PostCat #<?php echo $model->cat_id; ?> </h3>
          <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('PostCat/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
        </div>
        <div class="box-content">
          <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'cat_id',
		'cat_name',
		'cat_alias',
		'cat_screen',
		'cat_thumb',
		'cat_order',
		'cat_status',
		'cat_description',
		'cat_keyword',
		'cat_updated_time',
        ),
        )); ?>
        </div>
      </div>
    </div>
  </div>
</div>
