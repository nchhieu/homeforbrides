<?php // $this->widget('application.components.Slider');?>
<?php $this->widget('application.components.Submenu');?>
<?php $this->widget('application.components.Search');?>
<div class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <h1 class="title-page"><?php echo $DeailAboutus['subcat_name'];?></h1>
      </div>
      <div class="col-md-6 col-xs-12 social">
        <div class="fb-like pull-right" data-href="<?=Yii::app()->request->requestUri;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        <a href="javascript:history.go(-1)" class="btn btn-default btn-xs btn-back"> << Back to previous page </a> &nbsp; </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
      <div class="col-md-8 blogdetail">
        <div class="row blog">
          <?php
		if($DeailAboutus['subcat_as_post'] == 'Yes'){
		?>
          <div class="col-md-12">
            <?php 
					echo $DeailAboutus['subcat_intro'];
				?>
          </div>
          <?php
		} // if
		else{
			foreach($Post as $row){
				echo '<div class="col-md-5"><img src="'. $row['post_thumb'] .'" alt="'. $row['post_title'] .'" class="img-responsive" ></div>';
				echo '<div class="col-md-7"><p><strong>'. $row['post_title'] .'</strong></p><p>'. $row['post_intro'] .'</p></div>';
				echo '<div class="col-md-12"><hr></div>';
			} // for
		} // else
		
		?>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sidebar">
          <div class="list-group"> <a href="#" class="list-group-item active"> About us </a>
            <?php
       foreach($Aboutus as $row){
		   echo CHtml::link($row['subcat_name'], array('about/index','alias'=>$row['subcat_alias'],'id'=>$row['subcat_id']),array( 'class'=>'list-group-item','title'=>$row['subcat_name']));
	   }
		?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->widget('application.components.Social');?>