<?php

/* @var $this TopicVideoController */
/* @var $model TopicVideo */
$this->breadcrumbs=array(
	'Topic Videos'=>array('admin'),
	$model->topic_id,
);
?> 
<div class="page-title">
<div>
  <h2> <i class="fa fa-desktop"></i> Quản lý TopicVideo #<?php echo $model->topic_id; ?></h2>
  <h4></h4>
</div>
<div id="breadcrumbs"><?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3> Thông tin TopicVideo #<?php echo $model->topic_id; ?> </h3>
        <div class="box-tool"><?php echo CHtml::link('<i class="fa fa-mail-reply"></i> ',array('TopicVideo/admin')); ?>  &nbsp;  <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('TopicVideo/create')); ?> &nbsp; <a data-action="collapse" href="#"><i class='fa fa-chevron-up'></i> </a></div>
      </div>
      <div class="box-content"> <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-default table-bordered table-striped'),
        'attributes'=>array(
        		'topic_id',
		'subcat_id',
		'subcat_alias',
		'topic_name',
		'topic_alias',
		'topic_intro',
		'topic_thumb',
		'topic_status',
		'topic_sort',
		'topic_keyword',
		'topic_description',
		'topic_added_date',
        ),
        )); ?></div>
    </div>
  </div>
</div>
</div>
