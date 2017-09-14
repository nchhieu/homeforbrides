<?php

/* @var $this GalleryPhotosController */
/* @var $model GalleryPhotos */
$this->breadcrumbs=array(
	'Album'=>array('Gallery/admin'),
	$Post->post_title=>array('admin','gallery_id'=>$gallery_id),
	'Quản lý',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gallery-photos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> Quản lý Hình ảnh cho album <?php echo $Post->post_title?></h1>
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
        <h3><i class="fa  fa-search"></i> Tìm kiếm Hình ảnh </h3>
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
            <div class="btn-group"><?php echo CHtml::link('<i class="fa fa-trash-o"></i> Empty photo ',array('GalleryPhotos/empty','gallery_id'=>$gallery_id),array('class'=>'btn btn-danger')); ?> &nbsp;  <?php echo CHtml::link('<i class="fa  fa-plus-circle"></i> without logo ',array('GalleryPhotos/create','gallery_id'=>$gallery_id,'logo'=>0),array('class'=>'btn  show-tooltip','target'=>'_blank')); ?> &nbsp;  <?php echo CHtml::link('<i class="fa fa-plus"></i> with logo',array('GalleryPhotos/create','gallery_id'=>$gallery_id,'logo'=>1),array('class'=>'btn btn-primary show-tooltip','target'=>'_blank')); ?> <?php echo CHtml::link('<i class="fa fa-repeat"></i> ',array('GalleryPhotos/admin','gallery_id'=>$gallery_id),array('class'=>'btn btn-circle show-tooltip')); ?> </div>
          </div>
          <div class="table-responsive grid-view" >
            <?php $dataProvider = $model->search();
			$dataProvider->getPagination()->setPageSize( Yii::app()->params['pageSize'] );
$this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'gallery-photos-grid',
            'itemsCssClass'=>'table table-advance',
            'dataProvider'=>$dataProvider,
            'columns'=>array(
			array( 
				'name'=>'Hình nhỏ',
				'type'=>'raw',
				'value'=>array($this,'Thumb'),
				'htmlOptions'=>array('width'=>'100px')
			),
			
			array( 
				'name'=>'Copy to Homepage',
				'type'=>'raw',
				'value'=>array($this,'Showhome'),
				'htmlOptions'=>array('width'=>'100px')
			),
			
			array( 
				'name'=>'Copy to large SLider',
				'type'=>'raw',
				'value'=>array($this,'ShowLargeSlider'),
				'htmlOptions'=>array('width'=>'100px')
			),
			
			array( 
				'name'=>'Copy to Small SLider',
				'type'=>'raw',
				'value'=>array($this,'ShowSlider'),
				'htmlOptions'=>array('width'=>'100px')
			),
			
		'gallery_order',
            array(
            'class'=>'CButtonColumn',
			'template'=>'{delete}',
            ),
            ),
            )); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
