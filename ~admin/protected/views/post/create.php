<?php

/* @var $this PostController */
/* @var $model Post */
$this->breadcrumbs=array(
	'Posts'=>array('admin'),
	'Thêm mới',
);
?>

<div class="page-title">
  <div>
    <h2> <i class="fa fa-desktop"></i> Thêm mới Posts</h2>
    <h4></h4>
  </div>
  <div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i> Thêm mới Posts </h3>
          <div class="box-tool"> <?php echo CHtml::link('<i class="icon-reply"></i> ',array('Post/admin'),array('class'=>'btn btn-mini btn-link')); ?><a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a> </div>
        </div>
        <div class="box-content"><?php echo $this->renderPartial('_form', array('model'=>$model,'PostContent'=>$PostContent,'PostTags'=>$PostTags,'PostSubcat'=>$PostSubcat,'TopicVideo'=>$TopicVideo)); ?></div>
      </div>
    </div>
  </div>
</div>
