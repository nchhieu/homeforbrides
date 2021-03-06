<?php

/* @var $this BannerController */
/* @var $model Banner */
$this->breadcrumbs=array(
	'Banners'=>array('admin'),
	'Manage',
);
?>

<div class="page-title">
  <div>
    <h2><i class="fa fa-desktop"></i> <a href="sevibebe.com">sevibebe.com </a>/ Home Page</h2>
    <h4></h4>
  </div>
</div>
<div id="breadcrumbs">
  <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3><i class="fa  fa-file-o"></i> Carousel</h3>
        <div class="box-tool"> <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a> </div>
      </div>
      <div class="box-content">
        <div class='table-responsive'>
          <div class="btn-toolbar pull-right">
            <div class="btn-group"> <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('Banner/create'),array('class'=>'btn btn-circle show-tooltip','data-original-title'=>'Add new banner')); ?> <?php echo CHtml::link('<i class="fa fa-repeat"></i> ',array('Banner/admin'),array('class'=>'btn btn-circle show-tooltip','data-original-title'=>'Refesh')); ?> </div>
          </div>
          <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'banner-grid',
            'itemsCssClass'=>'table table-advance',
            'dataProvider'=>$Banner->search(),
            'columns'=>array(
            		'banner_id',
		'banner_title',
		'banner_description',
		'banner_link',
		'banner_order',
		'banner_status',
		/*
		'banner_starting',
		'banner_ending',
		'language_id',
		'user_id',
		*/
                        array(
				 'class'=>'CButtonColumn',
				 'htmlOptions' => array('class'=>'btn-group', 'style'=>'width:110px'),
				 'template'=>'{view}{update}{delete}',
				'buttons'=>array
				(
					'view' => array('label'=>'View in detail','imageUrl'=>'fa fa-search-plus',),
					'update' => array('label'=>'Update','imageUrl'=>'fa fa-edit',),
					'delete' => array('label'=>'Delete','imageUrl'=>'fa fa-trash-o',),
				),
            ),

            ),
            )); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-pink">
      <div class="box-title">
        <h3><i class="fa  fa-file-o"></i> Language list</h3>
        <div class="box-tool"> <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a> </div>
      </div>
      <div class="box-content">
        <div class='table-responsive'>
          <div class="btn-toolbar pull-right">
            <div class="btn-group"> <?php echo CHtml::link('<i class="fa fa-plus"></i> ',array('Newsbox/create'),array('class'=>'btn btn-circle show-tooltip','data-original-title'=>'Add new news')); ?> <?php echo CHtml::link('<i class="fa fa-repeat"></i> ',array('Newsbox/admin'),array('class'=>'btn btn-circle show-tooltip','data-original-title'=>'Refesh')); ?> </div>
          </div>
          <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'newsbox-grid',
            'itemsCssClass'=>'table table-advance',
            'dataProvider'=>$Newsbox->search(),
            'columns'=>array(
            		'newsbox_id',
		'newsbox_title',
		'newsbox_description',
		'newsbox_photo',
		'icon_id',
		'newsbox_link',
		/*
		'newsbox_views',
		'language_id',
		'newsbox_status',
		'user_id',
		*/
                        array(
				 'class'=>'CButtonColumn',
				 'htmlOptions' => array('class'=>'btn-group', 'style'=>'width:110px'),
				 'template'=>'{view}{update}{delete}',
				'buttons'=>array
				(
					'view' => array('label'=>'View in detail','imageUrl'=>'fa fa-search-plus',),
					'update' => array('label'=>'Update','imageUrl'=>'fa fa-edit',),
					'delete' => array('label'=>'Delete','imageUrl'=>'fa fa-trash-o',),
				),
            ),

            ),
            )); ?>
        </div>
      </div>
    </div>
  </div>
</div>
