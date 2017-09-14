<?php

/* @var $this TagsController */
/* @var $model Tags */
$this->breadcrumbs=array(
	'Tags'=>array('admin'),
	$model->tag_id=>array('view','id'=>$model->tag_id),
	'Cập nhật',
);
?> 
<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i>  Quản lý Tags # <?php echo $model->tag_id; ?> </h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>  Cập nhật Tags # <?php echo $model->tag_id; ?></h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="fa fa-mail-reply"></i>',array('Tags/admin')); ?> <?php echo CHtml::link('<i class="fa fa-plus"></i>',array('Tags/create')); ?>    <a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a> </div>
        </div>
        <div class="box-content"> <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>
      </div>
    </div>
  </div>
</div>
