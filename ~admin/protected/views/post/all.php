<?php

/* @var $this PostController */
/* @var $model Post */
$this->breadcrumbs=array(
	'Post'=>array('admin'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('post-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> Posts</h1>
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
          <?php $this->renderPartial('_searchall',array(
						'model'=>$model,
						'PostSubcat'=>$PostSubcat,
					)); ?>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="box">
        <div class="box-content">
          <div class="btn-toolbar pull-right">
            <div class="btn-group"> <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('Post/create'),array('class'=>'btn btn-circle show-tooltip')); ?> <?php echo CHtml::link('<i class="fa fa-repeat"></i> ',array('Post/admin'),array('class'=>'btn btn-circle show-tooltip')); ?> </div>
          </div>
          <div class="table-responsive grid-view" >
            <?php $dataProvider = $model->search();
			$dataProvider->getPagination()->setPageSize( Yii::app()->params['pageSize'] );
$this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'post-grid',
            'itemsCssClass'=>'table table-advance',
            'dataProvider'=>$dataProvider,
			'rowCssClassExpression'=>'$data->PostType',
            'columns'=>array(
            		'post_id',
					array
					(
						  'name'=>'post_updated_date',
						  'value'=>'date_format(date_create($data->post_updated_date), "d/m/Y ")',
					),
					
					'cat.cat_name',
					
					array
					(
						  'name'=>'post_title',
						  'type'=>'raw',
						  'value'=>array($this,'PostTitle'),
						  'htmlOptions'=>array('style'=>'min-width:250px')
					),
					'post_views',
					'post_order',
					array
					(
						  'name'=>'post_order',
						  'type'=>'raw',
						  'value'=>array($this,'pushOrder'),
					),
					'post_status',
					'post_hot',
					array(
						'class'=>'CButtonColumn',
						'htmlOptions'=>array('style'=>'min-width:90px')
						
					),
           	 ),
            )); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

