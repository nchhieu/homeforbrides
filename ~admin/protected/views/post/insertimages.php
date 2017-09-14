<?php

/* @var $this GalleryPhotosController */
/* @var $model GalleryPhotos */
$this->breadcrumbs=array(
	'Insert multiple photos into post',
);
?>

<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i> Insert multiple photos into post</h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i> Thêm mới hình ảnh </h3>
          <div class="box-tool"> ><a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a> </div>
        </div>
        <div class="box-content"><?php echo $this->renderPartial('_insertimages',array('id'=>$id)); ?></div>
      </div>
    </div>
  </div>
</div>
