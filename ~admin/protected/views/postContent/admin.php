<?php

/* @var $this PostContentController */
/* @var $model PostContent */
$this->breadcrumbs=array(
	'Content'=>array('admin'),
	'Manage',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('post-content-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> Contents</h1>
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
      <div class="box-content">
        <div class="row">
          <?php $this->renderPartial('_search',array(
						'model'=>$model,
					)); ?>
        </div>
        <div class="clearfix"></div>
        <div class="btn-toolbar pull-right">
          <div class="btn-group"> <?php echo CHtml::link('<i class="icon-plus-sign-alt"></i> ',array('PostContent/create'),array('class'=>'btn btn-mini btn-link')); ?> <a class="btn box-collapse btn-mini btn-link" href="#"><i></i> </a></div>
        </div>
        <br>
        <br>
        <div class="table-responsive grid-view" >
          <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'post-content-grid',
            'itemsCssClass'=>'table table-default table-bordered table-striped',
            'dataProvider'=>$model->search(),
            'columns'=>array(
            		'post_content_id',
		'post_id',
		'post_header_photo',
		'post_content',
		'meta_keyword',
		'meta_description',
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
