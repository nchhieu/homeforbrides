<?php

/* @var $this WeddingStepController */
/* @var $model WeddingStep */
$this->breadcrumbs=array(
	'Wedding Steps'=>array('admin'),
	$model->step_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Thông tin WeddingStep #<?php echo $model->step_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> View WeddingStep #<?php echo $model->step_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="fa fa-mail-reply"></i> ',array('WeddingStep/admin')); ?>  &nbsp;  <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('WeddingStep/create')); ?> &nbsp; <a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'step_id',
		'step_title',
		'step_order',
		'step_status',
        ),
        )); ?></div>
    </div>
  </div>
</div>
</div>
