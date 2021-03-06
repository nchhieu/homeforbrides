<?php

/* @var $this PhotographerController */
/* @var $model Photographer */
$this->breadcrumbs=array(
	'Photographers'=>array('admin'),
	'Danh sách',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('photographer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> Quản lý photographer</h1>
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
        <h3><i class="fa  fa-search"></i> Tìm kiếm Photographers</h3>
        <div class="box-tool"> <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a> <a data-action="close" href="#"><i class="fa fa-times"></i></a> </div>
      </div>
      <div class="box-content search-form">
        <div class="row form">
          <?php $this->renderPartial('_search',array(
						'model'=>$model,
					)); ?>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="box">
        <div class="box-content">
          <div class="btn-toolbar pull-right">
            <div class="btn-group"><?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('Photographer/create'),array('class'=>'btn btn-circle show-tooltip')); ?> <?php echo CHtml::link('<i class="fa fa-repeat"></i> ',array('Photographer/admin'),array('class'=>'btn btn-circle show-tooltip')); ?></div>
          </div>
          <div class="table-responsive grid-view" >
            <?php
			$dataProvider = $model->search();
			$dataProvider->getPagination()->setPageSize( Yii::app()->params['pageSize'] );
			 $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'photographer-grid',
            'itemsCssClass'=>'table table-advance',
            'dataProvider'=>$dataProvider,
            'columns'=>array(
			
			array( 
				'header'=>'Avatar',
				'type'=>'raw',
				'value'=>array($this,'getAvatar'),
				'htmlOptions'=>array('width'=>'90px')
			),
			
		'photographer_nick',
		'photographer_fullname',
		'photographer_phone',
		'photographer_gender',
		/*
		'photographer_status',
		'admin_id',
		*/
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
</div>
