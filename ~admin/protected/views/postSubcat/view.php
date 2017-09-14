<?php

/* @var $this PostSubcatController */
/* @var $model PostSubcat */
$this->breadcrumbs=array(
	'Post Subcats'=>array('admin'),
	$model->subcat_id,
);
?>

<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i> Thông tin PostSubcat #<?php echo $model->subcat_id; ?></h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-pink">
        <div class="box-title">
          <h3> View PostSubcat #<?php echo $model->subcat_id; ?> </h3>
          <div class="box-tool"><?php echo CHtml::link('<i class="icon-reply"></i> ',array('PostSubcat/admin'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i></a></div>
        </div>
        <div class="box-content">
          <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'subcat_id',
		'cat_id',
		'subcat_name',
		'subcat_alias',
		'subcat_thumb',
		'subcat_order',
		'subcat_status',
		'subcat_intro',
		'subcat_keyword',
		'subcat_description',
		'subcat_updated_time',
        ),
        )); ?>
        </div>
      </div>
    </div>
  </div>
</div>
