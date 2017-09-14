<?php

/* @var $this PostSliderController */
/* @var $model PostSlider */
$this->breadcrumbs=array(
	'Post Sliders'=>array('admin'),
	'Danh sách',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('post-slider-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> Quản lý Post Sliders</h1>
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
        <h3><i class="fa  fa-search"></i> Tìm kiếm </h3>
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
          <div class="btn-group"> <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('PostSlider/create','post_id'=>$post_id),array('class'=>'btn btn-circle btn-danger show-tooltip')); ?> <?php echo CHtml::link('<i class="fa fa-repeat"></i> ',array('PostSlider/admin','post_id'=>$post_id,'position'=>$position),array('class'=>'btn btn-circle btn-danger show-tooltip')); ?></div>
        </div>
        <br>
        <br>
        <div class="table-responsive">
          <?php 
			$dataProvider = $model->search();
			$dataProvider->getPagination()->setPageSize( Yii::app()->params['pageSize'] );
			$this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'post-slider-grid',
            'itemsCssClass'=>'table table-advance',
            'dataProvider'=>$dataProvider,
            'columns'=>array(
            		'post_slider_id',
					
					array( 
			'name'=>'Hình nhỏ',
			'type'=>'raw',
			'value'=>array($this,'Thumb'),
			'htmlOptions'=>array('width'=>'100px')
			),
			array( 
			'name'=>'Vị trí',
			'type'=>'raw',
			'value'=>array($this,'Sposition'),
			'htmlOptions'=>array('width'=>'100px')
			),
		'post_id',
		
		'slider_sort',
            array(
            'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:90px')
            ),
            ),
            )); ?>
        </div>
      </div>
    </div>
  </div>
</div>
