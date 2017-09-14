<?php

/* @var $this BannerController */
/* @var $model Banner */
$this->breadcrumbs=array(
	'Home'=>array('admin'),
	'Manage',
);
?>

<!-- BEGIN Page Title -->

<div class="page-title">
  <div>
    <h1><i class="fa fa-thumbs-up"></i> Hi ! <?php echo Yii::app()->user->getState('admin_name'); ?></h1>
  </div>
</div>
<!-- END Page Title --> 

<!-- BEGIN Breadcrumb -->
<div id="breadcrumbs">
  <ul class="breadcrumb">
    <li class="active"><i class="fa fa-home"></i> Home</li>
  </ul>
</div>
<!-- END Breadcrumb -->

<div class="row">
  <div class="col-md-7">
    <div class="row">
      <div class="col-md-7">
        <div class="row">
          <div class="col-md-12">
            <div class="tile tile-green">
              <div class="img"> <i class="fa fa-copy"></i> </div>
              <div class="content">
                <p class="big"><?php echo number_format($PostCount);?></p>
                <p class="title">Bài viết</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-12">
            <div class="tile tile-magenta">
              <div class="img"> <i class="fa fa-sitemap"></i> </div>
              <div class="content">
                <p class="big"><?php echo number_format($SubCat);?></p>
                <p class="title">Phân loại bài viết</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

