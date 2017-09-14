<?php

/* @var $this GalleryPhotosController */
/* @var $model GalleryPhotos */
$this->breadcrumbs=array(
	'Album'=>array('Gallery/admin'),
	$Post->post_title=>array('admin','gallery_id'=>$gallery_id),
	'Thêm mới',
);
?>

<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i> Thêm mới hình ảnh cho album <?php echo $Post->post_title;?></h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i> Thêm mới hìnhảnh </h3>
          <div class="box-tool"> <?php echo CHtml::link('<i class="icon-reply"></i> ',array('GalleryPhotos/admin'),array('class'=>'btn btn-mini btn-link')); ?><a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a> </div>
        </div>
        <div class="box-content"><?php echo $this->renderPartial('_form', array('model'=>$model,
			'Post'=>$Post,
			'gallery_id'=>$gallery_id,'logo'=>$logo)); ?></div>
      </div>
    </div>
  </div>
</div>
