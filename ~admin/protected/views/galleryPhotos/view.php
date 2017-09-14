<?php

/* @var $this GalleryPhotosController */
/* @var $model GalleryPhotos */
$this->breadcrumbs=array(
	'Gallery Photoses'=>array('admin'),
	$model->gallery_photo_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Thông tin GalleryPhotos #<?php echo $model->gallery_photo_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> View GalleryPhotos #<?php echo $model->gallery_photo_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('GalleryPhotos/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'gallery_photo_id',
		'post_id',
		'gallery_id',
		'gallery_title',
		'gallery_thumb',
		'galley_photo',
		'meta_keyword',
		'meta_description',
		'gallery_order',
        ),
        )); ?></div>
    </div>
  </div>
</div>
