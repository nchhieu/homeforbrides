<?php

/* @var $this VideoController */
/* @var $model Video */
$this->breadcrumbs=array(
	'Videography'=>array('admin'),
	'Manage',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('video-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i>Videography</h1>
  </div>
</div>
<!-- END Page Title --> 

<!-- BEGIN Breadcrumb -->
<?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>

<!-- END Breadcrumb -->

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa  fa-search"></i> Search </h3>
        <div class="box-tool"> <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a> <a data-action="close" href="#"><i class="fa fa-times"></i></a> </div>
      </div>
      <div class="box-content search-form">
        <div class="row form">
          <?php $this->renderPartial('_search',array(
						'model'=>$model,
					)); ?>
        </div>
        <div class="clearfix"></div>
        <div class="btn-toolbar pull-right">
          <div class="btn-group"> <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('Video/create'),array('class'=>'btn btn-circle show-tooltip')); ?> <?php echo CHtml::link('<i class="fa fa-repeat"></i> ',array('Video/admin'),array('class'=>'btn btn-circle show-tooltip')); ?></div>
        </div>
        <div class="table-responsive grid-view" >
          <?php 
		  $dataProvider = $model->search();
			$dataProvider->getPagination()->setPageSize( Yii::app()->params['pageSize'] );
		  $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'video-grid',
            'itemsCssClass'=>'table table-advance',
            'dataProvider'=>$dataProvider,
            'columns'=>array(
            		'video_id',
		'video_name',
		'youtube_code',
		'video_duration',
		'video_status',

            array(
            'class'=>'CButtonColumn',
            ),
            ),
            )); ?>
        </div>
      </div>
    </div>
  </div>
</div>

