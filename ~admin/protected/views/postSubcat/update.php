<?php

/* @var $this PostSubcatController */
/* @var $model PostSubcat */
$this->breadcrumbs=array(
	'Phân loại con'=>array('admin'),
	$model->subcat_id=>array('view','id'=>$model->subcat_id),
	'Cập nhật',
);
?>

<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i> <i class='icon-table'></i> <span> Phân loại con # <?php echo $model->subcat_id; ?> </h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-pink">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i> Cập nhật Phân loại con # <?php echo $model->subcat_id; ?></h3>
          <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i>',array('PostSubcat/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a> </div>
        </div>
        <div class="box-content"> <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>
      </div>
    </div>
  </div>
</div>
