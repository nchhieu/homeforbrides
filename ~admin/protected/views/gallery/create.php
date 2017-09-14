<?php

/* @var $this GalleryController */
/* @var $model Gallery */
$this->breadcrumbs=array(
	'Galleries'=>array('admin'),
	'Thêm mới',
);
?>

<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i> Thêm mới Galleries</h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i> Thêm mới Galleries </h3>
          <div class="box-tool"> <?php echo CHtml::link('<i class="icon-reply"></i> ',array('Gallery/admin'),array('class'=>'btn btn-mini btn-link')); ?><a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a> </div>
        </div>
        <div class="box-content"><?php echo $this->renderPartial('_form', array('Gallery'=>$Gallery,
			'model'=>$model,
			'PostContent'=>$PostContent,
			'PostSubcat'=>array(),)); ?></div>
      </div>
    </div>
  </div>
</div>
