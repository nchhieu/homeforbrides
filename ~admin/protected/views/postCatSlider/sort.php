<?php

/* @var $this PostSubcatController */
/* @var $model PostSubcat */
$this->breadcrumbs=array(
	'Sub categories'=>array('admin'),
	'Manage',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('post-subcat-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<style>
#sortable {
	list-style-type: none;
	margin: 0;
	padding: 0;
}
#sortable li {
	margin: 5px 5px 5px 5px;
	padding: 1px;
	float: left;
	width: 100px;
	height: 60px;
	font-size: 4em;
	text-align: center;
}
#sortable li img {
	padding: 1px;
	border: 1px solid #ccc;
	cursor: pointer;
	width: 100px;
	height: 60px;
}
.clear {
	clear: both;
}
</style>
<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> Slider</h1>
  </div>
</div>
<!-- END Page Title --> 

<!-- BEGIN Breadcrumb -->
<?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));?>

<!-- END Breadcrumb -->

<div class="row">
  <div class="col-md-12">
    <div id="reorder-gallery">
      <ul id="sortable">
        <?php
				$data = $model;
				foreach($data as $row){
    			?>
        <li id="ID_<?php echo $row['post_cat_slider_id'];?>"><img src="<?php echo $row['slider_photos'];?>" title="<?php echo $row['post_cat_slider_id'];?>" alt="<?php echo $row['post_cat_slider_id'];?>" /></li>
        <?php
				} // for
     			?>
      </ul>
    </div>
  </div>
</div>
<link href="assets/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
<script src="assets/jquery-ui/jquery-ui.min.js"></script> 
<script>
$(function() {
  $("#sortable").sortable({
	  			cursor: "move",
				update: function(){
						var order = $(this).sortable("serialize"); 
						jQuery.post("index.php?r=PostCatSlider/UpdateSort", order, 
						function(theResponse){}); }
				});
});

</script>