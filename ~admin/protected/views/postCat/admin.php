<?php

/* @var $this PostCatController */
/* @var $model PostCat */
$this->breadcrumbs=array(
	'Categories'=>array('admin'),
	'Manage',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('post-cat-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> Categories</h1>
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
        <h3><i class="fa  fa-search"></i> Tìm kiếm Phân loại </h3>
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
            <div class="btn-group"> <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('PostCat/create'),array('class'=>'btn btn-circle show-tooltip')); ?> <?php echo CHtml::link('<i class="fa fa-repeat"></i> ',array('PostCat/admin'),array('class'=>'btn btn-circle show-tooltip')); ?> </div>
          </div>
          <div class="table-responsive grid-view" >
            <?php $dataProvider = $model->search();
			$dataProvider->getPagination()->setPageSize( Yii::app()->params['pageSize'] );
$this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'post-cat-grid',
            'itemsCssClass'=>'table table-hover table-condensed',
            'dataProvider'=>$dataProvider,
            'columns'=>array(
					array( 
						'header'=>'Post Type',
						'type'=>'raw',
						'value'=>array($this,'getTopic'),
						'htmlOptions'=>array('style'=>'width:100px'),
					),
					
					'cat_name',
					array( 
						'header'=>'Banner',
						'type'=>'raw',
						'value'=>array($this,'Slider'),
						'htmlOptions'=>array('style'=>'width:180px'),
					),
					array( 
						'header'=>'Subs',
						'type'=>'raw',
						'value'=>array($this,'countSub'),
						'htmlOptions'=>array('style'=>'width:100px'),
					),
					
					array( 
						'header'=>'Posts',
						'type'=>'raw',
						'value'=>array($this,'countPost'),
						'htmlOptions'=>array('style'=>'width:100px'),
					),
					array( 
						'name'=>'cat_order',
						'type'=>'raw',
						'htmlOptions'=>array('style'=>'width:70px'),
					),
					array( 
						'name'=>'cat_status',
						'type'=>'raw',
						'htmlOptions'=>array('style'=>'width:70px'),
					),
           array(
				 'class'=>'CButtonColumn',
				 'htmlOptions'=>array('style'=>'width:90px'),
            ),
            ),
            )); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
