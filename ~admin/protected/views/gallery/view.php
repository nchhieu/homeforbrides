<?php

/* @var $this GalleryController */
/* @var $model Gallery */
$this->breadcrumbs=array(
	'Galleries'=>array('admin'),
	$model->gallery_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Thông tin Gallery #<?php echo $model->gallery_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> View Gallery #<?php echo $model->gallery_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('Gallery/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'gallery_id',
		'post_id',
		'gallery_name',
		'location_name',
		'gallery_taken_time',
		'photographer_id',
		'photographer_name',
		'meta_keyword',
		'meta_description',
        ),
        )); ?></div>
    </div>
  </div>
</div>
