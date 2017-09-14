<?php $this->widget('application.components.Slider');?>
<?php $this->widget('application.components.Submenu');?>
<?php $this->widget('application.components.Search');?>


 <div class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <h1 class="title-page"><?php echo $PostSubcat->subcat_name;?></h1>
      </div>
      <div class="col-md-12 col-xs-12 social">
        <div class="fb-like pull-right" data-href="<?=Yii::app()->request->requestUri;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        <a href="javascript:history.go(-1)" class="btn btn-default btn-xs btn-back"> << Back to previous page </a> &nbsp; </div>
    </div>
    <div class="row">
      <div class="col-md-8 blogdetail">
        <div class="row blog"><?php
    if($PostSubcat['subcat_as_post'] != 'Yes'){
	?>
      <div class="col-md-12 "><?php echo $PostSubcat->subcat_intro;?></div>
     <?php
	}else{
		
		$count = count($arrPostContent);
		if($count > 0){
        for($i=0;$i<$count;$i++){
	?>
        <div class="row"><div class="col-md-12"> <?php echo $arrPostContent[$i];?> </div></div>
        <hr>
        <?php
		} /// for
	} // if
		
	} // if
	 ?>
     </div>
      </div>
    </div>
  </div>
</div>

<?php $this->widget('application.components.Social');?>