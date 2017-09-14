<?php

/* @var $this LocationController */
/* @var $model Location */
$this->breadcrumbs=array(
	'Địa điểm'=>array('admin'),
	$Location->location_id=>array('view','id'=>$Location->location_id),
	'Cập nhật',
);
?>

<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i> <i class='icon-table'></i> <span> Địa điểm # <?php echo $Location->location_id; ?> </h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-pink">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i> Cập nhật Địa điểm # <?php echo $Location->location_id; ?></h3>
          <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i>',array('Location/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a> </div>
        </div>
        <div class="box-content"> <?php echo $this->renderPartial('_form', array('Location'=>$Location,
			'model'=>$model,
			'PostContent'=>$PostContent,'PostSubcat'=>$PostSubcat)); ?></div>
      </div>
    </div>
  </div>
</div>
