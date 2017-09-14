<?php

/* @var $this PostContentController */
/* @var $model PostContent */
$this->breadcrumbs=array(
	'Post Contents'=>array('admin'),
	'Create',
);
?>
<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i>  Thêm mới Post Contents</h2>
    <h4></h4>
  </div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
 </div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3>CCreate Post Contents </h3>
        <div class="box-tool"> <?php echo CHtml::link('<i class="icon-reply"></i> ',array('PostContent/admin'),array('class'=>'btn btn-mini btn-link')); ?><a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a> </div>
      </div>
      <div class="box-content"><?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>
    </div>
  </div>
</div>
